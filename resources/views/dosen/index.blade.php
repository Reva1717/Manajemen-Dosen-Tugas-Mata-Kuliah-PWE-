@extends('layouts.app')

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
        padding: 2rem;
    }
    table th, table td {
        padding: 16px 18px !important;
        vertical-align: middle !important;
        border: 1px solid rgba(212, 175, 55, 0.1) !important;
    }
    table th {
        text-align: center !important;
        font-weight: bold !important;
        background: linear-gradient(45deg, var(--primary-color), #34495e) !important;
        color: white !important;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    table tr {
        transition: all 0.3s ease;
    }
    table tbody tr:hover {
        background: rgba(212, 175, 55, 0.05) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(212, 175, 55, 0.1);
    }
    .badge {
        background: linear-gradient(45deg, var(--gold), var(--dark-gold));
        color: white;
        font-size: 0.9em;
        border-radius: 12px;
        padding: 0.4em 0.9em;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(212, 175, 55, 0.2);
    }
    .table-responsive {
        border-radius: 20px;
        overflow: hidden;
        margin-top: 1.5rem;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        background: white;
    }
    .btn-primary {
        background: linear-gradient(45deg, var(--gold), var(--dark-gold));
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
    }
    .btn-info {
        background: linear-gradient(45deg, var(--accent-color), #d35400);
        border: none;
        color: white;
    }
    .btn-info:hover {
        background: linear-gradient(45deg, #d35400, var(--accent-color));
        color: white;
    }
    .search-box {
        border: 2px solid rgba(212, 175, 55, 0.2);
        border-radius: 10px;
        padding: 12px 20px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .search-box:focus {
        border-color: var(--gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        outline: none;
    }
    .prodi-btn {
        background: white;
        border: 2px solid rgba(212, 175, 55, 0.2);
        color: var(--primary-color);
        border-radius: 10px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }
    .prodi-btn:hover, .prodi-btn.active {
        background: linear-gradient(45deg, var(--gold), var(--dark-gold));
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(212, 175, 55, 0.2);
    }
    .alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .alert-success {
        background: linear-gradient(45deg, #27ae60, #2ecc71);
        color: white;
    }
    .alert-danger {
        background: linear-gradient(45deg, #c0392b, #e74c3c);
        color: white;
    }
    .aksi-btn-group {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        align-items: center;
    }
</style>

@section('content')
<div class="main-bg px-0">
    <div class="w-100" style="background:#fff; border-radius:32px; box-shadow:0 8px 32px 0 rgba(51,51,51,0.10); padding:2.5rem 2rem; margin:0 auto;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
            <h3 class="mb-3 mb-md-0" style="color:#222; font-weight: bold;">
                <i class="fas fa-users" style="color:#222;"></i> Data Dosen Fakultas Teknik
            </h3>
            <a href="{{ route('dosen.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Dosen
            </a>
        </div>
        <div class="mb-3">
            <span class="fw-bold me-2">Filter Prodi:</span>
            <div class="d-flex flex-wrap gap-2">
                @php
                    $prodis = [
                        'SISTEM INFORMASI', 'INFORMATIKA', 'TEKNIK MESIN',
                        'TEKNIK SIPIL', 'TEKNIK ELEKTRO', 'ARSITEKTUR'
                    ];
                    $selectedProdi = request('prodi');
                @endphp
                <a href="{{ route('dosen.index') }}" class="btn prodi-btn {{ !$selectedProdi ? 'active' : '' }}">Semua</a>
                @foreach($prodis as $prodi)
                    <a href="{{ route('dosen.index', ['prodi' => $prodi]) }}" class="btn prodi-btn {{ $selectedProdi == $prodi ? 'active' : '' }}">
                        {{ $prodi }}
                    </a>
                @endforeach
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-4 ms-auto">
                <input type="text" id="searchInput" class="search-box" placeholder="Cari dosen...">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped align-middle w-100">
                <thead>
                    <tr>
                        <th style="width:40px;">No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Bidang Keahlian</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $i => $d)
                    <tr>
                        <td>{{ $dosen->firstItem() + $i }}</td>
                        <td><span class="badge">{{ $d->nip }}</span></td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->jabatan }}</td>
                        <td>{{ $d->bidang_keahlian }}</td>
                        <td>
                            <span class="badge">{{ $d->prodi }}</span>
                        </td>
                        <td>
                            <div class="aksi-btn-group">
                                <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-primary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-info btn-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $dosen->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('table tbody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>
@endpush
