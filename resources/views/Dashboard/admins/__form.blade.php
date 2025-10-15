<style>
    /* Password container */
    .password-container {
        position: relative;
    }

    /* Eye icon */
    .password-toggle-icon {
        position: absolute;
        left: 10px;
        /* Move icon to the left */
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
        /* Default icon color */
        z-index: 2;
        /* Ensure the icon is above the input field */
    }

    .password-toggle-icon:hover {
        color: #333;
        /* Icon color on hover */
    }

    /* Adjust input padding to prevent text overlap with the icon */
    .password-container input {
        padding-left: 40px;
        /* Add padding to the left */
    }

    .text-success {
        color: green;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .text-danger {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
<form method="post" action="{{ $route }}" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="row">

        {{-- Name --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.name') }}</label>
                <div class="text-input">
                    <input class="form-control" type="text" name="name"
                        value="{{ isset($employee) ? $employee->name : old('name') }}"
                        placeholder={{ __('messages.name') }} required>
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div class="col-lg-6">
            <div class="text">
                <label for="">{{ __('messages.email') }}</label>
                <div class="text-input">
                    <input class="form-control" type="email" name="email"
                        value="{{ isset($employee) ? $employee->email : old('email') }}"
                        placeholder={{ __('messages.email') }} required>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>
        {{-- Phone --}}
        <div class="col-lg-6">
            <div class="text">
                <label for="">{{ __('messages.phone') }}</label>
                <div class="text-input">
                    <input class="form-control" type="phone" name="phone"
                        value="{{ isset($employee) ? $employee->phone : old('phone') }}"
                        placeholder={{ __('messages.phone') }} required>
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Password --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.password') }}</label>
                <div class="text-input password-container">
                    <span class="password-toggle-icon" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye"></i>
                    </span>
                    <input class="form-control" id="password" type="password" name="password"
                        value="{{ old('password') }}" placeholder={{ __('messages.password') }} required>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.password_confirmation') }}</label>
                <div class="text-input">
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        placeholder={{ __('messages.password_confirmation') }}>
                </div>
                <!-- Success and error messages -->
                <span id="password-match-success" class="text-success" style="display: none;">
                    {{ __('messages.passwords_match') }}
                </span>
                <span id="password-match-error" class="text-danger" style="display: none;">
                    {{ __('messages.passwords_do_not_match') }}
                </span>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Image --}}
        <div class="col-lg-6">
            <div class="text">
                <label for="">{{ __('messages.image') }}</label>
                <div class="text-input">
                    <input class="form-control" type="file" name="image" accept="image/*" />
                </div>
                @error('image')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Identity Image --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.identity_image') }}</label>
                <div class="text-input">
                    <input class="form-control" type="file" name="identity_image" accept="image/*" />
                </div>
                @error('identity_image')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Identity Number --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.identity_number') }}</label>
                <div class="text-input">
                    <input class="form-control" type="text" name="identity_number"
                        value="{{ isset($employee) ? $employee->identity_number : old('identity_number') }}"
                        placeholder={{ __('messages.identity_number') }}>
                </div>
                @error('identity_number')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>


        {{-- Description --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.description') }}</label>
                <div class="text-input">
                    <input class="form-control" type="text" name="description"
                        value="{{ isset($employee) ? $employee->description : old('description') }}"
                        placeholder={{ __('messages.description') }}>
                </div>
                @error('description')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Birthdate --}}
        <div class="col-lg-6">
            <div class="text">
                <label for=""> {{ __('messages.birthdate') }}</label>
                <div class="text-input">
                    <input class="form-control" type="date" name="birthDate"
                        value="{{ isset($employee) ? $employee->birthDate : old('birthDate') }}"
                        placeholder={{ __('messages.birthDate') }}>
                </div>
                @error('birthDate')
                    <span class="text-danger">{{ $message }} </span>
                @enderror
            </div>
        </div>

        {{-- Gender --}}
        <div class="col-lg-6">
            <label for="">{{ __('messages.gender') }}</label>
            <select class="form-select" name="gender" aria-label="Default select example">
                <option selected disabled>{{ __('messages.select_gender') }}</option>
                <option value="male" {{ isset($employee) ? ($employee->gender == 'male' ? 'selected' : '') : '' }}>
                    {{ __('messages.male') }}</option>
                <option value="female"
                    {{ isset($employee) ? ($employee->gender == 'female' ? 'selected' : '') : '' }}>
                    {{ __('messages.female') }}</option>
            </select>
        </div>

        {{-- roles --}}
        <div class="col-lg-6">
            <label for="">{{ __('messages.role') }}</label>
            <select class="selectpicker" data-live-search="true" name="role_id" aria-label="Default select example"
                title="{{ __('messages.select_role') }}">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ isset($employee) ? ($employee->hasRole($role->name) ? 'selected' : '') : '' }}>
                        {{ $role->display_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="add-new">
        <button type="submit" class="sure">{{ __('messages.save') }}</button>
        <a href="{{ $back }}">
            <button type="button" class="back">{{ __('messages.back') }}</button>
        </a>
    </div>
</form>

<script>
    // function togglePasswordVisibility() {
    //     const passwordField = document.getElementById("password");
    //     const toggleIcon = document.querySelector(".password-toggle-icon i");

    //     if (passwordField.type === "password") {
    //         passwordField.type = "text"; // Show password
    //         toggleIcon.classList.remove("fa-eye");
    //         toggleIcon.classList.add("fa-eye-slash");
    //     } else {
    //         passwordField.type = "password"; // Hide password
    //         toggleIcon.classList.remove("fa-eye-slash");
    //         toggleIcon.classList.add("fa-eye");
    //     }
    // }

    function togglePasswordVisibility() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.querySelector(".password-toggle-icon i");

        // Check if the password field exists
        if (!passwordField) {
            console.error("Password field not found!");
            return;
        }

        // Toggle password visibility
        if (passwordField.type === "password") {
            passwordField.type = "text"; // Show password
            if (toggleIcon) {
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        } else {
            passwordField.type = "password"; // Hide password
            if (toggleIcon) {
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
        console.log("Toggle Icon:", toggleIcon);
    }

    document.addEventListener("DOMContentLoaded", function() {
        const passwordField = document.getElementById("password");
        const confirmPasswordField = document.getElementById("password_confirmation");
        const successMessage = document.getElementById("password-match-success");
        const errorMessage = document.getElementById("password-match-error");

        if (passwordField && confirmPasswordField) {
            confirmPasswordField.addEventListener("input", function() {
                if (passwordField.value === confirmPasswordField.value) {
                    // Passwords match
                    successMessage.style.display = "inline";
                    errorMessage.style.display = "none";
                } else {
                    // Passwords do not match
                    successMessage.style.display = "none";
                    errorMessage.style.display = "inline";
                }
            });

            passwordField.addEventListener("input", function() {
                if (passwordField.value === confirmPasswordField.value) {
                    // Passwords match
                    successMessage.style.display = "inline";
                    errorMessage.style.display = "none";
                } else {
                    // Passwords do not match
                    successMessage.style.display = "none";
                    errorMessage.style.display = "inline";
                }
            });
        }
    });
</script>
