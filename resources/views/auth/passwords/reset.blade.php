<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        <!-- Right Section (Reset Password Form) -->
        <div class="form-section">
            <center><img src="../modern/src/assets/images/logos/Ujify-Logo.svg" alt="Logo Ujify" width="200px" height="80px"></center>
            <h2 class="login-title"><center>Reset Password</center></h2>
            <p class="login-subtitle"><center>Masukkan Password Lama dan Password Baru</center></p><br>

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

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Old Password -->
                <div class="input-group">
                    <label for="old_password"><b>Password Lama</b></label>
                    <input id="old_password" type="password" placeholder="********" class="input-field @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="current-password">

                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="input-group">
                    <label for="password"><b>Password Baru</b></label>
                    <input id="password" type="password" placeholder="********" class="input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div class="input-group">
                    <label for="password-confirm"><b>Konfirmasi Password Baru</b></label>
                    <input id="password-confirm" type="password" placeholder="********" class="input-field" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="login-btn">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
