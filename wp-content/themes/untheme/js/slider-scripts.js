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

const portfolioSwiper = new Swiper('.projects-slider', {
  slidesPerView: 1,
  spaceBetween: 0,
	//centeredSlides: true,
  loop: true,
  //loop: true,
  //effect: 'fade',
  grabCursor: true,
  // navigation: {
  // nextEl: '.portfolio-slider__button-next',
  // prevEl: '.portfolio-slider__button-prev',
  // lockClass: 'hide-navi'
  //  },
  navigation: {
    nextEl: '.slider-projects-next',
    prevEl: '.slider-projects-prev',
  },
  // breakpoints: {
  //   1200: {
  //     slidesPerView: 3,
  //     spaceBetween: 0,
	// 	centeredSlides: false
  //   },
  //   768: {
  //     slidesPerView: 3,
	// centeredSlides: true,
  //     spaceBetween: 0,
  //     loop: false,
      
  //   },
  //   576: {
  //     spaceBetween: 0,
  //     slidesPerView: 3,
  //   }
  // }

});

const swiperTestim = new Swiper('.testimonials-slider', {
  slidesPerView: 3,
  spaceBetween: 40,
  navigation: {
    nextEl: '.slider-testim-next',
    prevEl: '.slider-testim-prev',
  },
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
