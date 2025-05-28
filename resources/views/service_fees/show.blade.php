@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Biaya Layanan</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Klien:</strong> {{ $fee->client_name }}</li>
        <li class="list-group-item"><strong>Layanan:</strong> {{ $fee->service_type }}</li>
        <li class="list-group-item"><strong>Total:</strong> Rp {{ number_format($fee->total_amount, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>Rincian:</strong> {!! nl2br(e($fee->cost_details)) !!}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $fee->payment_status }}</li>
        <li class="list-group-item"><strong>Metode:</strong> {{ $fee->payment_method }}</li>
        <li class="list-group-item"><strong>Tanggal Bayar:</strong> {{ $fee->payment_date }}</li>
    </ul>
</div>
@endsection
