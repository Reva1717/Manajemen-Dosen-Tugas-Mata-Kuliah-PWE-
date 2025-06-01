<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun - Sistem Manajemen Dosen</title>
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
        .register-container {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            min-height: 600px;
            display: flex;
        }
        .register-image {
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
        .register-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
            opacity: 0.2;
        }
        .register-form {
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
        .btn-register {
            background: linear-gradient(45deg, var(--gold), var(--dark-gold));
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
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
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }
            .register-image {
                display: none;
            }
            .register-form {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-image">
            <h2 class="mb-4">Buat Akun Baru</h2>
            <p class="text-center">Daftarkan akun Anda untuk mengakses sistem manajemen dosen</p>
        </div>
        <div class="register-form">
            <h1 class="welcome-text">Registrasi</h1>
            <p class="subtitle">Silakan isi data di bawah ini untuk membuat akun baru</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                    <label for="name">Nama Lengkap</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nama@email.com" value="{{ old('email') }}" required>
                    <label for="email">Alamat Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kata Sandi" required>
                    <label for="password">Kata Sandi</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Konfirmasi Kata Sandi" required>
                    <label for="password-confirm">Konfirmasi Kata Sandi</label>
                </div>
                <button type="submit" class="btn btn-register w-100 mb-3">
                    Daftar <i class="fas fa-user-plus ms-2"></i>
                </button>
                <div class="text-center mt-2">
                    <span style="color:#666;">Sudah punya akun?</span>
                    <a href="{{ route('login') }}" style="color:var(--gold); font-weight:600; text-decoration:underline;">Login di sini</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
