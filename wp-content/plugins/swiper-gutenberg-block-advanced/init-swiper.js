document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.swiper').forEach(function(el) {
    var mobile = parseInt(el.dataset.mobile) || 1;
    var tablet = parseInt(el.dataset.tablet) || 2;
    var desktop = parseInt(el.dataset.desktop) || 3;
    var autoplayEnabled = (el.dataset.autoplay === 'true');
    var delay = parseInt(el.dataset.delay) || 3000;
    var autoHeight = (el.dataset.autoheight === 'true');

    new Swiper(el, {
      loop: true,
      autoHeight: autoHeight,
      breakpoints: {
        320: { slidesPerView: mobile },
        768: { slidesPerView: tablet },
        1024: { slidesPerView: desktop }
      },
      pagination: {
        el: el.querySelector('.swiper-pagination'),
        clickable: true
      },
      navigation: {
        nextEl: el.querySelector('.swiper-button-next'),
        prevEl: el.querySelector('.swiper-button-prev')
      },
      autoplay: autoplayEnabled ? {
        delay: delay,
        disableOnInteraction: false
      } : false,
      lazy: { loadOnTransitionStart: true, loadPrevNext: true }
    });
  });
});
