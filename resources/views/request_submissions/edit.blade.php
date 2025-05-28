@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Pengelolaan Pemohonan</h3>

        <form action="{{ route('request-submissions.update', $submission->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Klien</label>
                <input type="text" name="client_name" class="form-control" value="{{ $submission->client->name ?? '' }}"
                    required>
                <!-- Jika Anda perlu menyimpan client_id juga -->
                <input type="hidden" name="client_id" value="{{ $submission->client_name ?? '' }}">
            </div>

            <div class="mb-3">
                <label>Jenis Pemohonan</label>
                <select name="request_type" class="form-control">
                    <option value="sertifikat" {{ $submission->request_type == 'sertifikat' ? 'selected' : '' }}>Sertifikat
                    </option>
                    <option value="ajb" {{ $submission->request_type == 'ajb' ? 'selected' : '' }}>AJB</option>
                    <option value="waris" {{ $submission->request_type == 'waris' ? 'selected' : '' }}>Waris</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="menunggu" {{ $submission->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diproses" {{ $submission->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $submission->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ $submission->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="submission_date" class="form-control" value="{{ $submission->submission_date }}">
            </div>

            <div class="mb-3">
                <label>Catatan</label>
                <textarea name="notes" class="form-control">{{ $submission->notes }}</textarea>
            </div>

            <div class="mb-3">
                <label>Upload Dokumen</label>
                <input type="file" name="document" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection