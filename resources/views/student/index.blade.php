<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Thông tin cá nhân</title>
</head>
<body>
    <div class="container d-flex mt-5 flex-column align-items-center">
        @if (session('success'))
        <div class="col-12 alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <h2 class="col-12 text-center mb-3">Thông tin cá nhân</h2>
        <div class="col-6 border rounded-2 p-5">
            <div class="d-flex my-3">
                <div class="text-start w-25">Họ và tên:</div>
                <div class="text-end fw-bold w-75">{{ session('student')->ten }}</div>
            </div>
            <div class="d-flex my-3">
                <div class="text-start w-25">Mã sinh viên</div>
                <div class="text-end fw-bold w-75">{{ session('student')->mssv }}</div>
            </div>
            <div class="d-flex my-3">
                <div class="text-start w-25">Lớp:</div>
                <div class="text-end fw-bold w-75">{{ session('student')->lop }}</div>
            </div>
            <div class="d-flex my-3">
                <div class="text-start w-25">Ngành:</div>
                <div class="text-end fw-bold w-75">{{ session('student')->nganh }}</div>
            </div>
            <div class="d-flex my-3">
                <div class="text-start w-25">Khoa:</div>
                <div class="text-end fw-bold w-75">{{ session('student')->khoa }}</div>
            </div>
            <div class="d-flex">
                <div class="text-start w-25">Số điện thoại:</div>
                <div class="text-end fw-bold w-75">{{ session('student')->so_dien_thoai }}</div>
            </div>
        </div>
        <div class="col-6 text-end mt-3">
            <a href="{{route('student.edit')}}" class="btn btn-sm btn-warning"><i class="bi bis bi-pen"></i> Cập nhật</a>
            <a href="{{route('logout')}}" class="btn btn-sm btn-outline-danger"><i class="bi bis bi-box-arrow-right"></i> Đăng xuất</a>
        </div>
    </div>
</body>
</html>