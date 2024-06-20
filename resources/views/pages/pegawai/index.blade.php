@extends('layouts.dashboard')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h3>Kelola Data Pegawai</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ route('pegawai.create') }}" class="btn btn-primary d-flex gap-2 align-items-center">
                    <i class="bi bi-plus-square"></i> Tambah Pegawai
                </a>
            </div>
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table table-striped table-bordered'], true) }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
