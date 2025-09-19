<div data-v-40d489d5="" class="footer_wrap">
   <div data-v-40d489d5="" class="flex-grow-1"></div>
   <div data-v-40d489d5="" class="app-footer">
      <div data-v-40d489d5="" class="row">
         <div data-v-40d489d5="" class="col-md-9">
            <p data-v-40d489d5=""><strong data-v-40d489d5="">Omnisystems Solutions, Inc.</strong></p>
         </div>
      </div>
      <div data-v-40d489d5="" class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
         <div data-v-40d489d5="" class="d-flex align-items-center">
            <img data-v-40d489d5="" src="/images/logo-default.png" alt="" width="60" height="60" class="logo"> 
            <div data-v-40d489d5="">
               <div data-v-40d489d5="">
                  <p data-v-40d489d5="" class="m-0">
                     © 2025
                     Developed by
                     Omnisystems Solutions, Inc.
                  </p>
                  <p data-v-40d489d5="" class="m-0">All rights reserved - v4.0.6</p>
               </div>
            </div>
            <span data-v-40d489d5="" class="flex-grow-1"></span>
         </div>
      </div>
   </div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const secondary = document.querySelector(".ps-container.sidebar-left-secondary.ps.rtl-ps-none");
  const navLeft = document.querySelector(".navigation-left");
  const sideWrap = document.querySelector(".side-content-wrap");
  const overlay = document.querySelector(".sidebar-overlay"); // 👈 overlay element
  const hamburger = document.querySelector(".menu-toggle");   // 👈 your hamburger button

  if (secondary && navLeft) {
    // Map data-item -> nav-item
    const navItems = new Map();
    navLeft.querySelectorAll(":scope > .nav-item[data-item]").forEach(li => {
      const key = (li.dataset.item || "").trim().toLowerCase();
      if (key) navItems.set(key, li);
    });

    // Map data-parent -> childNav <ul>
    const childMap = new Map();
    secondary.querySelectorAll(":scope > div > ul.childNav[data-parent]").forEach(ul => {
      const key = (ul.dataset.parent || "").trim().toLowerCase();
      if (key) childMap.set(key, ul);
    });

    function deactivateAll() {
      navItems.forEach(li => li.classList.remove("active"));
      childMap.forEach(ul => {
        ul.classList.remove("d-block");
        ul.classList.add("d-none");
      });
    }

    function activate(key) {
      const li = navItems.get(key);
      const ul = childMap.get(key);
      if (!li || !ul) return;
      deactivateAll();
      li.classList.add("active");
      ul.classList.remove("d-none");
      ul.classList.add("d-block");
      secondary.classList.add("open");
    }

    // Attach hover events
    navItems.forEach((li, key) => {
      li.addEventListener("mouseenter", () => activate(key));
    });

    document.addEventListener("click", (e) => {
  const isSmall = window.matchMedia("(max-width: 1200px)").matches;

  if (isSmall) {
    // 👉 Mobile: close the whole sidebar + overlay
    if (sideWrap && overlay && !sideWrap.contains(e.target) && !e.target.closest(".menu-toggle")) {
      sideWrap.classList.remove("active");
      overlay.classList.remove("active");
      deactivateAll();
      secondary.classList.remove("open");
    }
  } else {
    // 👉 Desktop: only close the secondary if clicked outside
    if (!secondary.contains(e.target) && !navLeft.contains(e.target)) {
      deactivateAll();
      secondary.classList.remove("open");
    }
  }
});


    // Dropdown toggle in side menu
    document.querySelectorAll('.dropdown-sidemenu > a').forEach(dropdownToggle => {
      dropdownToggle.addEventListener('click', function (e) {
        e.preventDefault();

        const parentLi = this.parentElement;

        // Close others at same level
        parentLi.parentElement.querySelectorAll('.dropdown-sidemenu.open').forEach(openLi => {
          if (openLi !== parentLi) {
            openLi.classList.remove('open');
            const submenu = openLi.querySelector('.submenu');
            if (submenu) submenu.style.display = "none";
          }
        });

        // Toggle current
        parentLi.classList.toggle('open');
        const submenu = parentLi.querySelector('.submenu');
        if (submenu) {
          submenu.style.display = parentLi.classList.contains('open') ? "block" : "none";
        }
      });
    });

    // Default open = dashboard
    activate("dashboard");
  }

  // Scroll lock inside side-content-wrap
  if (sideWrap) {
    sideWrap.addEventListener('wheel', e => {
      const { scrollTop, scrollHeight, clientHeight } = sideWrap;
      const atTop = scrollTop === 0;
      const atBottom = scrollTop + clientHeight >= scrollHeight;

      if ((atTop && e.deltaY < 0) || (atBottom && e.deltaY > 0)) {
        e.preventDefault();
      }
    }, { passive: false });

    let startY = 0;
    sideWrap.addEventListener('touchstart', e => {
      startY = e.touches[0].clientY;
    });
    sideWrap.addEventListener('touchmove', e => {
      const { scrollTop, scrollHeight, clientHeight } = sideWrap;
      const currentY = e.touches[0].clientY;
      const diff = startY - currentY;

      const atTop = scrollTop === 0;
      const atBottom = scrollTop + clientHeight >= scrollHeight;

      if ((atTop && diff < 0) || (atBottom && diff > 0)) {
        e.preventDefault();
      }
    }, { passive: false });
  }

  // 👇 Hamburger + Overlay logic
  if (hamburger && sideWrap && overlay) {
    function closeSidebar() {
      sideWrap.classList.remove("active");
      overlay.classList.remove("active");
    }

    hamburger.addEventListener("click", () => {
      sideWrap.classList.toggle("active");
      overlay.classList.toggle("active");
    });

    overlay.addEventListener("click", closeSidebar);

    // Close with ESC
    document.addEventListener("keydown", e => {
      if (e.key === "Escape") closeSidebar();
    });
  }
});
</script>
