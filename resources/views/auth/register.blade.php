@extends('layouts.master')
@section('content')
    <style>
        /* إخفاء السلايدر في صفحة التسجيل */
        .homepage-slider {
            display: none !important;
        }

        /* تصميم الهيدر المثبت */
        #sticker {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #1a1919;
            /* نفس لون الفوتر */
            color: white;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        /* الحاوية العامة */
        .container-register {
            transition: margin-top 0.3s ease;
        }

        /* تصميم كارت التسجيل */
        .register-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .register-card:hover {
            transform: translateY(-5px);
        }

        /* رأس الكارت */
        .register-header {
            background-color: #F28123;
            color: white;
            text-align: center;
            padding: 25px 0;
        }

        .register-header h4 {
            font-weight: 700;
            margin: 0;
        }

        /* جسم الكارت */
        .register-body {
            padding: 35px 30px;
        }

        .register-body label {
            color: #333;
            font-weight: 600;
        }

        .register-body .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: none;
            padding: 10px 12px;
            font-size: 15px;
        }

        /* زر التسجيل */
        .register-body .btn-register {
            background-color: #F28123;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .register-body .btn-register:hover {
            background-color: #e07018;
        }

        /* تذييل الكارت */
        .register-footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        .register-footer a {
            color: #F28123;
            font-weight: bold;
            text-decoration: none;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        /* خلفية الصفحة */
        body {
            background: linear-gradient(to right, #fffdf9, #fff8f0);
        }
    </style>

    <div class="container container-register mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-card">
                    <div class="register-header">
                        <h4>إنشاء حساب جديد</h4>
                    </div>

                    <div class="register-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">الاسم الكامل</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="أدخل اسمك الكامل">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">البريد الإلكتروني</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="أدخل البريد الإلكتروني">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">كلمة المرور</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="أدخل كلمة المرور">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password-confirm">تأكيد كلمة المرور</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="أعد إدخال كلمة المرور">
                            </div>

                            <button type="submit" class="btn btn-register">
                                إنشاء حساب
                            </button>

                            <div class="text-center mt-3">
                                <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                            </div>
                        </form>
                    </div>

                    <div class="register-footer">
                        <p class="mb-0">مرحبًا بك في موقعنا — نتمنى لك تجربة رائعة 💛</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- سكريبت لضبط المسافة أسفل الهيدر -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('sticker');
            const container = document.querySelector('.container-register');
            if (header && container) {
                const headerHeight = header.offsetHeight;
                container.style.marginTop = headerHeight + 40 + 'px';
            }
        });
    </script>
@endsection
