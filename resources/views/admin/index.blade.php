@extends('admin.layout')
@section('titleSite', 'Danh sách')
@section('body')
    <div class="container mt-5">
        <h2 class="text-center mb-3">Danh sách sinh viên</h2>
        {{-- Thông báo thành công --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- Thông báo nguy hiểm --}}
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>MSSV</th>
                    <th>Tên</th>
                    <th>Lớp</th>
                    <th>Ngành</th>
                    <th>Khoa</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_student as $student)
                    <tr>
                        <td>{{ $student->mssv }}</td>
                        <td>{{ $student->ten }}</td>
                        <td>{{ $student->lop }}</td>
                        <td>{{ $student->nganh }}</td>
                        <td>{{ $student->khoa }}</td>
                        <td>{{ $student->so_dien_thoai }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $student->mssv) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pen me-1"></i>Sửa</a>
                            <a href="{{ route('admin.delete', $student->mssv) }}" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash me-1"></i>Xoá</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
