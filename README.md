# Link repository : https://github.com/qguxxi/website

# Link repository : [https://github.com/qguxxi/website](http://localhost:8000/)

# Quản lý Sinh viên - Dự án CRUD dùng PHP và Laravel

Đây là ứng dụng web quản lý sinh viên  dùng PHP và Laravel để thực hiện các chức năng CRUD: thêm, xem, sửa, xóa.

## Tính năng

- Thêm sinh viên mới (tên, email, số điện thoại,lớp , khoa)
- Xem danh sách tất cả sinh viên
- Sửa thông tin sinh viên
- Xóa sinh viên khỏi danh sách

## Yêu cầu

- PHP 8.0 trở lên
- Composer
- Laravel 9 hoặc 10
- MySQL
- Web server (Apache, Nginx hoặc server của Laravel)

## Hướng dẫn cài đặt

1.Clone dự án về máy:
git clone https://github.com/qguxxi/website

2.Cài Đặt Các Gói Phụ Thuộc
composer install

3.Cấu Hình Môi Trường
cp .env.example .env

4.Tạo Key Ứng Dụng
php artisan key:generate

5.Chạy Migration để tạo bảng trong database
php artisan migrate

6.Chạy Server
php artisan serve

7.Mô hình cấu trúc thư mục
├── app/            # Chứa các Model và Controller
├── database/       # Chứa các file migration và seeders
├── routes/         # Chứa file định tuyến web.php
├── resources/      # Views sử dụng Blade template
├── public/         # Chứa assets như CSS, JS, hình ảnh
├── .env            # Cấu hình môi trường
└── composer.json   # Thông tin về project và package
