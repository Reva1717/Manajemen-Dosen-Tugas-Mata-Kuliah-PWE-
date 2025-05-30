@extends('layouts.app')

<style>
    table th, table td {
        padding: 16px 18px !important;
        vertical-align: middle !important;
        border: 1px solid #e0e0e0 !important; /* garis tipis antar kolom */
    }
    table th {
        text-align: center !important;
        font-weight: bold !important;
        background: #D3BBED !important;
        color: #222 !important;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(211,187,237,0.08);
    }
    table tr {
        transition: background 0.2s;
    }
    table tbody tr:hover {
        background: #f3eaff !important;
        box-shadow: 0 4px 16px 0 rgba(211,187,237,0.10);
    }
    .badge {
        background: linear-gradient(90deg, #D3BBED 60%, #F9DDE1 100%);
        color: #333;
        font-size: 1em;
        border-radius: 12px;
        padding: 0.4em 0.9em;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(211,187,237,0.08);
    }
    .table-responsive {
        border-radius: 0 0 32px 32px;
        overflow: hidden;
        margin-top: 1.5rem;
        box-shadow: 0 8px 32px 0 rgba(211,187,237,0.10);
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
