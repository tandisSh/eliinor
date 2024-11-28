const uploadButton = document.getElementById("upload-button");
const fileInput = document.getElementById("image-upload");
const fileNameDisplay = document.getElementById("file-name");

// کلیک روی دکمه آپلود
uploadButton.addEventListener("click", () => {
    fileInput.click();
});

// نمایش نام فایل انتخاب‌شده
fileInput.addEventListener("change", () => {
    const fileName = fileInput.files[0] ? fileInput.files[0].name : "هیچ فایلی انتخاب نشده است";
    fileNameDisplay.textContent = fileName;
});
