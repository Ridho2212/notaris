@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Daftar Pemohonan</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('request-submissions.create') }}" class="btn btn-success mb-3">Tambah Pemohonan</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Dokumen</th> <!-- Tambah kolom -->
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $s)
                    <tr>
                        <td>{{ $s->client_name }}</td>
                        <td>{{ ucfirst($s->request_type) }}</td>
                        <td>{{ ucfirst($s->status) }}</td>
                        <td>{{ $s->submission_date }}</td>
                        <td>
                            @if ($s->document_path)
                                <a href="{{ asset('storage/' . $s->document_path) }}" target="_blank">Lihat</a>
                            @else
                                Tidak Ada
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-wrap">
                                {{-- Tombol Detail --}}
                                <a href="{{ route('request-submissions.show', $s->id) }}" class="btn btn-sm btn-info me-1"
                                    title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('request-submissions.edit', $s->id) }}" class="btn btn-sm btn-warning me-1"
                                    title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('request-submissions.destroy', $s->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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

        </table>
    </div>
@endsection