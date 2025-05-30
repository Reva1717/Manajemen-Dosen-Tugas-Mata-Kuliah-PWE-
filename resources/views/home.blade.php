@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-lg p-5" style="background: #fff;">
            <div class="row align-items-center">
                <div class="col-md-7 text-center text-md-start">
                    <h1 class="mb-3" style="font-weight: bold; color: #333; font-size:2.5rem;">
                        <i class="fas fa-chalkboard-teacher" style="color:#D9EB5C;"></i>
                        Selamat Datang di<br> Aplikasi Manajemen Dosen
                    </h1>
                    <p class="lead mb-4" style="color: #707673;">
                        Kelola data dosen Fakultas Teknik per prodi dengan mudah, cepat, dan tampilan yang modern!
                    </p>
                    <a href="{{ route('dosen.index') }}" class="btn btn-lg btn-primary shadow">
                        <i class="fas fa-users"></i> Lihat Data Dosen
                    </a>
                </div>
                <div class="col-md-5 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Dosen" style="width: 220px; border-radius: 30px; box-shadow:0 8px 32px #cec8d4;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
