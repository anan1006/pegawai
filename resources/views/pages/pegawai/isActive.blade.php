@if ($pegawai->isActive == 0)
    <a href="{{ route('isActive', $pegawai->id_pegawai) }}" class="btn btn-sm btn-info">Tampilkan</a>
@else
    <a href="{{ route('isActive', $pegawai->id_pegawai) }}" class="btn btn-sm btn-danger">Sembunyikan</a>
@endif
