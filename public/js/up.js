document.addEventListener("DOMContentLoaded", function () {

    
    const form = document.querySelector("form");
form.addEventListener("submit", function (e) {
    e.preventDefault(); // جلوگیری از ارسال فرم
    console.log("فرم ارسال نشد!");
});
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const productName = document.getElementById("pro-name");
    const productQty = document.getElementById("pro-qty");
    const productPrice = document.getElementById("pro-price");
    const productCategory = document.getElementById("pro_category_id");
    const productImage = document.getElementById("image-upload");
    const productDetail = document.getElementById("pro-detail");

    // اضافه کردن رویداد برای ارسال فرم
    form.addEventListener("submit", function (e) {
        let valid = true;

        // پاک کردن پیام‌های خطا قبلی
        document.querySelectorAll(".error-message").forEach((msg) => msg.remove());

        // ولیدیشن نام کالا
        if (productName.value.trim() === "") {
            showError(productName, "نام کالا را وارد کنید.");
            valid = false;
        }

        // ولیدیشن موجودی کالا
        if (productQty.value.trim() === "" || isNaN(productQty.value) || productQty.value <= 0) {
            showError(productQty, "موجودی کالا باید عددی معتبر باشد.");
            valid = false;
        }

        // ولیدیشن قیمت کالا
        if (productPrice.value.trim() === "" || isNaN(productPrice.value) || productPrice.value <= 0) {
            showError(productPrice, "قیمت کالا باید عددی معتبر باشد.");
            valid = false;
        }

        // ولیدیشن دسته‌بندی کالا
        if (!productCategory.value) {
            showError(productCategory, "دسته‌بندی کالا را انتخاب کنید.");
            valid = false;
        }

        // ولیدیشن تصویر کالا
        if (productImage.files.length === 0) {
            showError(productImage, "یک تصویر برای کالا آپلود کنید.");
            valid = false;
        }

        // ولیدیشن توضیحات کالا
        if (productDetail.value.trim() === "") {
            showError(productDetail, "توضیحات کالا را وارد کنید.");
            valid = false;
        }

        // اگر فرم معتبر نبود، ارسال فرم را متوقف کن
        if (!valid) {
            e.preventDefault();
        }
    });

    // تابع نمایش خطا
    function showError(input, message) {
        const error = document.createElement("span");
        error.classList.add("error-message");
        error.style.color = "red";
        error.style.fontSize = "12px";
        error.textContent = message;

        // بررسی اینکه کجا پیام خطا را نمایش دهیم
        if (input.type === "file") {
            input.parentElement.appendChild(error);
        } else if (input.tagName === "SELECT" || input.tagName === "TEXTAREA") {
            input.parentElement.appendChild(error);
        } else {
            input.parentElement.appendChild(error);
        }
    }

    // رویداد برای نمایش نام فایل انتخاب‌شده
    productImage.addEventListener("change", function () {
        const fileNameSpan = document.getElementById("file-name");
        fileNameSpan.textContent =
            productImage.files.length > 0 ? productImage.files[0].name : "هیچ فایلی انتخاب نشده است";
    });
});