<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2C3E50;
            --accent-color: #E67E22;
            --gold: #D4AF37;
            --dark-gold: #B8860B;
            --light-gold: #F5DEB3;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), #1a252f);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 600px;
            display: flex;
        }

        .login-image {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
            opacity: 0.2;
        }

        .login-form {
            flex: 1;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .btn-login {
            background: linear-gradient(45deg, var(--gold), var(--dark-gold));
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .welcome-text {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .subtitle {
            color: #666;
            margin-bottom: 30px;
        }

        .form-floating label {
            color: #666;
        }

        .form-check-input:checked {
            background-color: var(--gold);
            border-color: var(--gold);
        }

        .forgot-password {
            color: var(--accent-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: var(--dark-gold);
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            .login-image {
                display: none;
            }
            .login-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <h2 class="mb-4">Selamat Datang</h2>
            <p class="text-center">Akses sistem manajemen dosen dengan mudah dan aman</p>
        </div>
        <div class="login-form">
            <h1 class="welcome-text">Masuk</h1>
            <p class="subtitle">Silakan login untuk melanjutkan</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                    <label for="email">Alamat Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" placeholder="Kata Sandi" required>
                    <label for="password">Kata Sandi</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Lupa Kata Sandi?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">
                    Masuk <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
