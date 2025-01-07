@extends('admin.layout')
@section('titleSite', 'Thêm người dùng')
@section('body')
@php
    $option_lop = ['K1','K2','K3','K4','K5','K6','K7','K8','K9','K10','K11','K12','K13','K14','K15','K16','K17','K18'];
    $option_nganh = ['Lập trình Mobile','Lập trình Website','Quản lí truyền thông','Quản lí chuỗi cung ứng'];
    $option_khoa = ['CNTT','Logictis','Digital Marketing'];
@endphp
    <div class="container d-flex mt-5 flex-column align-items-center">
        <h2 class="col-12 text-center">Thêm Sinh Viên Mới</h2>
        @error('danger')    
            <div class="col-6 alert alert-danger">{{ $message }}</div>
        @enderror
        <form class="col-6 row" action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="mb-3 col-6">
                <label for="mssv" class="form-label">MSSV</label>
                <input type="text" class="form-control" id="mssv" name="mssv" value="{{ old('mssv', $request->mssv ?? '') }}">
            </div>
            <div class="mb-3 col-6">
                <label for="ten" class="form-label">Tên</label>
                <input type="text" class="form-control" id="ten" name="ten" value="{{ old('ten', $request->mssv ?? '') }}">
            </div>
            <div class="mb-3 col-6">
                <label for="lop" class="form-label">Lớp</label>
                <select id="lop" name="lop" class="form-select">
                    @foreach ($option_lop as $option)
                    <option {{ old('lop', $request->lop ?? '') == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="nganh" class="form-label">Ngành</label>
                <select id="nganh" name="nganh" class="form-select">
                    @foreach ($option_nganh as $option)
                    <option {{ old('nganh', $request->nganh ?? '') == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="khoa" class="form-label">Khoa</label>
                <select id="khoa" name="khoa" class="form-select">
                    @foreach ($option_khoa as $option)
                    <option {{ old('khoa', $request->khoa ?? '') == $option ? 'selected' : '' }} value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai', $request->mssv ?? '') }}">
            </div>
            <div class="mb-3 col-12">
                <label for="matkhau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="matkhau" name="matkhau" value="{{ old('mssv', $request->matkhau ?? '') }}">
            </div>
            <button type="submit" class="btn btn-primary">Thêm người dùng</button>
        </form>
    </div>
@endsection