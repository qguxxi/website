<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {   
        if(session()->has('user') || session()->has('user')) return back();
        return view('auth.login');
    }

    public function login(Request $request)
    {   
        // bắt validate
        $validate = Validator::make($request->all(),[
            'username' => 'required|exists:users',
            'password' => 'required',
        ],[
            'username.required' => 'Vui lòng nhập username',
            'username.exists' => 'Username không tồn tại',
            'passsword.required' => 'Vui lòng nhập mật khẩu',
        ]);

        // Trả lỗi validate
        if($validate->fails()) {
            return back()->withErrors(['danger_admin' => $validate->errors()->first()])
            ->withInput(); //trả về value của request đã nhập
        }

        // Kiểm tra thông tin đăng nhập
        $user = User::where('username', $request->username)->first();

        if ($user && password_verify($request->password, $user->password)) {

            // Lưu thông tin người dùng vào session
            session(['user' => $user]);
            // Chuyển hướng dựa trên vaitro
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['danger_admin' => 'Thông tin đăng nhập không chính xác.'])->withInput();
    }

    public function login_student(Request $request)
    {   
        // bắt validate
        $validate = Validator::make($request->all(),[
            'mssv' => 'required|exists:students',
            'matkhau' => 'required',
        ],[
            'mssv.required' => 'Vui lòng nhập mã sinh viên của bạn',
            'mssv.exists' => 'Mã sinh viên này không tồn tại',
            'matkhau.required' => 'Vui lòng nhập mật khẩu',
        ]);

        // Trả lỗi validate
        if($validate->fails()) {
            return back()->withErrors(['danger_student' => $validate->errors()->first()])
            ->withInput(); //trả về value của request đã nhập
        }

        // Kiểm tra thông tin đăng nhập
        $student = Student::where('mssv', $request->mssv)->first();

        if ($student && password_verify($request->matkhau, $student->matkhau)) {

            // Lưu thông tin người dùng vào session
            session(['student' => $student]);
            // Chuyển hướng dựa trên vaitro
            return redirect()->route('student.index')->with('success','Chào mừng bạn '.session('student')->ten.' quay trở lại');
        }

        return back()->withErrors(['danger_student' => 'Thông tin đăng nhập không chính xác.'])->withInput();
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('success','Đăng xuất thành công !');
    }
}