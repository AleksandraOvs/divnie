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
  slidesPerView: 1.2,
  spaceBetween: 20,
  navigation: {
    nextEl: '.slider-testim-next',
    prevEl: '.slider-testim-prev',
  },
  breakpoints: {
    992: {
      slidesPerView: 3,
      spaceBetween: 40,
    },

    576: {
      slidesPerView: 1.8,
    }
  }
  //loop: true,
});

const projectGridSwiper = new Swiper('.projects-grid', {
  slidesPerView: 1.2,
  spaceBetween: 20,
  // navigation: {
  //   nextEl: '.slider-testim-next',
  //   prevEl: '.slider-testim-prev',
  // },
  //loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    992: {
      slidesPerView: 3,
      spaceBetween: 40,
    },

    576: {
      slidesPerView: 1.8,
    }
  }
});

const projectSwiper = new Swiper('.projects-slider', {
  slidesPerView: 1,
  // navigation: {
  //   nextEl: '.slider-testim-next',
  //   prevEl: '.slider-testim-prev',
  // },
  //loop: true,
});

new Swiper('.windows-types', {
  loop: true,
  slidesPerView: 3,
  spaceBetween: 20,
  // navigation: {
  //     nextEl: '.swiper-button-next',
  //     prevEl: '.swiper-button-prev',
  // },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    320: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 4 }
  }
});

document.addEventListener('DOMContentLoaded', function () {
  const sliders = document.querySelectorAll('.project-swiper');
  sliders.forEach(function (sliderEl) {
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

new Swiper('.block-slider', {
  slidesPerView: 2,
  spaceBetween: 24,
  // loop: true,
  // pagination: {
  //   el: '.slider-pagination',
  //   clickable: true,
  // },
  pagination: {
    el: ".slider-pagination",
    clickable: true,
  },
  // breakpoints: {
  //   1200: {
  //     slidesPerView: 4,
  //     spaceBetween: 40,
  //   },

  //   1024: {
  //     slidesPerView: 3,
  //   },
  //   662: {
  //     slidesPerView: 2.4,
  //   }
  // }
});