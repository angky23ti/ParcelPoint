<head>
    <title> </title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<div class="login-container">
    <div class="login-card">
        <div class="row">
            <!-- Profile Image Section (Left) -->
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="profile-container">
                    <img src="path/to/profile.jpg" alt="Profile Image" class="profile-img">
                </div>
            </div>

            <!-- Login Form Section (Right) -->
            <div class="col-md-8">
                <h2 class="login-title">Welcome Back!</h2>
                <p class="login-subtitle">Please sign in to continue</p>

                <!-- Form Login -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Username -->
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="input-field @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                    </div>

                    <!-- Login Button -->
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>