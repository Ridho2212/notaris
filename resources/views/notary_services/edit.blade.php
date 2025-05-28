@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Layanan Notaris</h3>

    <form action="{{ route('notary-services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $service->client_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Akta</label>
            <select name="document_type" class="form-control" required>
                <option value="pendirian_pt" {{ $service->document_type == 'pendirian_pt' ? 'selected' : '' }}>Pendirian PT</option>
                <option value="perubahan_ad" {{ $service->document_type == 'perubahan_ad' ? 'selected' : '' }}>Perubahan AD</option>
                <option value="kuasa" {{ $service->document_type == 'kuasa' ? 'selected' : '' }}>Kuasa</option>
                <option value="dll" {{ $service->document_type == 'dll' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Akta</label>
            <input type="text" name="document_number" class="form-control" value="{{ old('document_number', $service->document_number) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Pengurusan</label>
            <input type="date" name="processing_date" class="form-control" value="{{ old('processing_date', $service->processing_date) }}" required>
        </div>

        <div class="mb-3">
            <label>Catatan Tambahan</label>
            <textarea name="notes" class="form-control">{{ old('notes', $service->notes) }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
