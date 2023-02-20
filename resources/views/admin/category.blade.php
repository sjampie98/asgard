@extends('admin.layouts.app')
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
                    <a href="/category" class="nav-link active">
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
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>

                                    <td><a href="/view/{{$category['id']}}">{{ $category['name'] }}</a></td>
                                    <td>
                                        <a href="/view/{{$category['id']}}">{{ $category['description'] ?? 'null' }} </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h2 align="center" class="card-body">Add Category</h2>
                    <form method="POST" enctype="multipart/form-data" id="category" action="{{ url('add-category') }}">
                        @csrf
                        <div class="form-group">
                            <label for="category">Category name</label>
                            <input name="category" type="text" class="form-control" id="category"
                                   placeholder="Category name">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" id="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

