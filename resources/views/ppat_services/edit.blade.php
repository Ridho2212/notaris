@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Layanan PPAT</h3>

    <form action="{{ route('ppat-services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $service->client_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Layanan</label>
            <select name="service_type" class="form-control" required>
                <option value="jual_beli" {{ $service->service_type == 'jual_beli' ? 'selected' : '' }}>Jual Beli</option>
                <option value="hibah" {{ $service->service_type == 'hibah' ? 'selected' : '' }}>Hibah</option>
                <option value="tukar_menukar" {{ $service->service_type == 'tukar_menukar' ? 'selected' : '' }}>Tukar Menukar</option>
                <option value="dll" {{ $service->service_type == 'dll' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="document_number" class="form-control" value="{{ old('document_number', $service->document_number) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Layanan</label>
            <input type="date" name="service_date" class="form-control" value="{{ old('service_date', $service->service_date) }}" required>
        </div>

        <div class="mb-3">
            <label>Alamat Objek</label>
            <input type="text" name="object_address" class="form-control" value="{{ old('object_address', $service->object_address) }}" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="notes" class="form-control">{{ old('notes', $service->notes) }}</textarea>
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
