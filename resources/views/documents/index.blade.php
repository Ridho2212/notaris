@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Daftar Arsip Dokumen</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('documents.create') }}" class="btn btn-success mb-3">Tambah Dokumen</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Klien</th>
                    <th>Tanggal</th>
                    <th>Akses</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $doc)
                    <tr>
                        <td>{{ $doc->document_type }}</td>
                        <td>{{ $doc->client_name }}</td>
                        <td>{{ $doc->document_date }}</td>
                        <td>{{ ucfirst($doc->access_status) }}</td>
                        <td>{{ $doc->notes }}</td>
                        <td>
                            <div class="d-flex flex-wrap">
                                {{-- Detail --}}
                                <a href="{{ route('documents.show', $doc->id) }}" class="btn btn-sm btn-info me-1"
                                    title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('documents.edit', $doc->id) }}" class="btn btn-sm btn-warning me-1"
                                    title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                {{-- Download
                                @if ($doc->file_path)
                                <a href="{{ asset('storage/app/private' . $doc->file_path) }}"
                                    class="btn btn-sm btn-secondary me-1" title="Download" target="_blank">
                                    <i class="fas fa-download"></i>
                                </a>
                                @endif --}}

                                {{-- Hapus --}}
                                <form action="{{ route('documents.destroy', $doc->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?');">
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