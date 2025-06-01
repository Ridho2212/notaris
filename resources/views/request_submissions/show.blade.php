@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Pemohonan</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Klien:</strong> {{ $submission->client_name }}</li>
            <li class="list-group-item"><strong>Jenis:</strong> {{ $submission->request_type }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $submission->status }}</li>
            <li class="list-group-item"><strong>Tanggal:</strong> {{ $submission->submission_date }}</li>
            <li class="list-group-item"><strong>Catatan:</strong> {{ $submission->notes }}</li>
            <li class="list-group-item"><strong>Dokumen:</strong>
                @if($submission->document_path)
                    <a href="{{ route('request-submissions.document', $submission->id) }}" target="_blank">Lihat Dokumen</a>
                @else
                    Tidak ada
                @endif
            </li>
        </ul>
    </div>
@endsection