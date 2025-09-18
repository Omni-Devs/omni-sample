@extends('layouts.app')
@section('content')
<style>
    :root{--sidebar:240px;--accent:#0077cc}
    *{box-sizing:border-box}
    /* body{font-family:Inter,system-ui,Arial; margin:0; height:100vh; display:flex} */
    /* Sidebar */
    .body-layout{font-family:Inter,system-ui,Arial; margin:0; height:100vh; display:flex}
    .sidebar{width:var(--sidebar); border-right:1px solid #e6e6e6; padding:12px; background:#fafafa}
    .sidebar h3{margin:6px 0 12px;font-size:14px}
    .table-list{display:flex;flex-direction:column;gap:8px}
    .table-item{display:flex;align-items:center;justify-content:space-between;padding:8px;border-radius:6px;background:white;border:1px solid #ddd;cursor:grab}
    .controls{margin-top:12px;display:flex;gap:8px}
    button{cursor:pointer;padding:8px 10px;border-radius:6px;border:1px solid #ccc;background:white}
    button.primary{background:var(--accent);color:#fff;border-color:transparent}
    /* Main area */
    .main{flex:1;display:flex;flex-direction:column}
    .floors{display:flex;gap:8px;padding:12px;border-bottom:1px solid #eee;background:#fff}
    .floor-btn{padding:6px 10px;border-radius:6px;border:1px solid #ddd;background:#f8f8f8}
    .floor-btn.active{background:var(--accent);color:#fff;border-color:transparent}
    .canvas-wrap{flex:1;position:relative;overflow:auto;background:linear-gradient(90deg,#fbfbfb,#fff)}
    .canvas{position:relative;margin:20px;min-height:600px;border:2px dashed #eee;background: repeating-linear-gradient(0deg,transparent,transparent 39px,#f7f7f7 40px);}
    /* table in canvas */
    .placed-table{position:absolute;min-width:60px;min-height:60px;padding:6px;border-radius:6px;background:#fff;border:2px solid #666;display:flex;align-items:center;justify-content:center;cursor:move;user-select:none}
    .placed-table.small{width:60px;height:60px}
    .placed-table.medium{width:90px;height:70px}
    .placed-table.large{width:140px;height:80px}
    .placed-table.selected{outline:3px solid rgba(0,119,204,0.25)}
    .merged{background:linear-gradient(135deg,#fff,#f0fbff);border-style:solid;border-color:#0077cc}
    /* topbar actions */
    .top-actions{display:flex;gap:8px;padding:10px;border-bottom:1px solid #eee;background:#fff}
    .help{margin-left:auto;color:#666;font-size:13px}
    .badge{font-size:12px;padding:3px 6px;border-radius:6px;background:#eee}
    /* hint */
    .hint{font-size:13px;color:#666;margin-top:8px}
  </style>
<div class="body-layout">
  <div class="sidebar">
    <h3>Tables (drag → canvas)</h3>
    <div class="table-list" id="tableList">
      <!-- initial templates -->
      <div class="table-item" draggable="true" data-size="small" data-label="Table 1">Table 1 <span class="badge">S</span></div>
      <div class="table-item" draggable="true" data-size="medium" data-label="Table 2">Table 2 <span class="badge">M</span></div>
      <div class="table-item" draggable="true" data-size="large" data-label="Table 3">Table 3 <span class="badge">L</span></div>
      <div class="table-item" draggable="true" data-size="small" data-label="Table 4">Table 4 <span class="badge">S</span></div>
      <div class="table-item" draggable="true" data-size="medium" data-label="Table 5">Table 5 <span class="badge">M</span></div>
    </div>

    <div class="controls">
      <input id="newTableName" placeholder="Name" style="flex:1;padding:8px;border-radius:6px;border:1px solid #ccc" />
      <select id="newTableSize" style="margin-left:6px;padding:8px;border-radius:6px;border:1px solid #ccc">
        <option value="small">S</option>
        <option value="medium">M</option>
        <option value="large">L</option>
      </select>
    </div>
    <div style="margin-top:8px;display:flex;gap:8px">
      <button id="addTableBtn" class="primary">Add</button>
      <button id="addFloorBtn">Add Floor</button>
    </div>

    <div class="hint">Tip: drag a table from the left, drop anywhere on the canvas. Shift+click multiple tables, then press "Merge".</div>
  </div>

  <div class="main">
    <div class="top-actions">
      <button id="mergeBtn">Merge Selected</button>
      <button id="unmergeBtn">Unmerge</button>
      <button id="clearBtn">Clear Floor</button>
      <div class="help">Selected: <span id="selectedCount">0</span></div>
    </div>

    <div class="floors" id="floors"></div>

    <div class="canvas-wrap">
      <div class="canvas" id="canvas" data-floor="1"></div>
    </div>
  </div>
    </div>

  <script>
    // Minimal, dependency-free layout manager
    (function(){
      const tableList = document.getElementById('tableList');
      const canvas = document.getElementById('canvas');
      const floorsEl = document.getElementById('floors');
      const selectedCount = document.getElementById('selectedCount');
      const mergeBtn = document.getElementById('mergeBtn');
      const unmergeBtn = document.getElementById('unmergeBtn');
      const clearBtn = document.getElementById('clearBtn');
      const addTableBtn = document.getElementById('addTableBtn');
      const newTableName = document.getElementById('newTableName');
      const newTableSize = document.getElementById('newTableSize');
      const addFloorBtn = document.getElementById('addFloorBtn');

      let floors = {1:{id:1,name:'Floor 1'}};
      let activeFloor = 1;
      let placedCounter = 0;
      let selected = new Set();

      // render floors
      function renderFloors(){
        floorsEl.innerHTML='';
        for(const fId of Object.keys(floors).sort((a,b)=>a-b)){
          const btn = document.createElement('button');
          btn.className='floor-btn'+(Number(fId)===activeFloor?' active':'');
          btn.textContent = floors[fId].name;
          btn.onclick = ()=>{switchFloor(Number(fId))};
          floorsEl.appendChild(btn);
        }
      }

      function switchFloor(id){
        activeFloor = id;
        canvas.dataset.floor = id;
        // clear canvas and draw elements that belong to this floor (we store in element.dataset.floor)
        Array.from(canvas.querySelectorAll('.placed-table, .merged-group')).forEach(el=>el.remove());
        // load from memory if we kept one (for brevity we keep in-memory elements under document._layout)
        const saved = (document._layout || []).filter(x=>Number(x.floor)===id);
        for(const s of saved) createPlacedFromSaved(s);
        renderFloors();
      }

      function createPlacedFromSaved(s){
        if(s.type==='merged'){
          const group = makeMergedElement(s);
          canvas.appendChild(group);
        } else {
          const el = makePlacedElement(s);
          canvas.appendChild(el);
        }
      }

      // drag from sidebar
      tableList.addEventListener('dragstart', e=>{
        const target = e.target.closest('.table-item');
        if(!target) return;
        e.dataTransfer.setData('text/plain', JSON.stringify({label: target.dataset.label || target.textContent.trim(),size:target.dataset.size||'medium'}));
      });

      canvas.addEventListener('dragover', e=>{ e.preventDefault(); });
      canvas.addEventListener('drop', e=>{
        e.preventDefault();
        const rect = canvas.getBoundingClientRect();
        const payload = e.dataTransfer.getData('text/plain');
        let obj;
        try{ obj = JSON.parse(payload);}catch(err){return}
        const x = e.clientX - rect.left + canvas.scrollLeft;
        const y = e.clientY - rect.top + canvas.scrollTop;
        createPlaced({label:obj.label,size:obj.size,x,y,floor:activeFloor});
      });

      // create placed table
      function createPlaced({label,size='medium',x=100,y=100,floor=1,id=null}){
        const s = {type:'table',id: id||('t'+(++placedCounter)),label,size,x,y,floor};
        (document._layout = document._layout||[]).push(s);
        const el = makePlacedElement(s);
        canvas.appendChild(el);
        return el;
      }

      function makePlacedElement(s){
        const el = document.createElement('div');
        el.className = 'placed-table '+s.size;
        el.style.left = s.x+'px';
        el.style.top = s.y+'px';
        el.textContent = s.label;
        el.dataset.id = s.id;
        el.dataset.floor = s.floor;
        el.draggable = false; // handled by mousedown drag

        // selection
        el.addEventListener('click', e=>{
          if(!e.shiftKey && !e.ctrlKey){ // single select
            clearSelection();
            selected.add(s.id);
            el.classList.add('selected');
          } else { // multi
            if(selected.has(s.id)) { selected.delete(s.id); el.classList.remove('selected'); }
            else { selected.add(s.id); el.classList.add('selected'); }
          }
          selectedCount.textContent = selected.size;
          e.stopPropagation();
        });

        // drag inside canvas (move)
        let offsetX=0,offsetY=0, dragging=false;
        el.addEventListener('mousedown', e=>{
          dragging=true;
          offsetX = e.clientX - el.getBoundingClientRect().left;
          offsetY = e.clientY - el.getBoundingClientRect().top;
          document.body.style.cursor='grabbing';
        });
        window.addEventListener('mousemove', e=>{
          if(!dragging) return;
          const rect = canvas.getBoundingClientRect();
          const x = e.clientX - rect.left + canvas.scrollLeft - offsetX;
          const y = e.clientY - rect.top + canvas.scrollTop - offsetY;
          el.style.left = Math.max(0, x) + 'px';
          el.style.top = Math.max(0, y) + 'px';
        });
        window.addEventListener('mouseup', ()=>{
          if(dragging){
            dragging=false; document.body.style.cursor='';
            // update position in memory
            const idx = (document._layout||[]).findIndex(o=>o.id===s.id);
            if(idx>=0){
              const rect = el.getBoundingClientRect();
              const cRect = canvas.getBoundingClientRect();
              document._layout[idx].x = rect.left - cRect.left + canvas.scrollLeft;
              document._layout[idx].y = rect.top - cRect.top + canvas.scrollTop;
            }
          }
        });

        return el;
      }

      // click on empty canvas clears selection
      canvas.addEventListener('click', ()=>{ clearSelection(); selectedCount.textContent=0; });
      function clearSelection(){
        selected.forEach(id=>{ const el = canvas.querySelector('[data-id="'+id+'"]'); if(el) el.classList.remove('selected'); });
        selected.clear();
        selectedCount.textContent = 0;
      }

      // merge logic: compute bounding box, create merged-group element
      function mergeSelected(){
        if(selected.size<2) return alert('Select at least 2 tables (Shift+click) to merge');
        const ids = Array.from(selected);
        const elems = ids.map(id=>canvas.querySelector('[data-id="'+id+'"]')).filter(Boolean);
        if(elems.length<2) return alert('Could not find selected items on this floor');
        // compute bounds
        let minX=Infinity,minY=Infinity,maxX=-Infinity,maxY=-Infinity;
        elems.forEach(el=>{
          const r=el.getBoundingClientRect();
          const cr=canvas.getBoundingClientRect();
          const left = r.left - cr.left + canvas.scrollLeft;
          const top = r.top - cr.top + canvas.scrollTop;
          minX = Math.min(minX,left); minY = Math.min(minY,top);
          maxX = Math.max(maxX,left + r.width); maxY = Math.max(maxY, top + r.height);
        });

        // remove items from DOM and _layout, but keep their ids inside group
        const groupId = 'g'+Date.now();
        const childIds = [];
        elems.forEach(el=>{
          childIds.push(el.dataset.id);
          // remove from memory
          const idx = (document._layout||[]).findIndex(o=>o.id===el.dataset.id);
          if(idx>=0) document._layout.splice(idx,1);
          el.remove();
        });

        const groupObj = {type:'merged',id:groupId,x:minX,y:minY,w:maxX-minX,h:maxY-minY,children:childIds,floor:activeFloor,label:'Merged'};
        (document._layout = document._layout||[]).push(groupObj);
        const groupEl = makeMergedElement(groupObj);
        canvas.appendChild(groupEl);
        clearSelection();
        selectedCount.textContent=0;
      }

      function makeMergedElement(g){
        const el = document.createElement('div');
        el.className='merged-group merged';
        el.style.left = g.x+'px';
        el.style.top = g.y+'px';
        el.style.width = g.w+'px';
        el.style.height = g.h+'px';
        el.dataset.id = g.id;
        el.dataset.floor = g.floor;
        // show children ids and ability to open
        el.innerHTML = '<div style="padding:6px;pointer-events:none;">'+(g.label||'Merged')+' ('+g.children.length+' tables)</div>';

        // clicking selects the group
        el.addEventListener('click', e=>{
          clearSelection(); selected.add(g.id); el.classList.toggle('selected'); selectedCount.textContent = selected.size; e.stopPropagation();
        });

        // double click to expand (place child placeholders)
        el.addEventListener('dblclick', e=>{
          // remove group element and re-create individual placeholders at relative positions
          const idx = (document._layout||[]).findIndex(o=>o.id===g.id);
          if(idx>=0) document._layout.splice(idx,1);
          el.remove();
          // create placeholder children spread inside the group's bounds
          const cols = Math.ceil(Math.sqrt(g.children.length));
          const rows = Math.ceil(g.children.length/cols);
          const cellW = g.w/cols; const cellH = g.h/rows;
          let i=0;
          for(const cid of g.children){
            const cx = g.x + (i%cols)*cellW + 6;
            const cy = g.y + Math.floor(i/cols)*cellH + 6;
            createPlaced({label:cid,size:'small',x:cx,y:cy,floor:g.floor,id:cid});
            i++;
          }
        });

        // move group
        let dragging=false,offsetX=0,offsetY=0;
        el.addEventListener('mousedown', e=>{ dragging=true; offsetX = e.clientX - el.getBoundingClientRect().left; offsetY = e.clientY - el.getBoundingClientRect().top; document.body.style.cursor='grabbing'; e.stopPropagation(); });
        window.addEventListener('mousemove', e=>{ if(!dragging) return; const rect = canvas.getBoundingClientRect(); const x = e.clientX - rect.left + canvas.scrollLeft - offsetX; const y = e.clientY - rect.top + canvas.scrollTop - offsetY; el.style.left = Math.max(0,x)+'px'; el.style.top = Math.max(0,y)+'px'; });
        window.addEventListener('mouseup', ()=>{ if(dragging){ dragging=false; document.body.style.cursor=''; const rect = el.getBoundingClientRect(); const cRect = canvas.getBoundingClientRect(); const idx = (document._layout||[]).findIndex(o=>o.id===g.id); if(idx>=0){ document._layout[idx].x = rect.left - cRect.left + canvas.scrollLeft; document._layout[idx].y = rect.top - cRect.top + canvas.scrollTop; } } });

        return el;
      }

      mergeBtn.addEventListener('click', mergeSelected);

      // unmerge: if a merged-group is selected, break into children
      unmergeBtn.addEventListener('click', ()=>{
        const ids = Array.from(selected);
        if(ids.length===0) return alert('Select a merged group to unmerge');
        for(const id of ids){
          const idx = (document._layout||[]).findIndex(o=>o.id===id && o.type==='merged');
          if(idx>=0){
            const g = document._layout[idx];
            document._layout.splice(idx,1);
            // create children evenly
            const cols = Math.ceil(Math.sqrt(g.children.length));
            const rows = Math.ceil(g.children.length/cols);
            const cellW = g.w/cols; const cellH = g.h/rows;
            let i=0;
            for(const cid of g.children){
              const cx = g.x + (i%cols)*cellW + 6;
              const cy = g.y + Math.floor(i/cols)*cellH + 6;
              createPlaced({label:cid,size:'small',x:cx,y:cy,floor:g.floor,id:cid});
              i++;
            }
            const el = canvas.querySelector('[data-id="'+id+'"]'); if(el) el.remove();
          }
        }
        clearSelection();
      });

      clearBtn.addEventListener('click', ()=>{
        // remove all elements on current floor
        document._layout = (document._layout||[]).filter(o=>Number(o.floor)!==activeFloor);
        Array.from(canvas.children).forEach(c=>c.remove());
      });

      // add new template to left list
      addTableBtn.addEventListener('click', ()=>{
        const name = newTableName.value.trim() || ('Table '+(tableList.children.length+1));
        const size = newTableSize.value;
        const node = document.createElement('div');
        node.className='table-item'; node.draggable=true; node.dataset.size=size; node.dataset.label=name; node.innerHTML = name + ' <span class="badge">'+(size==='small'?'S':(size==='medium'?'M':'L'))+'</span>';
        tableList.appendChild(node);
        newTableName.value='';
      });

      // add floor
      addFloorBtn.addEventListener('click', ()=>{
        const id = Object.keys(floors).length + 1;
        floors[id] = {id:id,name:'Floor '+id};
        renderFloors();
      });

      // helper to create initial demo items on floor 1
      function seedDemo(){
        createPlaced({label:'Table A',size:'medium',x:60,y:40,floor:1});
        createPlaced({label:'Table B',size:'small',x:220,y:40,floor:1});
        createPlaced({label:'Table C',size:'large',x:420,y:140,floor:1});
      }

      // initial
      renderFloors(); seedDemo();

      // load layout when switching floor
      document._layout = document._layout || [];
      switchFloor(1);

      // small UX: delete with Delete key
      window.addEventListener('keydown', e=>{
        if(e.key==='Delete'){
          if(selected.size===0) return;
          for(const id of Array.from(selected)){
            const idx = (document._layout||[]).findIndex(o=>o.id===id);
            if(idx>=0) document._layout.splice(idx,1);
            const el = canvas.querySelector('[data-id="'+id+'"]'); if(el) el.remove();
          }
          clearSelection();
        }
      });

    })();
  </script>
@endsection