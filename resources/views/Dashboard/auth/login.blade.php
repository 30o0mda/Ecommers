<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ? Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" />
    <!-- ? Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sfwa.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos-anmite.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.22/sweetalert2.min.css"
        integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ? Custom CSS -->
    <!-- ? Main JavaScript -->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/fontawesome.min.js') }}"></script>
    <!-- ? Main JavaScript -->
    <!-- ? Custom JavaScript -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('assets/js/charts.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- ? Custom JavaScript -->

    <title>الرئيسيه</title>
</head>

<body>
    <div class="regaster-sfwa">
        <div class="step-one">
            <div class="adress">
                {{-- <img src="{{ asset('assets/photo/logo.png') }} " alt="" /> --}}

                <h4><span class="z">Z</span>-<i class="fa-solid fa-car"></i>-Way</h4>
            </div>
            <form method="post" id="loginForm" action="{{ route('admin.post.login') }}"
                onsubmit="return validateForm() , addrate()">
                @csrf
                @method('POST')
                <div class="phone">
                    <!-- Error messages -->
                    <div id="phoneError" class="error" style="display: none">
                        <img src="{{ asset('assets/photo/war.svg') }} " alt="" />
                        <h4>رقم الهاتف الذي أدخلته غير موجود / غير صحيح</h4>
                    </div>
                    <div id="passwordError" class="error" style="display: none">
                        <img src="{{ asset('assets/photo/war.svg') }} " alt="" />
                        <h4>كلمة المرور التي أدخلتها غير صحيحة</h4>
                    </div>
                    <div id="bothError" class="error" style="display: none">
                        <img src="{{ asset('assets/photo/war.svg') }} " alt="" />
                        <h4>البريد الإلكتروني وكلمة المرور غير صحيحتان</h4>
                    </div>

                    <!-- Phone input -->
                    <label for="phone">رقم الهاتف </label>
                    <div class="input">
                        <i class="fa-solid fa-phone-flip"></i>
                        <input type="phone" name="phone" value="{{ old('phone') }}" id="phone"
                            placeholder="أدخل رقم الهاتف" />
                    </div>
                    @error('phone')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="password">
                    <label for="password">كلمة المرور</label>
                    <div class="input">
                        <img src="{{ asset('assets/photo/shield-security.svg') }} " alt="" />
                        <input type="password" name="password" id="password" placeholder="أدخل كلمة المرور" />
                        <i class="fa-solid fa-eye" onclick="myFunction()" id="togglePassword"></i>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>

                <!-- Submit button -->
                <button id="loginButton" type="button" onclick="login()" class="next">
                    تسجيل الدخول
                </button>
            </form>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.22/sweetalert2.min.js"
        integrity="sha512-pQdCIGAWAwzEHgw7boqX3wRNUqyaj7ta8qHsZ2yZtJofKqwSsh98Q+NJn96MAYCMcMnoZhdUo771JzaJCbrJMg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function login() {
        const phone = $('#phone').val();
        const password = $('#password').val();
        const loginButton = $('#loginButton');
        const phoneError = $('#phoneError');
        const passwordError = $('#passwordError');
        const bothError = $('#bothError');

        loginButton.prop('disabled', true).text('جاري التحقق...');

        // Hide error messages
        phoneError.hide();
        passwordError.hide();
        bothError.hide();

        $.ajax({
            url: '{{ route('admin.post.login') }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                phone: phone,
                password: password
            },
            success: function(response) {
                console.log(response);
                if (response.success === true) {
                    window.location.href = response.route;
                }
                else {
                    loginButton.prop('disabled', false).text('تسجيل الدخول');
                    alert(response.message);
                    // if (response.error.phone) {
                    //     phoneError.show();
                    // }
                    // if (response.error.password) {
                    //     passwordError.show();
                    // }
                    // if (response.error.both) {
                    //     bothError.show();
                    // }
                }
            },
            error: function(error) {
                console.error(error);
                loginButton.prop('disabled', false).text('تسجيل الدخول');
            }
        });
    }
    // function login() {
    // const phone = document.getElementById('phone').value;
    // const password = document.getElementById('password').value;
    // const loginButton = document.getElementById('loginButton');
    // const phoneError = document.getElementById('phoneError');
    // const passwordError = document.getElementById('passwordError');
    // const bothError = document.getElementById('bothError');
    // const loginForm = document.getElementById('loginForm');

    // loginButton.disabled = true;
    // loginButton.textContent = 'جاري التحقق...';

    // phoneError.style.display = 'none';
    // passwordError.style.display = 'none';
    // bothError.style.display = 'none';

    // fetch('{{ route('admin.post.login') }}', {
    // method: 'POST',
    // headers: {
    // 'Content-Type': 'application/json',
    // 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    // },
    // body: JSON.stringify({
    // phone: phone,
    // password: password
    // })
    // })
    // .then(response => response.json())
    // .then(data => {
    // console.log(response);

    // if (data.status === true) {
    // console.log(data.route);
    // window.location.href = data.route;
    // } else {
    // loginButton.disabled = false;
    // loginButton.textContent = 'تسجيل الدخول';
    // if (data.errors.phone) {
    // phoneError.style.display = 'block';
    // } else if (data.errors.password) {
    // passwordError.style.display = 'block';
    // } else {
    // bothError.style.display = 'block';
    // }
    // }
    // })
    // .catch(error => {
    // loginButton.disabled = false;
    // loginButton.textContent = 'تسجيل الدخول';
    // console.error(error);
    // });

    // }

    </script>
</body>

</html>
