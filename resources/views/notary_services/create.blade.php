@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Layanan Notaris</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('notary-services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Akta</label>
            <select name="document_type" class="form-control" required>
                <option value="pendirian_pt">Pendirian PT</option>
                <option value="perubahan_ad">Perubahan Anggaran Dasar</option>
                <option value="kuasa">Kuasa</option>
                <option value="dll">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pengurusan</label>
            <input type="date" name="processing_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nomor Akta</label>
            <input type="text" name="document_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Draft Akta</label>
            <input type="file" name="draft" class="form-control">
        </div>

        <div class="mb-3">
            <label>Catatan Tambahan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
