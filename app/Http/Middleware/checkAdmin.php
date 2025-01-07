<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem session 'user' có tồn tại
        if ($request->session()->has('user')) {
            // Nếu là admin, tiếp tục tới route
            return $next($request);
        }

        // Nếu không phải admin, trả về trang 404
        return redirect()->route('login')->withErrors(['danger_admin' => 'Bạn chưa đăng nhập']);
    }
}
