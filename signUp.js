document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const usernameField = document.getElementById("username");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");
    const phoneNumberField = document.getElementById("phoneNumber");
    const nationalCodeField = document.getElementById("nationalCode");
    const degreeField = document.getElementById("degree");

    form.addEventListener("submit", (event) => {
        let isValid = true;

        // Reset previous errors
        document.querySelectorAll(".error").forEach((error) => (error.textContent = ""));

        // Validate username
        if (!usernameField.value.trim()) {
            showError(usernameField, "لطفا نام را وارد کنید*");
            isValid = false;
        } else if (!/^(?!\d)[a-zA-Z0-9آ-ی]{3,}$/.test(usernameField.value)) {
            showError(usernameField, "نام کاربری صحیح نمیباشد*");
            isValid = false;
        }

        // Validate email
        if (!emailField.value.trim()) {
            showError(emailField, "لطفا ایمیل را وارد کنید*");
            isValid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
            showError(emailField, "ایمیل صحیح نمیباشد*");
            isValid = false;
        }

        // Validate password
        if (!passwordField.value.trim()) {
            showError(passwordField, "لطفا رمز عبور را وارد کنید*");
            isValid = false;
        } else if (!/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(passwordField.value)) {
            showError(passwordField, "رمز عبور بین 6 الی 20 کارکتر (شامل حروف بزرگ و کوچک و اعداد*)");
            isValid = false;
        }

        // Validate phone number
        if (!phoneNumberField.value.trim()) {
            showError(phoneNumberField, "لطفا شماره تماس خود را وارد کنید*");
            isValid = false;
        } else if (!/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/.test(phoneNumberField.value)) {
            showError(phoneNumberField, "شماره تلفن صحیح نمیباشد*");
            isValid = false;
        }

        // Validate national code
        if (!nationalCodeField.value.trim()) {
            showError(nationalCodeField, "لطفا کد ملی خود را وارد کنید*");
            isValid = false;
        } else if (!validateNationalCode(nationalCodeField.value)) {
            showError(nationalCodeField, "کد ملی صحیح نمیباشد*");
            isValid = false;
        }

        // Validate degree
        if (!degreeField.value.trim()) {
            showError(degreeField, "لطفا مدرک تحصیلی خود را انتخاب کنید*");
            isValid = false;
        }

        // Prevent submission if validation fails
        if (!isValid) event.preventDefault();
    });

    function showError(field, message) {
        const errorSpan = field.nextElementSibling;
        errorSpan.textContent = message;
    }

    function validateNationalCode(code) {
        if (!/^[0-9]{10}$/.test(code)) return false;
        let sum = 0;
        for (let i = 0; i < 9; i++) sum += parseInt(code[i]) * (10 - i);
        const remainder = sum % 11;
        const checkDigit = parseInt(code[9]);
        return remainder < 2 ? checkDigit === remainder : checkDigit === 11 - remainder;
    }
});
