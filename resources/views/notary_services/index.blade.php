@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Layanan Notaris</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('notary-services.create') }}" class="btn btn-success mb-3">Tambah Layanan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Klien</th>
                <th>Jenis Akta</th>
                <th>Nomor Akta</th>
                <th>Tanggal</th>
                <th>Draft</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $s)
                <tr>
                    <td>{{ $s->client_name }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $s->document_type)) }}</td>
                    <td>{{ $s->document_number }}</td>
                    <td>{{ $s->processing_date }}</td>
                    <td>
                        @if ($s->draft_path)
                            <a href="{{ asset('storage/' . $s->draft_path) }}" target="_blank">Lihat</a>
                        @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>{{ $s->notes }}</td>
                    <td>
                        <div class="d-flex gap-1 flex-wrap">
                            <a href="{{ route('notary-services.show', $s->id) }}" class="btn btn-sm btn-info me-1" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('notary-services.edit', $s->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            <form action="{{ route('notary-services.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger me-1" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
