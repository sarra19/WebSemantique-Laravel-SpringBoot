<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="edit a new category in the system.">
    <meta property="og:title" content="edit Category">
    <title>Edit Category</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    @vite(['resources/assets/css/main.css'])
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="{{ route('indexBack') }}">EcoCycle</a>
        @include('BackOffice.partials.navbar')
    </header>

    <!-- Sidebar -->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('BackOffice.partials.sidebar')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="bi bi-folder-plus"></i> Edit Category</h1>
                <p>Fill out the form below to edit the category.</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
                <li class="breadcrumb-item"><a href="#">Edit Category</a></li>
            </ul>
        </div>

        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger" id="errorAlert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="tile">
                <form id="categoryForm" action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf <!-- CSRF Token -->
                    @method('PUT') <!-- Add this line for the PUT method -->

                    <div class="row">
                        <!-- Category Name -->
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="name">Category Name</label>
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                        </div>

                        <!-- Description -->
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="category_description">Description</label>
                            <textarea class="form-control" id="category_description" name="category_description" placeholder="Enter category description" rows="3">{{ old('category_description', $category->category_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-plus-circle"></i> Update
                        </button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Essential javascripts -->
    @vite(['resources/assets/js/jquery-3.7.0.min.js', 'resources/assets/js/bootstrap.min.js', 'resources/assets/js/main - Back.js'])
    <script>
        // Check if the error alert exists
        const errorAlert = document.getElementById('errorAlert');
        if (errorAlert) {
            // Set a timeout to hide the alert after 3 seconds
            setTimeout(() => {
                errorAlert.style.display = 'none'; // Hide the alert
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    </script>
</body>
</html>