<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'ten' => 'Mạnh Hoàng',
        ]);

        User::create([
            'username' => 'admin2',
            'password' => Hash::make('12345678'),
            'ten' => 'Nguyễn Minh Hiếu',
        ]);

        Student::create([
            'mssv' => 'mssv0001',
            'matkhau' => Hash::make('12345678'),
            'ten' => 'Hoàng Tú Uyên',
            'lop' => 'K12',
            'nganh' => 'Lập trình Mobile',
            'khoa' => 'CNTT',
            'so_dien_thoai' => '0912571292',
        ]);

        Student::create([
            'mssv' => 'mssv0002',
            'matkhau' => Hash::make('12345678'),
            'ten' => 'Cao Quang Bách',
            'lop' => 'K5',
            'nganh' => 'Quản lí chuỗi cung ứng',
            'khoa' => 'Logictis',
            'so_dien_thoai' => '0353992421',
        ]);

        Student::create([
            'mssv' => 'mssv0003',
            'matkhau' => Hash::make('12345678'),
            'ten' => 'Nguyễn Việt Hoàng',
            'lop' => 'K7',
            'nganh' => 'Quản lí truyền thông',
            'khoa' => 'Digital Marketing',
            'so_dien_thoai' => '0977247912',
        ]);

        Student::create([
            'mssv' => 'mssv0004',
            'matkhau' => Hash::make('12345678'),
            'ten' => 'Lê Thị Tú',
            'lop' => 'K9',
            'nganh' => 'Lập trình Website',
            'khoa' => 'CNTT',
            'so_dien_thoai' => '0882347851',
        ]);
    }
}
