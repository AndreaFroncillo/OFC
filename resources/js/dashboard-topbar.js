window.addEventListener('load', () => {
    const profileWrapper = document.getElementById('dashboardTopbarProfileWrapper');
    const profileToggle = document.getElementById('dashboardTopbarProfileToggle');

    if (!profileWrapper || !profileToggle) {
        return;
    }

    const closeProfileMenu = () => {
        profileWrapper.classList.remove('is-open');
        profileToggle.setAttribute('aria-expanded', 'false');
    };

    const toggleProfileMenu = () => {
        const isOpen = profileWrapper.classList.toggle('is-open');

        profileToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    };

    profileToggle.addEventListener('click', (event) => {
        event.preventDefault();
        event.stopPropagation();

        toggleProfileMenu();
    });

    document.addEventListener('click', () => {
        closeProfileMenu();
    });

    profileWrapper.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeProfileMenu();
        }
    });
});