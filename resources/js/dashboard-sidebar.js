window.addEventListener('load', () => {
    const sidebar = document.getElementById('dashboardSidebar');
    const shell = document.querySelector('.dashboard-shell');
    const toggle = document.getElementById('dashboardSidebarToggle');
    const overlay = document.getElementById('dashboardSidebarOverlay');
    const mobileToggle = document.getElementById('dashboardMobileSidebarToggle');

    if (!sidebar || !shell || !toggle) {
        return;
    }

    let openTimeout = null;
    let closeTimeout = null;

    const isMobile = () => window.innerWidth <= 991;

    const clearTimers = () => {
        clearTimeout(openTimeout);
        clearTimeout(closeTimeout);
    };

    const closeExpandedGroups = () => {
        document
            .querySelectorAll('.dashboard-sidebar-group.is-expanded')
            .forEach(group => group.classList.remove('is-expanded'));
    };

    const openSidebar = ({ pinned = false } = {}) => {
        clearTimers();

        if (isMobile()) {
            sidebar.classList.add('is-open');
            shell.classList.add('sidebar-open');
            return;
        }

        sidebar.classList.add('is-hovered');

        if (pinned) {
            sidebar.classList.add('is-open');
            shell.classList.add('sidebar-open');
        }
    };

    const closeSidebar = ({ force = false } = {}) => {
        clearTimers();

        if (!force && sidebar.classList.contains('is-open')) {
            return;
        }

        sidebar.classList.remove('is-hovered');

        if (force || isMobile()) {
            sidebar.classList.remove('is-open');
            shell.classList.remove('sidebar-open');
        }

        closeExpandedGroups();
    };

    const scheduleHoverOpen = () => {
        if (isMobile() || sidebar.classList.contains('is-open')) {
            return;
        }

        clearTimeout(closeTimeout);

        openTimeout = setTimeout(() => {
            sidebar.classList.add('is-hovered');
        }, 150);
    };

    const scheduleHoverClose = () => {
        if (isMobile() || sidebar.classList.contains('is-open')) {
            return;
        }

        clearTimeout(openTimeout);

        closeTimeout = setTimeout(() => {
            closeSidebar();
        }, 250);
    };

    toggle.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (sidebar.classList.contains('is-open')) {
            closeSidebar({ force: true });
        } else {
            openSidebar({ pinned: true });
        }
    });

    if (mobileToggle) {
        mobileToggle.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            openSidebar({ pinned: true });
        });
    }

    sidebar.addEventListener('mouseenter', (event) => {
        if (isMobile()) {
            return;
        }

        if (event.target.closest('.dashboard-sidebar-header')) {
            return;
        }

        scheduleHoverOpen();
    });

    sidebar.addEventListener('mousemove', (event) => {
        if (isMobile() || sidebar.classList.contains('is-open')) {
            return;
        }

        if (event.target.closest('.dashboard-sidebar-header')) {
            clearTimeout(openTimeout);
            return;
        }

        scheduleHoverOpen();
    });

    sidebar.addEventListener('mouseleave', () => {
        scheduleHoverClose();
    });

    if (overlay) {
        overlay.addEventListener('click', () => {
            closeSidebar({ force: true });
        });
    }

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar({ force: true });
        }
    });

    window.addEventListener('resize', () => {
        closeSidebar({ force: true });
    });

    document.querySelectorAll('.dashboard-sidebar-dropdown-toggle').forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (isMobile()) {
                openSidebar({ pinned: true });
            } else if (!sidebar.classList.contains('is-open')) {
                sidebar.classList.add('is-hovered');
            }

            const group = button.closest('.dashboard-sidebar-group');

            if (group) {
                group.classList.toggle('is-expanded');
            }
        });
    });
});