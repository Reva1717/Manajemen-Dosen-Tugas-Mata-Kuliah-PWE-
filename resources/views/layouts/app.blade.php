<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Dosen</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #F8F8EC;
            min-height: 100vh;
            color: #333;
        }
        .navbar {
            background: #fff;
            border-bottom: 2px solid #D3BBED;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            color: #222 !important;
            font-weight: bold;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .nav-link, .navbar-nav .nav-link.active {
            color: #333 !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #D3BBED !important;
        }
        .main-bg {
            background: #F8F8EC;
            min-height: 100vh;
            padding-top: 16px;
            padding-bottom: 24px;
        }
        .main-card {
            padding-left: 0 !important;
            padding-right: 0 !important;
            border-radius: 32px;
            box-shadow: 0 8px 32px 0 rgba(51,51,51,0.10);
            background: #fff;
            border: 1px solid #CEC8D4;
            color: #333;
            padding: 2.5rem 2rem;
            margin: 0 auto;
            width: 100%;
        }
        .btn-primary {
            background: #D3BBED;
            border: none;
            color: #333;
            font-weight: 600;
            border-radius: 20px;
            padding: 0.5rem 1.5rem;
        }
        .btn-primary:hover {
            background: #CEC8D4;
            color: #333;
        }
        .btn-info {
            background: #F9DDE1;
            border: none;
            color: #333;
            border-radius: 20px;
        }
        .btn-info:hover {
            background: #D3BBED;
            color: #333;
        }
        .prodi-btn {
            margin: 0 0.25rem 0.5rem 0;
            border-radius: 20px;
            font-weight: 500;
            border: none;
            background: #CEC8D4;
            color: #333;
            transition: background 0.2s, color 0.2s;
            padding: 0.4rem 1.2rem;
            font-size: 1rem;
            box-shadow: 0 2px 8px rgba(220,220,220,0.08);
        }
        .prodi-btn.active, .prodi-btn:hover {
            background: #D3BBED;
            color: #333;
        }
        .table-responsive {
            border-radius: 0 0 32px 32px;
            overflow: hidden;
            margin-top: 1.5rem;
        }
        .table {
            margin-bottom: 0;
            background: #fff;
        }
        .table thead th {
            background: #D3BBED;
            color: #333;
            position: sticky;
            top: 0;
            z-index: 2;
            font-size: 1.05rem;
            font-weight: 600;
            border-bottom: 2px solid #CEC8D4;
        }
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #F9DDE1;
        }
        .badge {
            background: #D3BBED;
            color: #333;
            font-size: 1em;
            border-radius: 12px;
            padding: 0.4em 0.9em;
            font-weight: 500;
        }
        .alert-success {
            background: #D3BBED;
            color: #333;
            border: none;
            border-radius: 12px;
            font-weight: 500;
        }
        .form-label {
            color: #D3BBED;
            font-weight: 500;
        }
        .search-box {
            border-radius: 18px;
            border: 1px solid #CEC8D4;
            padding: 0.7rem 1.2rem;
            font-size: 1.1rem;
            width: 100%;
            margin-bottom: 1rem;
            background: #fff;
            color: #333;
        }
        @media (max-width: 768px) {
            .main-card { padding: 1.2rem 0.5rem; }
            .table-responsive { font-size: 0.95rem; }
        }
        h1, h2, h3, h4, h5, h6, .navbar-brand {
            color: #222 !important;
        }
        .table-responsive, .table {
            width: 100% !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Manajemen Dosen</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <span class="nav-link">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <div class="main-bg px-0">
            <div class="main-card">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
