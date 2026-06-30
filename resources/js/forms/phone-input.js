import intlTelInput from "intl-tel-input";
import "intl-tel-input/build/js/utils.js";

document.addEventListener("DOMContentLoaded", () => {

    const phoneInputs = document.querySelectorAll("[data-phone-input]");

    phoneInputs.forEach((input) => {

        const iti = intlTelInput(input, {
            initialCountry: "it",
            separateDialCode: true,
            preferredCountries: ["it", "fr", "de"],
            dropdownContainer: document.body,
        });

        const form = input.closest("form");

        if (!form) {
            return;
        }

        form.addEventListener("submit", () => {
            const targetName = input.dataset.phoneTarget;
            const hiddenInput = form.querySelector(`input[name="${targetName}"]`);

            if (!hiddenInput) {
                return;
            }

            const rawValue = input.value.trim();

            if (!rawValue) {
                hiddenInput.value = "";
                return;
            }

            const intlNumber = iti.getNumber();

            if (intlNumber) {
                hiddenInput.value = intlNumber;
                return;
            }

            const countryData = iti.getSelectedCountryData();
            const dialCode = countryData?.dialCode ? `+${countryData.dialCode}` : "";

            const cleanNumber = rawValue.replace(/[^\d]/g, "");

            hiddenInput.value = `${dialCode}${cleanNumber}`;
        });

    });

});