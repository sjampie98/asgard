<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="icon" type="image/x-icon" href="{{ Storage::disk('s3')->url('images/logo-title.png') }}">
    <title class="text">Asrgard Render</title>
</head>

<style>
    * {
        box-sizing: border-box;
    }

    /* force scrollbar */
    html {
        background: #202028;
    }

    body {
        margin: 0;
        font-family: sans-serif;
        background: #202028;
    }

    .fade-in {
        -webkit-animation: fade-in 1.2s cubic-bezier(0.39, 0.575, 0.565, 1) both;
        animation: fade-in 1.2s cubic-bezier(0.39, 0.575, 0.565, 1) both;
    }

    @-webkit-keyframes fade-in {
        0% {
            -webkit-transform: translateY(50px);
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fade-in {
        0% {
            -webkit-transform: translateY(50px);
            transform: translateY(50px);
            opacity: 0;
        }
        100% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1;
        }
    }

    .fixed {
        position: fixed;
        z-index: 100;
        display: block;
        width: 100%;
    }

    .navbar-custom {
        background: #202028;
    }

    .header {
        width: 100%;
        height: 1%;
        padding: 0;
    }

    .header-img {
        z-index: 100;
        width: 5%;
        height: 5%;
    }

    .header-img-text {
        padding-top: 1%;
        padding-bottom: 1%;
        margin-left: -0.8%;
        margin-bottom: -9px;
        z-index: 100;
        width: 15%;
        height: 15%;
    }

    .navbar {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;
        z-index: 100;
    }

    .text {
        color: white;
    }
    .footer {
        color: white;
        height: 20px;
        font-size: 0.75rem;
    }
    @yield('style')
</style>
<body>
<div class="fixed_block_position">
    <div class="fixed_block">
        <nav class="header navbar navbar-custom">
            <a href="/">
                <img class="header-img" src="{{ Storage::disk('s3')->url('images/logo.png') }}">
                <img class="header-img-text" src="{{ Storage::disk('s3')->url('images/logo_text.png') }}">
            </a>
            <a href="/contact" class="header-text nav-link text"><b>Contact</b></a>
            <a href="/contact" class="header-text nav-link text"><b>About</b></a>
        </nav>
    </div>
</div>
@yield('content')
<footer align="center" class="footer">(c) Сopyright 2023 ASGARD RENDER. All rights reserved.</footer>

<script type="text/javascript" src="https://spikmi.org/Widget?Id=16283"></script>
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script>
    const fadeIn = function (isFirstLoad) {
        const animatedBoxes = document.getElementsByClassName("grid-item");
        const windowOffsetTop = window.innerHeight + window.scrollY;
        Array.prototype.forEach.call(animatedBoxes, (animatedBox) => {
            const animatedBoxOffsetTop = animatedBox.offsetTop;

            if (windowOffsetTop >= animatedBoxOffsetTop) {
                addClass(animatedBox, "fade-in");
            }
            if (isFirstLoad) {
                window.scroll({
                    top: 0,
                    left: 0,
                });

                document.body.scrollTop = document.documentElement.scrollTop = 0;
            }
        });
    };

    document.addEventListener("DOMContentLoaded", function (e) {
        fadeIn(true);
        document.addEventListener("scroll", (e) => {
            fadeIn(false);
        });
    });

    function addClass(element, className) {
        const arrayClasses = element.className.split(" ");
        if (arrayClasses.indexOf(className) === -1) {
            element.className += " " + className;
        }
    }

    $(document).ready(function () {
        var element = $(".fixed_block");
        var height_el = element.offset().top;

        $(".fixed_block_position").css({
            "width": element.outerWidth(),
            "height": element.outerHeight(),
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() > height_el) {
                element.addClass("fixed");
            } else {
                element.removeClass("fixed");
            }
        });
    });

    window.onscroll = function () {
        var scrolled = window.pageYOffset || document.documentElement.scrollTop; // Получаем положение скролла
        if (scrolled >= 900) {
            // Если прокрутка есть, то делаем блок прозрачным
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0)";
            document.querySelector('.header-img-text').style.opacity = '0';
        } else if (scrolled >= 700) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.35)";
            document.querySelector('.header-img-text').style.opacity = '0.35';
        } else if (scrolled >= 600 && scrolled < 700) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.4)";
            document.querySelector('.header-img-text').style.opacity = '0.4';

        } else if (scrolled >= 550 && scrolled < 600) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.45)";
            document.querySelector('.header-img-text').style.opacity = '0.45';

        } else if (scrolled >= 500 && scrolled < 550) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.5)";
            document.querySelector('.header-img-text').style.opacity = '0.5';
        } else if (scrolled >= 450 && scrolled < 500) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.55)";
            document.querySelector('.header-img-text').style.opacity = '0.55';

        } else if (scrolled >= 400 && scrolled < 450) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.6)";
            document.querySelector('.header-img-text').style.opacity = '0.6';

        } else if (scrolled >= 350 && scrolled < 400) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.65)";
            document.querySelector('.header-img-text').style.opacity = '0.65';

        } else if (scrolled >= 300 && scrolled < 350) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.7)";
            document.querySelector('.header-img-text').style.opacity = '0.7';

        } else if (scrolled >= 250 && scrolled < 300) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.75)";
            document.querySelector('.header-img-text').style.opacity = '0.75';

        } else if (scrolled >= 200 && scrolled < 250) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.8)";
            document.querySelector('.header-img-text').style.opacity = '0.8';

        } else if (scrolled >= 150 && scrolled < 200) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.85)";
            document.querySelector('.header-img-text').style.opacity = '0.85';

        } else if (scrolled >= 100 && scrolled < 150) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,0.9)";
            document.querySelector('.header-img-text').style.opacity = '0.9';

        } else if (scrolled >= 0 && scrolled < 100) {
            document.querySelector(".navbar-custom").style.background = "rgba(32,32,40,1)";
            document.querySelector('.header-img-text').style.opacity = '1';

        }
    };
</script>

@yield('script')
</body>
</html>



