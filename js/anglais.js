"use strict"

//Menu burger
function toggleMenu() {
    const toggleMenu = document.querySelector('.toggleMenu');
    const navbar = document.querySelectorAll(".navbar");
    const nav = document.querySelector("nav");
    const logo = document.querySelector(".logo");
    toggleMenu.classList.toggle('active');
    navbar[0].classList.toggle('active');
    navbar[1].classList.toggle('active');
    nav.classList.toggle('active');
    logo.classList.toggle('active');
}

//Systéme de navigation par onglets

var tabs = document.querySelectorAll('.tab-list li');
var tabContent = document.querySelectorAll('.container');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        const tabId = tab.dataset.tab;
        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tab.classList.add('active');

        tabContent.forEach(tabContent => {
            if (tabContent.dataset.tab === tabId) {
                tabContent.classList.add('active');
            } else {
                tabContent.classList.remove('active');
            }
        });
    });
});


//barre des chapitres
if (window.innerWidth < 650) {
var chap = document.querySelector('.tab-list');
var liste = document.querySelectorAll('.liste ul li');

chap.addEventListener('mouseover', function (event) {
    liste.forEach(function (li) {
        li.style.display = 'block';
    });
});
chap.addEventListener('mouseout', function (event) {
    liste.forEach(function (li) {
        if (li.classList.contains("active")) {
            li.style.display = 'block';
        } else {
            li.style.display = 'none';
        }
    });
});
}