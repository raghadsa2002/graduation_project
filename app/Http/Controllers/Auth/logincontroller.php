<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logincontroller extends Controller
{
    public function login(Request $request)
    {
        // تنفيذ عملية التحقق من بيانات تسجيل الدخول هنا

        // إذا نجحت عملية تسجيل الدخول، يمكنك تحويل المستخدم إلى الصفحة التالية
        return redirect()->route('dash');
    }
}

