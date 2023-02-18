<html lang="en" class="" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('home.admin.title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<body class="sidebar-mini" data-new-gr-c-s-check-loaded="14.1097.0" data-gr-ext-installed="" style="height: auto;">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/logout" class="nav-link">Log Out</a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">{{ trans('home.title') }}</span>
        </a>
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
                </ul>
            </nav>
        </div>
    </aside>

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
                                    <td><a href="/view/{{$category['id']}}">{{ $category['description'] ?? 'null' }} </a></td>
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
                                <input name="category" type="text" class="form-control" id="category" placeholder="Category name">
                            </div>
                        <br>
                            <button type="submit" class="btn btn-primary" id="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright ©<a href="/">Asgard</a>.</strong> All rights reserved.
    </footer>
</div>
</body>
</html>
