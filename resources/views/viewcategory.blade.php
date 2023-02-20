@extends('layouts.app')
@section('style')
    .grid {
        align-content: center;
        width: 60%;
        background: #202028;
        margin-left: 20%;
        margin-right: 20%;
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
        width: 50%;
    }

    .grid-item {
        float: left;
        border: 1px solid #0000;
    }

    .grid-item img {
        display: block;
        width: 100%;
    }
@endsection
@section('content')
<div class="grid">
    <div class="grid-sizer"></div>
    @foreach($images as $image)
        <div class="grid-item">
            <a href="/view/{{$image->categoryId}}">
                <img src="{{ Storage::disk('s3')->url($image->path) }}"></a>
        </div>
    @endforeach
</div>
@endsection
@section('script')
<script>
    var $grid = $('.grid').imagesLoaded(function () {
        $grid.masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
    });
</script>
@endsection
