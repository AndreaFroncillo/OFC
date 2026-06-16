console.log('dashboard-sidebar loaded');

window.addEventListener('load', () => {
    const sidebar = document.getElementById('dashboardSidebar');
    const shell = document.querySelector('.dashboard-shell');
    const toggle = document.getElementById('dashboardSidebarToggle');

    if (!sidebar || !shell || !toggle) {
        return;
    }

    let openTimeout = null;
    let closeTimeout = null;

    const clearTimers = () => {
        clearTimeout(openTimeout);
        clearTimeout(closeTimeout);
    };

    const openSidebar = ({ pinned = false } = {}) => {
        clearTimers();

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

        if (force) {
            sidebar.classList.remove('is-open');
            shell.classList.remove('sidebar-open');
        }

        document
            .querySelectorAll('.dashboard-sidebar-group.is-expanded')
            .forEach(group => group.classList.remove('is-expanded'));
    };

    const scheduleHoverOpen = () => {
        if (sidebar.classList.contains('is-open')) {
            return;
        }

        clearTimeout(closeTimeout);

        openTimeout = setTimeout(() => {
            sidebar.classList.add('is-hovered');
        }, 150);
    };

    const scheduleHoverClose = () => {
        if (sidebar.classList.contains('is-open')) {
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

    sidebar.addEventListener('mouseenter', (event) => {
        if (event.target.closest('.dashboard-sidebar-header')) {
            return;
        }

        scheduleHoverOpen();
    });

    sidebar.addEventListener('mousemove', (event) => {
        if (sidebar.classList.contains('is-open')) {
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

    document.querySelectorAll('.dashboard-sidebar-dropdown-toggle').forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (!sidebar.classList.contains('is-open')) {
                sidebar.classList.add('is-hovered');
            }

            const group = button.closest('.dashboard-sidebar-group');

            if (group) {
                group.classList.toggle('is-expanded');
            }
        });
    });
});