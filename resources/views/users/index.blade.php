@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Manajemen User</h3>

        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah User</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->full_name }}</td>
                        <td>{{ ucfirst($u->role) }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ ucfirst($u->status) }}</td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <form action="{{ route('users.destroy', $u->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?');">
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