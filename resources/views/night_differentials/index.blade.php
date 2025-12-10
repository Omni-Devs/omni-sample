{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Night Differentials</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form id="nd-form">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-md-12"><span>
                            <fieldset class="form-group">
                                <legend class="col-form-label pt-0">Time(From) *</legend>
                                <div>
                                    <div role="group" dir="ltr" class="b-form-btn-label-control dropdown b-form-timepicker form-control" aria-describedby="TimeFrom-feedback" id="timefrom_outer" lang="en">
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false" class="btn h-auto timepicker-btn" data-target="time_from_input">
                                            <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="clock" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-clock b-icon bi"><g><path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path></g></svg>
                                        </button>
                                        <label class="form-control" id="time_from_label" for="time_from_input">{{ \Carbon\Carbon::createFromFormat('H:i', old('time_from', '21:00'))->format('g:i A') }}</label>
                                        <input type="time" name="time_from" id="time_from_input" value="{{ old('time_from', '21:00') }}" style="display:none">
                                    </div>
                                    <div id="TimeFrom-feedback" class="invalid-feedback"></div>
                                </div>
                            </fieldset>
                        </span></div>

                    </div>

                    <div class="col-md-4">
                        <div class="col-md-12"><span>
                            <fieldset class="form-group">
                                <legend class="col-form-label pt-0">Time(To) *</legend>
                                <div>
                                    <div role="group" dir="ltr" class="b-form-btn-label-control dropdown b-form-timepicker form-control" aria-describedby="TimeTo-feedback" id="timeto_outer" lang="en">
                                        <button type="button" aria-haspopup="dialog" aria-expanded="false" class="btn h-auto timepicker-btn" data-target="time_to_input">
                                            <svg viewBox="0 0 16 16" width="1em" height="1em" focusable="false" role="img" aria-label="clock" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi-clock b-icon bi"><g><path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path></g></svg>
                                        </button>
                                        <label class="form-control" id="time_to_label" for="time_to_input">{{ \Carbon\Carbon::createFromFormat('H:i', old('time_to', '00:00'))->format('g:i A') }}</label>
                                        <input type="time" name="time_to" id="time_to_input" value="{{ old('time_to', '00:00') }}" style="display:none">
                                    </div>
                                    <div id="TimeTo-feedback" class="invalid-feedback"></div>
                                </div>
                            </fieldset>
                        </span></div>
                    </div>

                    <div class="col-md-4">
                        <label>Percentage *</label>
                        <input type="number" name="percentage" class="form-control" value="{{ old('percentage', 10) }}" required>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

            <div class="mt-3">
                <pre id="nd-result" style="background:#f8f9fa;padding:12px;border-radius:4px;display:none"></pre>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('nd-form').addEventListener('submit', function(e){
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);

    fetch("{{ route('night-differentials.store') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
            'Accept': 'application/json'
        },
        body: data
    }).then(async res=>{
        const text = await res.text();
        let out;
        try{ out = JSON.parse(text); } catch(e){ out = text; }
        const pre = document.getElementById('nd-result');
        pre.style.display = 'block';
        pre.textContent = typeof out === 'string' ? out : JSON.stringify(out, null, 4);
    }).catch(err=>{
        const pre = document.getElementById('nd-result');
        pre.style.display = 'block';
        pre.textContent = err.toString();
    });
});
</script>
@endsection

@section('bottom-scripts')
<script>
// wire up timepicker buttons to open hidden time inputs and update labels
document.querySelectorAll('.timepicker-btn').forEach(function(btn){
    const targetId = btn.getAttribute('data-target');
    const input = document.getElementById(targetId);
    const label = document.getElementById(targetId.replace('_input','_label'));

    btn.addEventListener('click', function(){
        // trigger native time picker
        input.focus();
        input.click();
    });

    input.addEventListener('change', function(){
        // format to 12-hour AM/PM
        if(!input.value) return;
        const parts = input.value.split(':');
        let h = parseInt(parts[0],10);
        const m = parts[1] || '00';
        const ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        if(h === 0) h = 12;
        label.textContent = h + ':' + m + ' ' + ampm;
    });
});
</script>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Night Differentials</h3>
    <div class="card mb-4">
        <div class="card-body">
            <form id="nd-form">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>Time(From) *</label>
                        <input type="time" name="time_from" class="form-control" value="{{ old('time_from', optional($latest)->time_from) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label>Time(To) *</label>
                        <input type="time" name="time_to" class="form-control" value="{{ old('time_to', optional($latest)->time_to) }}" required>
                    </div>
                    <div class="col-md-8">
                        <label>Percentage *</label>
                        <input type="number" name="percentage" class="form-control" value="{{ old('percentage', optional($latest)->percentage) }}" required>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

            <div class="mt-3">
                <div id="nd-success" class="text-success" style="display:none;font-weight:600"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('nd-form').addEventListener('submit', function(e){
    e.preventDefault();
    const form = e.target;
    const data = new FormData(form);

    fetch("{{ route('night-differentials.store') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
            'Accept': 'application/json'
        },
        body: data
    }).then(async res=>{
        const json = await res.json();
        // update form fields so the latest saved values remain visible
        if(json.time_from) document.querySelector('input[name=time_from]').value = json.time_from.slice(0,5);
        if(json.time_to) document.querySelector('input[name=time_to]').value = json.time_to.slice(0,5);
        if(json.percentage !== undefined) document.querySelector('input[name=percentage]').value = json.percentage;

        // show inline success message (non-alert)
        const s = document.getElementById('nd-success');
        s.textContent = 'Night differential saved successfully.';
        s.style.display = 'block';
        // hide after 3s
        setTimeout(()=>{ s.style.display = 'none'; }, 3000);
    }).catch(err=>{
        const s = document.getElementById('nd-success');
        s.textContent = 'An error occurred. Please try again.';
        s.style.display = 'block';
        s.classList.remove('text-success');
        s.classList.add('text-danger');
        setTimeout(()=>{ s.style.display = 'none'; s.classList.remove('text-danger'); s.classList.add('text-success'); }, 4000);
    });
});
</script>
@endsection
