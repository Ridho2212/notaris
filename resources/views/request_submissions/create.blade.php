@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Mengelola Pemohonan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('request-submissions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Pemohon</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Pemohonan</label>
            <select name="request_type" class="form-control" required>
                <option value="sertifikat">Sertifikat</option>
                <option value="ajb">AJB</option>
                <option value="waris">Waris</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="menunggu">Menunggu</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Pengajuan</label>
            <input type="date" name="submission_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Catatan Tambahan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Upload Dokumen</label>
            <input type="file" name="document" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
