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
document.addEventListener("DOMContentLoaded", function() {
    const grid = document.querySelector('.services__grid');
    const cards = document.querySelectorAll('.services__card');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const cardWidth = cards[0].offsetWidth + parseFloat(getComputedStyle(cards[0]).marginRight) * 2;
    const cardsToShow = 3;
    let currentIndex = 0;

    function updateCarousel() {
        grid.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
    }

    nextButton.addEventListener('click', () => {
        if (currentIndex < cards.length - cardsToShow) {
            currentIndex++;
            updateCarousel();
        }
    });

    prevButton.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    document.querySelectorAll('.services__card').forEach(card => {
        card.onclick = () => {
            window.location.href = '/services';
        };
    });
});
