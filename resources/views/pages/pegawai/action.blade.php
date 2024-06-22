<div class="d-flex gap-2">
    @if ($pegawai->isActive == 0)
        <a href="{{ route('isActive', $pegawai->id_pegawai) }}" class="btn btn-sm btn-primary">Tampilkan</a>
    @else
        <a href="{{ route('isActive', $pegawai->id_pegawai) }}" class="btn btn-sm btn-danger">Sembunyikan</a>
    @endif

    <a href="{{ route('pegawai.show', $pegawai->id_pegawai) }}" class="btn btn-sm btn-info">
        <i class="bi bi-eye"></i>
    </a>
    <a href="{{ route('pegawai.edit', $pegawai->id_pegawai) }}" class="btn btn-sm btn-warning">
        <i class="bi bi-pencil-square"></i>
    </a>
    <form id="delete-form-{{ $pegawai->id_pegawai }}" action="{{ route('pegawai.destroy', $pegawai->id_pegawai) }}"
        method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $pegawai->id_pegawai }}')"><i
            class="bi bi-trash"></i></button>

</div>
