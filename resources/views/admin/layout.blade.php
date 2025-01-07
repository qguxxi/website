<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('titleSite')</title>

</head>

<body>
    <div class="container-fluid px-5">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-success" href="{{route('admin.index')}}">School Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('admin.index')}}">Danh sách sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{route('admin.create')}}">Thêm mới</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="{{route('logout')}}">Đăng xuất</a>
                        </li>
                    
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">xin chào, <span class="fw-bold">{{ session('user')->ten }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @yield('body')
</body>

</html>
