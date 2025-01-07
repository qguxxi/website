<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index');
    }

    public function edit()
    {   
        return view('student.edit');
    }

    public function update(Request $request)
    {   
        // Kiểm tra xem có đăng nhập không
         if(!session()->has('student')) return redirect()->route('login')->with('danger_student','Vui lòng đăng nhập lại !');
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
        # Lấy thông tin sinh viên và cập nhật
        $get_mssv = session('student')->mssv;
        $get_student = Student::where('mssv',$get_mssv)->first();
        if(!$get_student) return redirect()->route('student.index')->with('danger', 'Cập nhật thất bại !');
        # Cập nhật
        $get_student->update([
            'ten' => $request->ten,
            'lop' => $request->lop,
            'nganh' => $request->nganh,
            'khoa' => $request->khoa,
            'so_dien_thoai' => $request->so_dien_thoai,
        ]);
        session()->put('student',$get_student);
        return redirect()->route('student.index')->with('success', 'Bạn đã cập nhật thông tin thành công !');
    }
}