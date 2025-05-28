@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Arsip Dokumen</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Jenis Dokumen</label>
            <input type="text" name="document_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Dokumen</label>
            <input type="date" name="document_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Dokumen</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Status Akses</label>
            <select name="access_status" class="form-control" required>
                <option value="privat">Privat</option>
                <option value="publik">Publik</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
