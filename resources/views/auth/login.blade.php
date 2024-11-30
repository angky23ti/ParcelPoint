<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <!-- Left Section (Profile Image) -->
        <div class="profile-section">
            <div class="profile-container">
                <img src="../modern/src/assets/images/backgrounds/IlustrasiUjian.jpg" alt="Profile Image" class="profile-img">
            </div>
        </div>

        <!-- Right Section (Login Form) -->
        <div class="form-section">
            <center><img src="../modern/src/assets/images/logos/Ujify-Logo.svg" alt="Logo Ujify" width="200px" height="80px"></center>
            <h2 class="login-title"><center>Selamat Datang Kembali!</center></h2>
            <p class="login-subtitle"><center>Silahkan Masukkan Username & Password</center></p><br>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Username -->
                <div class="input-group">
                    <label for="username"><b>ID (NIP/NISN)</b></label>
                    <input id="username" type="text" placeholder="8087655436" class="input-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password"><b>Password</b></label>
                    <input id="password" placeholder="********" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>

                <!-- Login Button -->
                <div class="form-group">
                    <button type="submit" class="login-btn">Login</button>
                </div>
            </form>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}"><center>Ganti Password?</center></a>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>
