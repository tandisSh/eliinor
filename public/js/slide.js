let slideIndex = 0;  // شروع از اولین اسلاید
showSlides(slideIndex);  // نمایش اسلاید اولیه

// دکمه‌های قبلی و بعدی
function moveSlide(n) {
    showSlides(slideIndex += n);
}

// نمایش اسلاید
function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");  // استفاده از کلاس صحیح برای اسلایدها
    if (n >= slides.length) {
        slideIndex = 0;  // اگر به آخر رسیدیم، به اول برمی‌گردد
    }
    if (n < 0) {
        slideIndex = slides.length - 1;  // اگر به ابتدا رسیدیم، به آخر برمی‌گردد
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  // همه اسلایدها را مخفی می‌کنیم
    }
    slides[slideIndex].style.display = "block";  // اسلاید فعلی را نمایش می‌دهیم
}

// تابع اسلاید خودکار
function autoSlides() {
    let slides = document.getElementsByClassName("slide");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  // همه اسلایدها را مخفی می‌کنیم
    }
    slideIndex++;
    if (slideIndex >= slides.length) {
        slideIndex = 0;  // اگر به آخر رسیدیم، به اول برمی‌گردد
    }
    slides[slideIndex].style.display = "block";  // اسلاید فعلی را نمایش می‌دهیم
    setTimeout(autoSlides, 5000);  // هر 5 ثانیه اسلاید بعدی را نمایش می‌دهیم
}

autoSlides();  // اجرای تابع اسلاید خودکار
