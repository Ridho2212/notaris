@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Client</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Tambah Client</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Identitas</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->identity_number }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ ucfirst($client->status) }}</td>
                    <td>
                        <div class="d-flex flex-wrap">
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info me-1" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>

                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data klien ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger me-1" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
