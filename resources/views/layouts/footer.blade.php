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
    // ───────────────────────────────
    // 1. SIDEBAR + HAMBURGER + FULLSCREEN
    // ───────────────────────────────
    const secondary   = document.querySelector(".ps-container.sidebar-left-secondary");
    const navLeft     = document.querySelector(".navigation-left");
    const sideWrap    = document.querySelector(".side-content-wrap");
    const overlay     = document.querySelector(".sidebar-overlay");
    const hamburger   = document.querySelector(".menu-toggle");

    // Sidebar hover logic (desktop)
    if (secondary && navLeft) {
        const navItems = new Map();
        navLeft.querySelectorAll(":scope > .nav-item[data-item]").forEach(li => {
            const key = (li.dataset.item || "").trim().toLowerCase();
            if (key) navItems.set(key, li);
        });

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

        navItems.forEach((li, key) => {
            li.addEventListener("mouseenter", () => {
                if (window.innerWidth > 1200) activate(key);
            });
        });

        // Default dashboard
        activate("dashboard");
    }

    // Close sidebar on outside click
    document.addEventListener("click", e => {
        const isMobile = window.innerWidth <= 1200;
        if (isMobile && sideWrap && overlay && !sideWrap.contains(e.target) && !e.target.closest(".menu-toggle")) {
            sideWrap.classList.remove("active");
            overlay.classList.remove("active");
            secondary?.classList.remove("open");
        } else if (!isMobile && secondary && !secondary.contains(e.target) && !navLeft?.contains(e.target)) {
            secondary.classList.remove("open");
        }
    });

    // Hamburger
    if (hamburger && sideWrap && overlay) {
        hamburger.addEventListener("click", () => {
            sideWrap.classList.toggle("active");
            overlay.classList.toggle("active");
        });
        overlay.addEventListener("click", () => {
            sideWrap.classList.remove("active");
            overlay.classList.remove("active");
        });
        document.addEventListener("keydown", e => {
            if (e.key === "Escape" && sideWrap?.classList.contains("active")) {
                sideWrap.classList.remove("active");
                overlay.classList.remove("active");
            }
        });
    }

    // Fullscreen
    document.querySelectorAll('.i-Full-Screen').forEach(btn => {
        btn.style.cursor = 'pointer';
        btn.addEventListener('click', () => {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        });
    });

    // Sidemenu dropdowns
    document.querySelectorAll('.dropdown-sidemenu > a').forEach(a => {
        a.addEventListener('click', e => {
            e.preventDefault();
            const li = a.parentElement;
            const submenu = li.querySelector('.submenu');
            const wasOpen = li.classList.contains('open');

            li.parentElement.querySelectorAll('.dropdown-sidemenu.open').forEach(open => {
                if (open !== li) {
                    open.classList.remove('open');
                    open.querySelector('.submenu')?.style.setProperty('display', 'none');
                }
            });

            li.classList.toggle('open', !wasOpen);
            if (submenu) submenu.style.display = li.classList.contains('open') ? 'block' : 'none';
        });
    });

    // ───────────────────────────────
    // 2. HEADER DROPDOWNS (avatar, branch, bell)
    // ───────────────────────────────
    document.querySelectorAll('.header-dropdown-toggle').forEach(btn => {
        const menu = btn.closest('.dropdown, .btn-group')?.querySelector('.dropdown-menu');
        if (!menu) return;

        btn.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();

            const isOpen = menu.classList.contains('show');

            // Close all header dropdowns
            document.querySelectorAll('.header-dropdown-toggle')
                .forEach(b => b.closest('.dropdown, .btn-group')
                    ?.querySelector('.dropdown-menu')
                    ?.classList.remove('show')
                );

            if (!isOpen) menu.classList.add('show');
        });
    });

    // Close on outside click
    document.addEventListener('click', () => {
        document.querySelectorAll('.header-dropdown-toggle')
            .forEach(b => b.closest('.dropdown, .btn-group')
                ?.querySelector('.dropdown-menu')
                ?.classList.remove('show')
            );
    });

    // Prevent menu click from closing
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('click', e => e.stopPropagation());
    });

    // ESC key
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }
    });

    // ───────────────────────────────
    // 3. CLEAR CACHE
    // ───────────────────────────────
    document.getElementById('clearCacheLink')?.addEventListener('click', function (e) {
        e.preventDefault();
        const original = this.innerHTML;
        this.innerHTML = '<i class="fa fa-spinner fa-spin mr-1"></i> Clearing...';

        axios.post('{{ route("clear-cache") }}')
            .then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Application cache cleared!',
                    timer: 2000,
                    showConfirmButton: false
                });
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: 'Could not clear cache.',
                    timer: 2500,
                    showConfirmButton: false
                });
            })
            .finally(() => {
                setTimeout(() => {
                    this.innerHTML = original;
                }, 500);
            });
    });
});

// ───────────────────────────────
// 4. BRANCH SWITCH (WORKING 100%)
// ───────────────────────────────
function switchBranch(branchId, branchName) {
    const nameEl = document.getElementById('currentBranchName');
    const oldName = nameEl.textContent.trim();
    nameEl.textContent = 'Switching...';

    fetch('{{ route("switch-branch") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ branch_id: branchId })
    })
    .then(response => {
        if (!response.ok) throw new Error();
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Update UI
            nameEl.textContent = branchName;

            // Update active state in dropdown
            document.querySelectorAll('#branchDropdownToggle')
                .forEach(btn => {
                    const menu = btn.closest('.dropdown')?.querySelector('.dropdown-menu');
                    if (menu) {
                        menu.querySelectorAll('.dropdown-item').forEach(item => {
                            item.classList.toggle('active', item.textContent.trim() === branchName.trim());
                        });
                    }
                });

            // SUCCESS: Centered, auto-close after 2 seconds (like your sample)
            Swal.fire({
                icon: 'success',
                title: 'Branch Switched!',
                html: `Now using <strong>${branchName}</strong>`,
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: false,                    // ← makes it center (not toast)
                position: 'center',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showClass: { popup: 'animate__animated animate__fadeInDown faster' },
                hideClass: { popup: 'animate__animated animate__fadeOutUp faster' }
            });
        } else {
            throw new Error();
        }
    })
    .catch(() => {
        nameEl.textContent = oldName;
        Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Cannot switch to this branch.',
            timer: 2500,
            showConfirmButton: false
        });
    });
}
</script>
