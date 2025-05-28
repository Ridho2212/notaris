@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Biaya Layanan</h3>

    <form action="{{ route('service-fees.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Klien</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $fee->client_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Layanan</label>
            <select name="service_type" class="form-control" required>
                <option value="jual_beli" {{ $fee->service_type == 'jual_beli' ? 'selected' : '' }}>Jual Beli</option>
                <option value="hibah" {{ $fee->service_type == 'hibah' ? 'selected' : '' }}>Hibah</option>
                <option value="kuasa" {{ $fee->service_type == 'kuasa' ? 'selected' : '' }}>Kuasa</option>
                <option value="dll" {{ $fee->service_type == 'dll' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Rincian Biaya</label>
            <textarea name="cost_details" class="form-control" required>{{ old('cost_details', $fee->cost_details) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Total Biaya</label>
            <input type="number" name="total_amount" class="form-control" step="0.01" value="{{ old('total_amount', $fee->total_amount) }}" required>
        </div>

        <div class="mb-3">
            <label>Status Pembayaran</label>
            <select name="payment_status" class="form-control" required>
                <option value="belum_bayar" {{ $fee->payment_status == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
                <option value="lunas" {{ $fee->payment_status == 'lunas' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Metode Pembayaran</label>
            <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method', $fee->payment_method) }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Pembayaran</label>
            <input type="date" name="payment_date" class="form-control" value="{{ old('payment_date', $fee->payment_date) }}">
        </div>

        <button class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
