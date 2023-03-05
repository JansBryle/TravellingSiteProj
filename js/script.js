let menu = document.querySelector('#menu-btn');
let bar = document.querySelector('.header .bar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    bar.classList.toggle('active');

};
var swiper = new Swiper(".home-slider", {
    loop:true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });