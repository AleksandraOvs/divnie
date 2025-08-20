new Swiper('.hero-slider', {
  slidesPerView: 1,
  effect: 'fade',
  // loop: true,
  pagination: {
    el: '.slider-pagination',
    clickable: true,
  },
  // navigation: {
  //     nextEl: '.hero-button-next',
  //     prevEl: '.hero-button-prev',
  //     lockClass: 'hide'
  // },
});

const swiperTestim = new Swiper('.testimonials-slider', {
  slidesPerView: 3,
  spaceBetween: 20,
  navigation: {
    nextEl: '.slider-testim-next',
    prevEl: '.slider-testim-prev',
  },
  breakpoints:{
    992:{
      spaceBetween: 40,
    }
  }
  //loop: true,
});

const projectSwiper = new Swiper('.project-slider', {
  slidesPerView: 1,
  // navigation: {
  //   nextEl: '.slider-testim-next',
  //   prevEl: '.slider-testim-prev',
  // },
  loop: true,
});

document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.project-swiper');
    sliders.forEach(function(sliderEl){
        new Swiper(sliderEl, {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: sliderEl.querySelector('.swiper-pagination'),
                clickable: true,
            },
        });
    });

    // Fancybox — автоматически инициализируется по data-fancybox
    //Fancybox.bind("[data-fancybox]", {});
});