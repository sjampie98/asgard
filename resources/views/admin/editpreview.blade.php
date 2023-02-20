@extends('admin.layouts.app')
@section('style')
    * {
    box-sizing: border-box;
    }

    /* force scrollbar */
    html {
    background-color: #343a40;
    }

    body {
    margin: 0;
    font-family: sans-serif;
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

    .grid {
    width: 100%;
    background: #202028;
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
    border: 1px solid #202028;
    }

    .grid-item img {
    display: block;
    width: 100%;
    }
@endsection
@section('sidebar')
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Upload image
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/category" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Add Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/edit-preview" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Edit Preview
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 505px;">
        <div class="grid">
            <div class="grid-sizer"></div>
            @foreach($images as $image)
                <div class="grid-item" draggable="true"
                     ondrop="drop_handler(event)"
                     ondragover="dragover_handler(event)">
                    <a href="/view/{{$image->categoryId}}">
                        <img ondragstart="dragstart_handler(event)" id="{{$image->id}}" src="{{ Storage::disk('s3')->url($image->path) }}"></a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
@section('script')
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

        let dragTarget;

        function dragstart_handler(e) {
            dragTarget = e.target.id;
        }
        function dragover_handler(e) {
            e.preventDefault(e);
        }

        async function asyncSort(sortData) {
            return fetch('/edit-preview?' + new URLSearchParams(sortData), {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            })
                .then((res) => {
                    console.log(res);
                    document.location.reload(true);
                })
                .catch((err) => {
                    console.log(err);
                });
        }
        async function drop_handler(e) {
            e.preventDefault(e);
            const res = await asyncSort({
                targetId: dragTarget,
                endTarget: e.target.id,
            });
        }
    </script>
@endsection



