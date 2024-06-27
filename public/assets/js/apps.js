const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
    navLinks.classList.toggle("open");

    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute(
        "class",
        isOpen ? "ri-close-line" : "ri-menu-line"
    );
});

navLinks.addEventListener("click", (e) => {
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class", "ri-menu-line");
});

const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};

// header container
ScrollReveal().reveal(".header__container h1", {
    ...scrollRevealOption,
});

ScrollReveal().reveal(".header__container .btn", {
    ...scrollRevealOption,
    delay: 500,
});

// about container
ScrollReveal().reveal(".about__item", {
    ...scrollRevealOption,
    interval: 500,
});

// contact container
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

// blog container
ScrollReveal().reveal(".blog__card", {
    ...scrollRevealOption,
    interval: 500,
});

const swiper = new Swiper(".swiper", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
    },
});

const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
    container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    container.classList.remove("active");
});

// Service read more button
const serviceReadMoreBtns = document.querySelectorAll(
    ".header__container .btn.btn__secondary"
);
serviceReadMoreBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const services = document.getElementById("services");
        services.scrollIntoView({ behavior: "smooth" });
    });
});

// serviceshome.js
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.services__carousel');
    const grid = document.querySelector('.services__grid');
    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
        isDown = true;
        grid.classList.add('active');
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
    });

    carousel.addEventListener('mouseleave', () => {
        isDown = false;
        grid.classList.remove('active');
    });

    carousel.addEventListener('mouseup', () => {
        isDown = false;
        grid.classList.remove('active');
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        carousel.scrollLeft = scrollLeft - walk;
    });
});
