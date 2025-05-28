@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Dokumen</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Jenis:</strong> {{ $document->document_type }}</li>
        <li class="list-group-item"><strong>Klien:</strong> {{ $document->client_name }}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ $document->document_date }}</li>
        <li class="list-group-item"><strong>Akses:</strong> {{ ucfirst($document->access_status) }}</li>
        <li class="list-group-item"><strong>Keterangan:</strong> {{ $document->notes }}</li>
        <li class="list-group-item"><strong>File:</strong>
            @if ($document->file_path)
                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Lihat Dokumen</a>
            @else
                Tidak ada
            @endif
        </li>
    </ul>
</div>
@endsection
