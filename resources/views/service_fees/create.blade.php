@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Biaya Layanan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('service-fees.store') }}" method="POST">
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
                <option value="kuasa">Kuasa</option>
                <option value="dll">Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Rincian Biaya</label>
            <textarea name="cost_details" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Total Biaya</label>
            <input type="number" name="total_amount" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="payment_status" class="form-control" required>
                <option value="belum_bayar">Belum Bayar</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="payment_method" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="payment_date" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
