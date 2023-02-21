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
                <li class="nav-item menu-open">
                    <a href="/edit-contact" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Edit Contact
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
                    <h2 align="center" class="card-body">Edit Contact Info</h2>
                    <form method="POST" enctype="multipart/form-data" id="contact" action="{{ url('edit-contact') }}">
                        @csrf
                        <div class="form-group">
                            <label for="contact">Address</label>
                            <input name="address" type="text" class="form-control" id="address" placeholder="{{ $contact->address }}">
                        </div>
                        <div class="form-group">
                            <label for="contact">Phone</label>
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="{{ $contact->phone }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" id="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

