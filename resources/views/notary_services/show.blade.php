@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Layanan Notaris</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama Klien:</strong> {{ $service->client_name }}</li>
        <li class="list-group-item"><strong>Jenis Akta:</strong> {{ $service->document_type }}</li>
        <li class="list-group-item"><strong>Nomor Akta:</strong> {{ $service->document_number }}</li>
        <li class="list-group-item"><strong>Tanggal Pengurusan:</strong> {{ $service->processing_date }}</li>
        <li class="list-group-item"><strong>Catatan:</strong> {{ $service->notes }}</li>
    </ul>
</div>
@endsection
