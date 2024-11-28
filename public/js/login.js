document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const emailField = document.getElementById("email");
    const passwordField = document.getElementById("password");

    form.addEventListener("submit", (event) => {
        let isValid = true;

        // Reset previous errors
        document.querySelectorAll(".error").forEach((error) => (error.textContent = ""));

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

        // Prevent submission if validation fails
        if (!isValid) event.preventDefault();
    });

    function showError(field, message) {
        const errorSpan = field.nextElementSibling;
        errorSpan.textContent = message;
    }
});
