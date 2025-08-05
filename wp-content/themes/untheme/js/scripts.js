document.addEventListener("DOMContentLoaded", () => {

    if (window.innerWidth > 1024) {
    const parent = document.querySelector('.menu-item-has-children');
    if (parent) {
        const link = parent.querySelector('a'); // первый <a> в parent
        const submenu = parent.querySelector('.dropdown-menu'); // первый <ul> в parent

        // Показываем меню при наведении мыши
        parent.addEventListener('mouseenter', () => {
            submenu.style.display = 'block';
        });

        parent.addEventListener('mouseleave', () => {
            submenu.style.display = 'none';
        });

        // Переход по ссылке по клику
        link.addEventListener('click', (e) => {
            console.log('переход по ссылке Services');
            // Всё равно перейдет по ссылке по умолчанию
        });
    }
    }




    if (window.innerWidth >= 1240) {
        let navItemLength = document.querySelectorAll('nav .main-menu li').length;
        let ourLogo = document.querySelector('.container .header__inner__logo');

        let menuItems = document.querySelectorAll('nav .main-menu li:nth-child(' + Math.floor(navItemLength / 2 + 1) + ')');

        for (var i = 0; i < menuItems.length; i++) {
            menuItems[i].after(ourLogo);
        }
    }

    $(".page-section__title h2").html(function () {

        var text = $(this).text().trim().split(" ");
        var first = text.shift();
        return (text.length >= 0 ? "<span class='first-word'>" + first + "</span> " : first) + text.join(" ");

    });

    // Изменение хедера при скролле

    if (window.innerWidth >= 1024) {
        const headerFront = document.querySelector('.site-header');
        const headerChange = () => {
            const
                mainBlock = document.querySelector('body');


            window.addEventListener('scroll', () => {
                if (-mainBlock.getBoundingClientRect().top > 100) {
                    headerFront.classList.add('header-scroll');

                } else {
                    headerFront.classList.remove('header-scroll');
                }
            })

        }
        headerChange();
    }
    //плавный скролл

    function scrollTo(to, duration = 700) {
        const
            element = document.scrollingElement || document.documentElement,
            start = element.scrollTop,
            change = to - start,
            startDate = +new Date(),
            // t = current time
            // b = start value
            // c = change in value
            // d = duration
            easeInOutQuad = function (t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            },
            animateScroll = function () {
                const currentDate = +new Date();
                const currentTime = currentDate - startDate;
                element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
                if (currentTime < duration) {
                    requestAnimationFrame(animateScroll);
                }
                else {
                    element.scrollTop = to;
                }
            };
        animateScroll();
    }

    //кнопка вверх

    //     const upArrow = document.querySelector('.arrow-up');


    // upArrow.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     // Вызываем функцию, первый аргумент - отступ, второй - скорость скролла, чем больше значение, тем медленнее скорость прокрутки
    //     scrollTo(0, 800);
    // });
    // // Вверх и показ верхнего меню
    // const arrowUp = () => {
    //     const
    //         //fixedHeader = document.querySelector('.fixed-header'),
    //         mainBlock = document.querySelector('.site-container'),
    //         arrow = document.querySelector('.arrow-up');

    //     window.addEventListener('scroll', () => {
    //         if (-mainBlock.getBoundingClientRect().top > 300) {
    //             arrow.classList.add('show');
    //             //fixedHeader.classList.add('show')

    //         } else {
    //             arrow.classList.remove('show');
    //             //fixedHeader.classList.remove('show')

    //         }
    //     })

    // }
    // arrowUp();

    //анимация при скролле

    function onEntry(entry) {
        entry.forEach(change => {
            if (change.isIntersecting) {
                change.target.classList.add('animate');
            }
        });
    }
    let options = { threshold: [0.5] };
    let observer = new IntersectionObserver(onEntry, options);
    let elements = document.querySelectorAll('.fromTop, .toRight, .toleft, .fromBottom, .fromOpacity');
    for (let elm of elements) {
        observer.observe(elm);
    };



if (window.innerWidth > 1200) {
    window.addEventListener('load', () => {
        const textBlocks = document.querySelectorAll('.services-list__item');
        const targetBlocks = document.querySelectorAll('.section-services__inner__right__text');

        textBlocks.forEach((textBlock, index) => {
            const targetBlock = targetBlocks[index];
            if (targetBlock) {
                const height = textBlock.offsetHeight;
                targetBlock.style.height = `${height}px`;
            }
        });
    });
}


    // var elem = document.querySelector('.review-group');
    // if (elem) {
    //     new Masonry(elem, {
    //         itemSelector: '.review-card',
    //         columnWidth: 'review-card',
    //         percentPosition: true,
    //         gutter: 20
    //     });
    // }

    let body = $('body');
    let menu = $('.header-nav');
    let burger = $('.menu-toggle');
    //let textDefault = 'Меню';
    //let textOther = 'Закрыть';



    $(document).on('click', '.menu-toggle', function () {

        $(this).toggleClass('open');
        menu.toggleClass('open');
        //burger.toggleClass('open');
        body.toggleClass('_fixed');

    });
	
	
  const titleField = document.querySelector('input[name="page_title"]');
  if (titleField) {
    titleField.value = document.title;
  }
});

document.addEventListener('wpcf7mailsent', function(event) {
  const modal = document.getElementById('cf7-success-modal');
  if (modal) {
    modal.style.display = 'block';

    // Автоматическое закрытие через 10 секунд (10000 мс)
    setTimeout(function() {
      modal.style.display = 'none';
    }, 10000);
  }
}, false);

// Закрытие по крестику и по клику вне окна
document.addEventListener('DOMContentLoaded', function () {
  const closeBtn = document.querySelector('.cf7-close');
  const modal = document.getElementById('cf7-success-modal');
  if (closeBtn && modal) {
    closeBtn.addEventListener('click', function () {
      modal.style.display = 'none';
    });
    window.addEventListener('click', function (e) {
      if (e.target === modal) {
        modal.style.display = 'none';
      }
    });
  }
});


document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll('[data-package]');
    let lastClickedPackage = '';

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            lastClickedPackage = button.getAttribute('data-package');
            const hiddenField = document.querySelector('input[name="package-name"]');
            if (hiddenField) {
                hiddenField.value = lastClickedPackage;
            }
        });
    });
});
