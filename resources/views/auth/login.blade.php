@extends('layouts.master')
@section('content')
    <style>
        /* إخفاء السلايدر في صفحة تسجيل الدخول */
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
        .container-login {
            transition: margin-top 0.3s ease;
        }

        /* تصميم كارت تسجيل الدخول */
        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        /* رأس الكارت */
        .login-header {
            background-color: #F28123;
            color: white;
            text-align: center;
            padding: 25px 0;
        }

        .login-header h4 {
            font-weight: 700;
            margin: 0;
        }

        /* جسم الكارت */
        .login-body {
            padding: 35px 30px;
        }

        .login-body label {
            color: #333;
            font-weight: 600;
        }

        .login-body .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: none;
            padding: 10px 12px;
            font-size: 15px;
        }

        /* زر تسجيل الدخول */
        .login-body .btn-login {
            background-color: #F28123;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .login-body .btn-login:hover {
            background-color: #e07018;
        }

        /* تذييل الكارت */
        .login-footer {
            background-color: #f8f8f8;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }

        .login-footer a {
            color: #F28123;
            font-weight: bold;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        /* خلفية الصفحة */
        body {
            background: linear-gradient(to right, #fffdf9, #fff8f0);
        }
    </style>
    <div class="container container-login mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-card">
                    <div class="login-header">
                        <h4>تسجيل الدخول</h4>
                    </div>
                    <div class="login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">البريد الإلكتروني</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
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
                                    autocomplete="current-password" placeholder="أدخل كلمة المرور">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    تذكرني
                                </label>
                            </div>

                            <button type="submit" class="btn btn-login">
                                تسجيل الدخول
                            </button>

                            <div class="text-center mt-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-warning">
                                        هل نسيت كلمة المرور؟
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <p class="mb-0">
                            ليس لديك حساب؟
                            <a href="{{ route('register') }}">سجّل الآن</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- سكريبت لضبط المسافة تلقائيًا تحت الهيدر -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('sticker');
            const container = document.querySelector('.container-login');
            if (header && container) {
                const headerHeight = header.offsetHeight;
                container.style.marginTop = headerHeight + 40 + 'px';
            }
        });
    </script>
@endsection
