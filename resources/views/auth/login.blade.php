<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            {{-- <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault"> --}}
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button> --}}
                        <button type="submit" class="btn btn-primary tn-block btn-lg shadow-lg mt-5">
                            {{ __('Login') }}
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? 
                            {{-- <a href="auth-register.html" class="font-bold">Sign up</a> --}}
                                @if (Route::has('register'))
                                        <a class="font-bold" href="{{ route('register') }}">Sign up</a>
                                @endif
                        </p>    
                        {{-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a></p> --}}
                        @if (Route::has('password.request'))
                        <p>
                            <a class="font-bold" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>

