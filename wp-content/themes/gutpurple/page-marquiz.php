<?php

/**
 * Template name: Marquiz
 */
get_header() ?>

<main id="primary" class="site-main">
    <section class="quiz" style="height: 80vh">

    </section>
</main>


<!-- Marquiz script start -->
<script>
    (function(w, d, s, o) {
        var j = d.createElement(s);
        j.async = true;
        j.src = '//script.marquiz.ru/v2.js';
        j.onload = function() {
            if (document.readyState !== 'loading') Marquiz.init(o);
            else document.addEventListener("DOMContentLoaded", function() {
                Marquiz.init(o);
            });
        };
        d.head.insertBefore(j, d.head.firstElementChild);
    })(window, document, 'script', {
        host: '//quiz.marquiz.ru',
        region: 'eu',
        id: '6647b71d3d547d002679f5f6',
        autoOpen: 0,
        autoOpenFreq: 'always',
        openOnExit: false,
        disableOnMobile: false
    });
</script>
<!-- Marquiz script end -->
<style>
    .marquiz__bg_open .marquiz__modal {
        max-width: 100% !important;
        min-height: 100% !important;
        width: 100% !important;
        height: 100% !important;
    }

    .marquiz__bg_open .marquiz__frame_open {
        height: 100% !important;
    }

    #marquiz__close {
        display: none
    }
</style>
<?php get_footer() ?>