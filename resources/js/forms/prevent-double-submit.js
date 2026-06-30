document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("[data-prevent-double-submit]");

    forms.forEach((form) => {
        form.addEventListener("submit", () => {
            const submitButtons = form.querySelectorAll("[data-submit-button]");

            submitButtons.forEach((button) => {
                button.disabled = true;
                button.setAttribute("aria-disabled", "true");
                button.classList.add("is-loading");
            });
        });
    });
});