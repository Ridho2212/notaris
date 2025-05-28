@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Dokumen</h3>

    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Jenis Dokumen</label>
            <input type="text" name="document_type" class="form-control" value="{{ old('document_type', $document->document_type) }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $document->client_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Dokumen</label>
            <input type="date" name="document_date" class="form-control" value="{{ old('document_date', $document->document_date) }}" required>
        </div>

        <div class="mb-3">
            <label>Upload Dokumen</label>
            <input type="file" name="file" class="form-control">
            @if ($document->file_path)
                <small>File saat ini: <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Lihat</a></small>
            @endif
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="notes" class="form-control">{{ old('notes', $document->notes) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status Akses</label>
            <select name="access_status" class="form-control" required>
                <option value="privat" {{ $document->access_status == 'privat' ? 'selected' : '' }}>Privat</option>
                <option value="publik" {{ $document->access_status == 'publik' ? 'selected' : '' }}>Publik</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
