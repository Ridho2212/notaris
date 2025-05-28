@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Klien</h3>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama:</strong> {{ $client->name }}</li>
        <li class="list-group-item"><strong>Nomor Identitas:</strong> {{ $client->identity_number }}</li>
        <li class="list-group-item"><strong>Alamat:</strong> {{ $client->address }}</li>
        <li class="list-group-item"><strong>Telepon:</strong> {{ $client->phone }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $client->email }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($client->status) }}</li>
    </ul>
</div>
@endsection
