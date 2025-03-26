// {{-- Swiper Script --}}
const swiper = new Swiper(".swiper-container", {
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    effect: "fade",
    speed: 1000,
});

document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".pengumuman-slider", {
        loop: true, // Agar bisa berputar terus
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000, // Ganti slide setiap 3 detik
            disableOnInteraction: false,
        },
        speed: 600, // Kecepatan transisi
    });
});
