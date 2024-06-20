@extends('layouts.dashboard')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Data Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pegawai</label>
                            <input value="{{ old('nama_pegawai') }}" type="text"
                                class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama"
                                name="nama_pegawai">
                            @error('nama_pegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Pegawai</label>
                            <input value="{{ old('alamat') }}" type="text"
                                class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                                <option selected disabled hidden>Pilih jenis kelamin</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                            <div class="w-100">
                                <label for="telepon" class="form-label">No. Telepon Pegawai</label>
                                <input value="{{ old('telepon') }}" type="text"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    name="telepon">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ old('email') }}" type="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row-reverse mb-3 gap-3">
                            <div class="w-100">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input value="{{ old('tanggal_lahir') }}" type="date"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                    name="tanggal_lahir">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="foto_pegawai" class="form-label">Foto Pegawai</label>
                                <input class="form-control @error('foto') is-invalid @enderror" type="file"
                                    id="foto_pegawai" name="foto" onchange="previewImg()">
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="wadah-preview">
                            <img class="img-preview img-fluid mb-3 d-block">
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Tambahan</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                            <div class="w-100">
                                <label for="posisi" class="form-label">Posisi</label>
                                <select class="form-select @error('posisi') is-invalid @enderror"
                                    aria-label="Default select example" id="posisi" name="posisi">
                                    <option selected disabled hidden>Pilih posisi pegawai</option>
                                    <option value="manager" {{ old('posisi') == 'manager' ? 'selected' : '' }}>Manager
                                    </option>
                                    <option value="koki" {{ old('posisi') == 'koki' ? 'selected' : '' }}>Koki</option>
                                    <option value="pelayan" {{ old('posisi') == 'pelayan' ? 'selected' : '' }}>Pelayan
                                    </option>
                                    <option value="kasir" {{ old('posisi') == 'kasir' ? 'selected' : '' }}>Kasir
                                    </option>
                                    <option value="cleaning service"
                                        {{ old('posisi') == 'cleaning service' ? 'selected' : '' }}>
                                        Cleaning Service</option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="status" class="form-label">Status Kepegawaian</label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                    aria-label="Default select example" id="status" name="status">
                                    <option selected disabled hidden>Pilih status pegawai</option>
                                    <option value="tetap" {{ old('status') == 'tetap' ? 'selected' : '' }}>Pegawai Tetap
                                    </option>
                                    <option value="kontrak" {{ old('status') == 'kontrak' ? 'selected' : '' }}>Pegawai
                                        Kontrak</option>
                                    <option value="magang" {{ old('status') == 'magang' ? 'selected' : '' }}>Magang
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-md-row mb-3 gap-3">
                            <div class="w-100">
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung</label>
                                <input value="{{ old('tanggal_bergabung') }}" type="date"
                                    class="form-control @error('tanggal_bergabung') is-invalid @enderror"
                                    id="tanggal_bergabung" name="tanggal_bergabung">
                                @error('tanggal_bergabung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="gaji" class="form-label">Gaji</label>
                                <input value="{{ old('gaji') }}"
                                    class="form-control @error('gaji') is-invalid @enderror" type="number"
                                    id="gaji" name="gaji">
                                @error('gaji')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="d-flex justify-content-end gap-2 mt-5">
                    <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Kembali</a>
                    <button class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection