@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #2C3E50;
        --accent-color: #E67E22;
        --gold: #D4AF37;
        --dark-gold: #B8860B;
        --light-gold: #F5DEB3;
    }
    .main-bg {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        min-height: 100vh;
        padding: 2rem 0;
    }
    .welcome-section {
        position: relative;
        border-radius: 24px;
        margin-bottom: 2rem;
        overflow: hidden;
        box-shadow: 0 8px 32px 0 rgba(44,63,80,0.10);
        padding: 2.5rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 220px;
        /* Glassmorphism effect */
        background: rgba(255,255,255,0.25);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    .welcome-section::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
        z-index: 0;
        opacity: 0.45;
    }
    .welcome-section::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(120deg, rgba(44,63,80,0.55) 0%, rgba(44,63,80,0.25) 100%);
        z-index: 1;
    }
    .welcome-text, .welcome-subtitle {
        position: relative;
        z-index: 2;
    }
    .welcome-text {
        font-size: 2.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #fff;
        text-shadow: 0 2px 8px rgba(44,63,80,0.18);
    }
    .welcome-subtitle {
        font-size: 1.1rem;
        color: #f3f3f3;
        font-weight: 500;
        text-shadow: 0 1px 4px rgba(44,63,80,0.13);
    }
    .stats-card {
        background: #fff;
        border-radius: 18px;
        padding: 1.5rem 1rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 8px 20px rgba(44,63,80,0.10);
        transition: all 0.3s;
        border: none;
        text-align: center;
        position: relative;
    }
    .stats-card:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 16px 40px 0 rgba(44,63,80,0.13);
    }
    .stats-icon {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin: 0 auto 1rem auto;
        background: linear-gradient(45deg, var(--gold), var(--dark-gold));
        color: #fff;
        box-shadow: 0 2px 8px 0 rgba(212,175,55,0.13);
    }
    .stats-number {
        font-size: 1.7rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.3rem;
    }
    .stats-label {
        color: #666;
        font-size: 1rem;
        font-weight: 500;
    }
    .quick-actions {
        background: #fff;
        border-radius: 18px;
        padding: 1.5rem 1rem;
        box-shadow: 0 8px 20px rgba(44,63,80,0.10);
        margin-top: 2rem;
    }
    .action-btn {
        background: linear-gradient(45deg, var(--gold), var(--dark-gold));
        border: none;
        border-radius: 10px;
        padding: 0.9rem 1.7rem;
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        box-shadow: 0 2px 8px 0 rgba(212,175,55,0.10);
    }
    .action-btn:hover {
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 8px 24px rgba(212,175,55,0.18);
        color: #fff;
        background: linear-gradient(45deg, var(--dark-gold), var(--gold));
    }
    .action-btn i {
        font-size: 1.1rem;
    }
    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1.2rem;
        padding-bottom: 0.3rem;
        border-bottom: 2px solid #ececec;
    }
</style>
<div class="main-bg">
    <div class="container">
        <div class="welcome-section mb-4">
            <h1 class="welcome-text">Selamat Datang di Sistem Manajemen Dosen</h1>
            <p class="welcome-subtitle">Kelola data dosen dan program studi dengan mudah, cepat, dan tampilan profesional.</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stats-number">{{ $totalDosen ?? 0 }}</div>
                    <div class="stats-label">Total Dosen</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="stats-number">{{ $totalProdi ?? 0 }}</div>
                    <div class="stats-label">Total Program Studi</div>
                </div>
            </div>
        </div>
        <div class="quick-actions mt-4">
            <h2 class="section-title">Aksi Cepat</h2>
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('dosen.create') }}" class="action-btn">
                    <i class="fas fa-plus"></i> Tambah Dosen
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
