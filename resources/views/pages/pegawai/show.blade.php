@extends('layouts.dashboard')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Detail Data Pegawai</h4>
        </div>
        <div class="card-body">
            <div class="mb-3 wadah-preview rounded">
                <img src="{{ asset('storage/' . $pegawai->foto) }}" class="img-fluid  foto-detil-pegawai">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pegawai</label>
                <input readonly value="{{ $pegawai->nama_pegawai }}" type="text" class="form-control text-capitalize "
                    id="nama" name="nama_pegawai">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pegawai</label>
                <input readonly value="{{ $pegawai->alamat }}" type="text" class="form-control text-capitalize"
                    id="alamat" name="alamat">
            </div>
            <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                <div class="w-100">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input readonly value="{{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->format('d F Y') }}"
                        type="text" class="form-control text-capitalize " id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <div class="w-100">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input readonly value="{{ $pegawai->jenis_kelamin }}" type="text"
                        class="form-control text-capitalize" id="jenis_kelamin" name="jenis_kelamin">
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                <div class="w-100">
                    <label for="telepon" class="form-label">No. Telepon Pegawai</label>
                    <input readonly value="{{ $pegawai->telepon }}" type="text" class="form-control text-capitalize"
                        id="telepon" name="telepon">
                </div>
                <div class="w-100">
                    <label for="email" class="form-label">Email</label>
                    <input readonly value="{{ $pegawai->email }}" type="email" class="form-control" id="email"
                        name="email">
                </div>
            </div>
            <br>
            <hr><br>
            <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                <div class="w-100">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input readonly value="{{ $pegawai->posisi }}" type="text" class="form-control text-capitalize"
                        id="posisi" name="posisi">
                </div>
                <div class="w-100">
                    <label for="status" class="form-label">Status Kepegawaian</label>
                    <input readonly value="{{ 'Pegawai ' . $pegawai->status }}" type="text"
                        class="form-control text-capitalize" id="status" name="status">
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row mb-5 gap-3">
                <div class="w-100">
                    <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                    <input readonly value="{{ \Carbon\Carbon::parse($pegawai->tanggal_bergabung)->format('d F Y') }}"
                        type="text" class="form-control text-capitalize " id="tanggal_bergabung"
                        name="tanggal_bergabung">
                </div>
                <div class="w-100">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input readonly value="{{ 'Rp. ' . number_format($pegawai->gaji, 0, ',', '.') }}" type="text"
                        class="form-control text-capitalize" id="gaji" name="gaji">
                </div>
            </div>

            <div class="d-flex justify-content-end button-kembali">
                <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection
