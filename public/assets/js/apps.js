// Mendapatkan elemen tombol menu, tautan navigasi, dan ikon tombol menu
const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

// Menambahkan event listener untuk tombol menu
menuBtn.addEventListener("click", (e) => {
    // Toggle kelas 'open' pada tautan navigasi
    navLinks.classList.toggle("open");

    // Mengganti ikon tombol menu berdasarkan keadaan tautan navigasi
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute(
        "class",
        isOpen ? "ri-close-line" : "ri-menu-line"
    );
});

// Menambahkan event listener untuk tautan navigasi
navLinks.addEventListener("click", (e) => {
    // Menghapus kelas 'open' pada tautan navigasi
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
});

// Opsi ScrollReveal untuk mengatur animasi scroll
const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};

// Animasi ScrollReveal untuk kontainer header
ScrollReveal().reveal(".header__container h1", {
    ...scrollRevealOption,
});

ScrollReveal().reveal(".header__container .btn", {
    ...scrollRevealOption,
    delay: 500,
});

// Animasi ScrollReveal untuk kontainer about
ScrollReveal().reveal(".about__item", {
    ...scrollRevealOption,
    interval: 500,
});

// Animasi ScrollReveal untuk kontainer contact
ScrollReveal().reveal(".contact__image img", {
    ...scrollRevealOption,
    origin: "right",
    interval: 500,
});

ScrollReveal().reveal(".contact__card", {
    interval: 500,
    duration: 500,
    delay: 1000,
});

// Animasi ScrollReveal untuk kontainer blog
ScrollReveal().reveal(".blog__card", {
    ...scrollRevealOption,
    interval: 500,
});

// Inisialisasi Swiper untuk slider
const swiper = new Swiper(".swiper", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
    },
});

// Mendapatkan elemen kontainer, tombol register, dan tombol login
const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

// Menambahkan event listener untuk tombol register
registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

// Menambahkan event listener untuk tombol login
loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

// Tombol 'Read More' pada layanan
const serviceReadMoreBtns = document.querySelectorAll(
    ".header__container .btn.btn__secondary"
);
serviceReadMoreBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const services = document.getElementById("services");
        services.scrollIntoView({ behavior: "smooth" });
    });
});

// Script untuk carousel layanan
document.addEventListener("DOMContentLoaded", function() {
    const grid = document.querySelector('.services__grid');
    const cards = document.querySelectorAll('.services__card');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const cardWidth = cards[0].offsetWidth + parseFloat(getComputedStyle(cards[0]).marginRight) * 2;
    const cardsToShow = 3;
    let currentIndex = 0;

    // Fungsi untuk memperbarui posisi carousel
    function updateCarousel() {
        grid.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
    }

    // Event listener untuk tombol 'next'
    nextButton.addEventListener('click', () => {
        if (currentIndex < cards.length - cardsToShow) {
            currentIndex++;
            updateCarousel();
        }
    });

    // Event listener untuk tombol 'prev'
    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    // Mengarahkan pengguna ke halaman layanan saat kartu layanan diklik
    document.querySelectorAll('.services__card').forEach(card => {
        card.onclick = () => {
            window.location.href = '/services';
        };
    });

    // Menambahkan efek hover pada kartu layanan
    document.querySelectorAll('.services__card').forEach(card => {
        card.addEventListener('mouseover', () => {
            card.classList.add('hover');
        });

        card.addEventListener('mouseout', () => {
            card.classList.remove('hover');
        });
    });
});
