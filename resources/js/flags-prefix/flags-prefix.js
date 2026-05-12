import intlTelInput from "intl-tel-input";
import "intl-tel-input/build/js/utils.js";

document.addEventListener("DOMContentLoaded", () => {
    const input = document.querySelector("#phone");

    if (input) {
        const iti = intlTelInput(input, {
            initialCountry: "it",
            separateDialCode: true,
            preferredCountries: ["it", "fr", "de"],
        });

        const form = input.closest("form");

        form.addEventListener("submit", function () {
            document.querySelector("#full_phone").value = iti.getNumber();
        });
    }
});