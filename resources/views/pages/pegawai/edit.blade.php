@extends('layouts.dashboard')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Edit Data Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pegawai <span
                                    class="requiredField">*</span></label>
                            <input value="{{ $pegawai->nama_pegawai }}" type="text"
                                class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama"
                                name="nama_pegawai">
                            @error('nama_pegawai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Pegawai <span
                                    class="requiredField">*</span></label>
                            <input value="{{ $pegawai->alamat }}" type="text"
                                class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                    class="requiredField">*</span></label>
                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin">
                                <option selected disabled hidden>Pilih jenis kelamin</option>
                                <option value="laki-laki" {{ $pegawai->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="perempuan" {{ $pegawai->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
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
                                <label for="telepon" class="form-label">No. Telepon Pegawai <span
                                        class="requiredField">*</span></label>
                                <input value="{{ $pegawai->telepon }}" type="text"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    name="telepon">
                                @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="email" class="form-label">Email <span class="requiredField">*</span></label>
                                <input value="{{ $pegawai->email }}" type="email"
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
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span
                                        class="requiredField">*</span></label>
                                <input value="{{ $pegawai->tanggal_lahir }}" type="date"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                                    name="tanggal_lahir">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="foto_pegawai" class="form-label">Foto Pegawai <span
                                        class="requiredField">*</span></label>
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
                            <img src="{{ asset('storage/' . $pegawai->foto) }}" class="img-preview img-fluid mb-3 d-block">
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
                                <label for="posisi" class="form-label">Posisi <span class="requiredField">*</span></label>
                                <select class="form-select @error('posisi') is-invalid @enderror"
                                    aria-label="Default select example" id="posisi" name="posisi">
                                    <option selected disabled hidden>Pilih posisi pegawai</option>
                                    <option value="manager" {{ $pegawai->posisi == 'manager' ? 'selected' : '' }}>Manager
                                    </option>
                                    <option value="koki" {{ $pegawai->posisi == 'koki' ? 'selected' : '' }}>Koki</option>
                                    <option value="pelayan" {{ $pegawai->posisi == 'pelayan' ? 'selected' : '' }}>Pelayan
                                    </option>
                                    <option value="kasir" {{ $pegawai->posisi == 'kasir' ? 'selected' : '' }}>Kasir
                                    </option>
                                    <option value="cleaning service"
                                        {{ $pegawai->posisi == 'cleaning service' ? 'selected' : '' }}>Cleaning Service
                                    </option>
                                </select>
                                @error('posisi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="status" class="form-label">Status Kepegawaian <span
                                        class="requiredField">*</span></label>
                                <select class="form-select @error('status') is-invalid @enderror"
                                    aria-label="Default select example" id="status" name="status">
                                    <option selected disabled hidden>Pilih status pegawai</option>
                                    <option value="tetap" {{ $pegawai->status == 'tetap' ? 'selected' : '' }}>Pegawai
                                        Tetap</option>
                                    <option value="kontrak" {{ $pegawai->status == 'kontrak' ? 'selected' : '' }}>Pegawai
                                        Kontrak</option>
                                    <option value="magang" {{ $pegawai->status == 'magang' ? 'selected' : '' }}>Magang
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
                                <label for="tanggal_bergabung" class="form-label">Tanggal Bergabung <span
                                        class="requiredField">*</span></label>
                                <input value="{{ $pegawai->tanggal_bergabung }}" type="date"
                                    class="form-control @error('tanggal_bergabung') is-invalid @enderror"
                                    id="tanggal_bergabung" name="tanggal_bergabung">
                                @error('tanggal_bergabung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="w-100">
                                <label for="gaji" class="form-label">Gaji <span
                                        class="requiredField">*</span></label>
                                <input value="{{ $pegawai->gaji }}"
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
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
