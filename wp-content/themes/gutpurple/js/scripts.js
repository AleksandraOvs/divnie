document.addEventListener("DOMContentLoaded", function () {
    Fancybox.bind("[data-fancybox]", {
        autoFocus: true,
    });

    const faqButtons = document.querySelectorAll(".faq-question");
    faqButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            const parent = btn.closest(".faq-item");
            const icon = btn.querySelector(".faq-icon");
            const answer = parent.querySelector(".faq-answer");

            parent.classList.toggle("active");
            icon.classList.toggle("active");

            if (parent.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";

            } else {
                answer.style.maxHeight = null;

            }
        });
    });

    //плавный скролл

    // function smoothScrollToElement(selector, duration = 700) {
    //     const target = document.querySelector(selector);
    //     if (!target) return;

    //     // Отключаем встроенный smooth scroll на время анимации
    //     document.documentElement.style.scrollBehavior = "auto";

    //     const element = document.scrollingElement || document.documentElement;
    //     const start = element.scrollTop;
    //     const targetTop = target.getBoundingClientRect().top + start - 160;
    //     const change = targetTop - start;
    //     const startTime = performance.now();

    //     function easeInOutQuad(t) {
    //         return t < 0.5
    //             ? 2 * t * t
    //             : -1 + (4 - 2 * t) * t;
    //     }

    //     function animateScroll(currentTime) {
    //         const elapsed = currentTime - startTime;
    //         const progress = Math.min(elapsed / duration, 1);
    //         const easedProgress = easeInOutQuad(progress);

    //         element.scrollTop = start + change * easedProgress;

    //         if (elapsed < duration) {
    //             requestAnimationFrame(animateScroll);
    //         } else {
    //             // Возвращаем поведение браузера обратно
    //             document.documentElement.style.scrollBehavior = "";
    //         }
    //     }

    //     requestAnimationFrame(animateScroll);
    // }

    //  плавный скролл по клику на ссылку
    // document.querySelectorAll('a[href^="#"]').forEach(link => {
    //     link.addEventListener("click", function (e) {
    //         e.preventDefault(); // убираем мгновенный прыжок
    //         smoothScrollToElement(this.getAttribute("href"), 800);
    //     });
    // });

    // кнопка вверх
    const upArrow = document.querySelector('.arrow-up');


    function arrowUp() {

        if (upArrow) {
            upArrow.addEventListener('click', (e) => {
                e.preventDefault();
                smoothScrollToTop(800);
            });
        }

        // const arrow = document.querySelector('.arrow-up');
        if (!upArrow) return; // если кнопка не найдена — выходим

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                upArrow.classList.add('show');
            } else {
                upArrow.classList.remove('show');
            }
        });
    }

    arrowUp();

    // Универсальный плавный скролл к верху
    function smoothScrollToTop(duration = 700) {
        const element = document.scrollingElement || document.documentElement;
        const start = element.scrollTop;
        const change = -start;
        const startTime = performance.now();

        function easeInOutQuad(t) {
            return t < 0.5
                ? 2 * t * t
                : -1 + (4 - 2 * t) * t;
        }

        function animateScroll(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeInOutQuad(progress);

            element.scrollTop = start + change * easedProgress;

            if (elapsed < duration) {
                requestAnimationFrame(animateScroll);
            }
        }

        requestAnimationFrame(animateScroll);
    }

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


    const body = document.body;
    const menu = document.querySelector('.header-nav');
    const burger = document.querySelector('.menu-toggle');

    if (!burger || !menu) return; // защита от ошибок, если элементов нет

    burger.addEventListener('click', () => {
        burger.classList.toggle('open');
        menu.classList.toggle('open');
        body.classList.toggle('_fixed');
    });

    if (window.innerWidth >= 1240) {
        let navItemLength = document.querySelectorAll('nav .main-menu li').length;
        let ourLogo = document.querySelector('.container .header__inner__logo');

        let menuItems = document.querySelectorAll('nav .main-menu li:nth-child(' + Math.floor(navItemLength / 2 + 1) + ')');

        for (var i = 0; i < menuItems.length; i++) {
            menuItems[i].after(ourLogo);
        }
    }

    //document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab');
    const blocks = document.querySelectorAll('.tabs-content');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            blocks.forEach(b => b.classList.remove('active'));
            document.getElementById(tab.dataset.tab).classList.add('active');
        });
    });
    //});

    // Проверяем ширину экрана
    //if (window.innerWidth > 992) {
    const header = document.querySelector('.header-main');

    if (header) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 150) {
                header.classList.add('scroll');
            } else {
                header.classList.remove('scroll');
            }
        });
    }
    //}
});