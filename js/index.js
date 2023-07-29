"use strict"

const contenu1 = document.querySelector('.contenu.i1');
const contenu2 = document.querySelector('.contenu.i2');
const contenu3 = document.querySelector('.contenu.i3');
const slide1 = document.getElementById('slide1');
const slide2 = document.getElementById('slide2');
const slide3 = document.getElementById('slide3');

function startSlide1(){
    contenu1.classList.add('active-1');
    contenu3.classList.remove('active-3');
    contenu2.classList.remove('active-2');
    slide1.classList.add('active');
    slide2.classList.remove('active');
    slide3.classList.remove('active');
}

function startSlide2(){
    contenu3.classList.add('active-3');
    contenu2.classList.remove('active-2');
    contenu1.classList.add('remove-1');
    contenu1.classList.remove('active-1');
    slide2.classList.add('active');
    slide1.classList.remove('active');
    slide3.classList.remove('active');
}

function startSlide3(){
    contenu2.classList.add('active-2');
    contenu1.classList.add('remove-1');
    contenu3.classList.remove('active-3');
    contenu1.classList.remove('active-1');
    slide3.classList.add('active');
    slide1.classList.remove('active');
    slide2.classList.remove('active');
}

slide1.addEventListener("click", startSlide1);
slide2.addEventListener("click", startSlide2);
slide3.addEventListener("click", startSlide3);

setInterval(startSlide2, 5000)
setInterval(startSlide3, 10000)
setInterval(startSlide1, 15000)

//second slide zone
const next = document.querySelector('.next');
const prev = document.querySelector('.prev');
const carousel = document.querySelector('.carousel-inner');

function n_item(){
    carousel.classList.add("n-active");
    carousel.classList.remove("p-active");
}
next.addEventListener("click", n_item)

function p_item(){
    carousel.classList.add("p-active");
    carousel.classList.remove("n-active");
}
prev.addEventListener("click", p_item)


//Menu Burger
function toggleMenu(){
    const toggleMenu = document.querySelector('.toggleMenu');
    const navbar = document.querySelector(".navbar");
    const logo = document.querySelector(".logo");
    toggleMenu.classList.toggle('active');
    navbar.classList.toggle('active');
    logo.classList.toggle('active');
}

