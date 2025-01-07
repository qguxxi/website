<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $list = Student::all();
        return view('admin.index', [
            'list_student' => $list,
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {   
        // Bắt validate
        $validate = Validator::make($request->all(),[
            'mssv' => 'required|string|unique:students',
            'ten' => 'required',
            'lop' => 'required',
            'nganh' => 'required',
            'khoa' => 'required',
            'so_dien_thoai' => 'required|starts_with:0|regex:/^[0-9]+$/|size:10',
            'matkhau' => 'required',
        ],[
            'mssv.required' => 'Vui lòng nhập mã sinh viên',
            'mssv.unique' => 'Mã số sinh viên này đã tồn tại',
            'ten.required' => 'Vui lòng nhập tên',
            'lop.required' => 'Vui lòng nhập lớp',
            'khoa.required' => 'Vui lòng nhập khoa',
            'nganh.required' => 'Vui lòng nhập ngành',
            'so_dien_thoai.required' => 'Vui lòng nhập SĐT',
            'so_dien_thoai.size' => 'SĐT có độ dài phải là 10 số',
            'so_dien_thoai.regex' => 'SĐT không không được chứa chữ cái',
            'so_dien_thoai.starts_with' => 'SĐT bắt đầu bằng số 0',
            'matkhau.required' => 'Vui lòng nhập mật khẩu',
        ]);
        // Trả lỗi validate
        if($validate->fails()) {
            return back()->withErrors(['danger' => $validate->errors()->first()])
            ->withInput(); //trả về value của request đã nhập
        }
        // Mã hoá mật khẩu
        $request->matkhau = Hash::make($request->matkhau);
        // Tạo sinh viên mới
        Student::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Người dùng đã được thêm thành công.');
    }

    public function edit($mssv)
    {   
        $student = Student::where('mssv','=',$mssv)->first();
        return view('admin.edit', [
            'student' => $student,
        ]);
    }

    public function update(Request $request,$mssv)
    {   
        // Lấy thông tin sinh viên
        $get_student = Student::where('mssv','=',$mssv)->first();
        if(!$get_student) return redirect()->route('admin.index')->with('danger', 'Sinh viên với MSSV ='.$mssv.' không tồn tại !');
        // Bắt validate
        $validate = Validator::make($request->all(),[
            'ten' => 'required',
            'lop' => 'required',
            'nganh' => 'required',
            'khoa' => 'required',
            'so_dien_thoai' => 'required|starts_with:0|regex:/^[0-9]+$/|size:10',

        ],[
            'ten.required' => 'Vui lòng nhập tên',
            'lop.required' => 'Vui lòng nhập lớp',
            'khoa.required' => 'Vui lòng nhập khoa',
            'nganh.required' => 'Vui lòng nhập ngành',
            'so_dien_thoai.required' => 'Vui lòng nhập SĐT',
            'so_dien_thoai.regex' => 'SĐT không không được chứa chữ cái',
            'so_dien_thoai.size' => 'SĐT có độ dài phải là 10 số',
        ]);
        // Trả lỗi validate
        if($validate->fails()) {
            return back()->withErrors(['danger' => $validate->errors()->first()])
            ->withInput(); //trả về value của request đã nhập
        }
        
        $get_student->update([
            'ten' => $request->ten,
            'lop' => $request->lop,
            'nganh' => $request->nganh,
            'khoa' => $request->khoa,
            'so_dien_thoai' => $request->so_dien_thoai,
        ]);

        return redirect()->route('admin.index')->with('success', 'Cập nhật sinh viên '.$mssv.' thành công !');
    }

    public function delete($mssv)
    { 
        $get_student = Student::where('mssv','=',$mssv)->first();
        if(!$get_student) return back()->with('danger','MSSV này không tồn tại !');
        $get_student->delete();
        return redirect()->route('admin.index')->with('success','Xoá thành công sinh viên '.$mssv);
    }



}