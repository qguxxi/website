<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="col-12 alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-danger fw-bold">Đăng nhập Quản Trị Viên</div>
                    <div class="card-body">
                        @error('danger_admin')    
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $request->username ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-success fw-bold">Đăng nhập Dành Cho Sinh Viên</div>
                    <div class="card-body">
                        @error('danger_student')    
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form method="POST" action="{{ route('login_student.post') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="mssv" class="form-label">Mã sinh viên</label>
                                <input type="text" class="form-control" id="mssv" name="mssv" value="{{ old('mssv', $request->username ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="matkhau" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="matkhau" name="matkhau">
                            </div>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>