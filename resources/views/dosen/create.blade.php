@extends('layouts.app')

@section('content')
<div class="card p-4">
    <h4 class="mb-3" style="color:#38ef7d;">{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</h4>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($dosen) ? route('dosen.update', $dosen->id) : route('dosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($dosen))
            @method('PUT')
        @endif
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $dosen->nama ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">Jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $dosen->jabatan ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">Bidang Keahlian</label>
                <input type="text" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', $dosen->bidang_keahlian ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dosen->no_hp ?? '') }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label" style="color:#222;">Prodi</label>
                <select name="prodi" class="form-control form-control-lg" required>
                    <option value="">Pilih Prodi</option>
                    @foreach(['SISTEM INFORMASI','INFORMATIKA','TEKNIK MESIN','TEKNIK SIPIL','TEKNIK ELEKTRO','ARSITEKTUR'] as $prodi)
                        <option value="{{ $prodi }}" {{ (old('prodi', $dosen->prodi ?? '') == $prodi) ? 'selected' : '' }}>{{ $prodi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" style="color:#222;">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2">{{ old('alamat', $dosen->alamat ?? '') }}</textarea>
        </div>
        <div class="text-end">
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">{{ isset($dosen) ? 'Update' : 'Simpan' }}</button>
        </div>
    </form>
</div>
@endsection
