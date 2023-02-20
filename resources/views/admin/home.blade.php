@extends('admin.layouts.app')
        @section('sidebar')
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="/home" class="nav-link active">
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
                        <a href="/edit-preview" class="nav-link">
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
        <div class="content">
            <div class="container-fluid">
                <div class="container mt-4">

                    <h2 align="center" class="card-body">Upload image</h2>
                    <form method="POST" enctype="multipart/form-data" id="upload-image"
                          action="{{ url('upload-image') }}">
                        @csrf

                        <div>
                            <img id="preview-image-before-upload"
                                 style="max-height: 200px;">
                        </div>
                        @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <div class="row">

                            <label for="image">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="category">Category</label>
                            <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;"
                                    data-select2-id="category" tabindex="-1" aria-hidden="true" name="category"
                                    id="category">
                                <option selected="selected" value="" data-select2-id="category">None</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">

        $(document).ready(function (e) {
            $('#image').change(function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection

