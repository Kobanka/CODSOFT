import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Menu Management

const hamburger = document.querySelector('#hamburger'),
        navToggle = document.querySelector('#menu'),
        navClose = document.querySelector('#times'),
        navMenu = document.querySelector('#nav')
        // header = document.querySelector('header')

    
// Menu Show
if (hamburger){
    hamburger.addEventListener('click',()=>{
        navMenu.classList.toggle('show-menu')
        navToggle.classList.toggle('menu')
        navClose.classList.toggle('times')
    })
}

// Menu hidden
if (hamburger) {
    hamburger.addEventListener('click',()=>{
        navMenu.classList.toggle('hideMenu')
    })
}

// Menu showed
if (hamburger) {
    hamburger.addEventListener('click',()=>{
        navMenu.classList.toggle('showMenu')
    })
}

// Change Background on scroll effect
// document.addEventListener('scroll', () => {

//     if(window.scrollY > 0){
//         header.classList.add('scrolled')
//     }
//     else{
//         header.classList.remove('scrolled')
//     }
    
// })

// Hide registration notification
const wrapper = document.querySelector('#query'),
                  emp = document.querySelector('#employer'),
                  cand = document.querySelector('#candidate'),
                  form = document.querySelector('#form'),
                  cname = document.querySelector('#cname'),
                  fname = document.querySelector('#fname'),
                  temp = document.querySelector('#roleInput')

if (emp){
    emp.addEventListener('click', function(){
        wrapper.classList.add('hidden')
        form.classList.remove('hidden')
        cname.classList.remove('hidden')
        temp.value = emp.value
    })
}

if (cand){
    cand.addEventListener('click', function(){
        wrapper.classList.add('hidden')
        form.classList.remove('hidden')
        fname.classList.remove('hidden')
        temp.value = cand.value
    })
}

// export default role

/*==================== REMOVE MENU MOBILE ====================*/
// const navLink = document.querySelectorAll('.nav_link')

// function linkAction(){
//     // When we click on each nav__link, we remove the show-menu class
//     navMenu.classList.remove('show-menu')
// }
// navLink.forEach(n => n.addEventListener('click', linkAction))