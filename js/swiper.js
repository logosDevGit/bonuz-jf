import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'
  
const swiper = new Swiper('.swiper', {
    speed: 400,
    spaceBetween: 100,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

console.log("teste")

export default swiper