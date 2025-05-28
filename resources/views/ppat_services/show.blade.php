@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Layanan PPAT</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama Klien:</strong> {{ $service->client_name }}</li>
        <li class="list-group-item"><strong>Jenis:</strong> {{ $service->service_type }}</li>
        <li class="list-group-item"><strong>Nomor Dokumen:</strong> {{ $service->document_number }}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ $service->service_date }}</li>
        <li class="list-group-item"><strong>Alamat Objek:</strong> {{ $service->object_address }}</li>
        <li class="list-group-item"><strong>Keterangan:</strong> {{ $service->notes }}</li>
    </ul>
</div>
@endsection
