@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Layanan PPAT</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('ppat-services.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jenis Layanan</label>
            <select name="service_type" class="form-control" required>
                <option value="jual_beli">Jual Beli</option>
                <option value="hibah">Hibah</option>
                <option value="tukar_menukar">Tukar Menukar</option>
                <option value="dll">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="document_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Layanan</label>
            <input type="date" name="service_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat Objek</label>
            <textarea name="object_address" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
