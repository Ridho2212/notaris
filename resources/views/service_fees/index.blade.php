@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Daftar Biaya Layanan</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('service-fees.create') }}" class="btn btn-success mb-3">Tambah Biaya</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Klien</th>
                    <th>Layanan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Metode</th>
                    <th>Tanggal Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($fees as $f)
                    <tr>
                        <td>{{ $f->client_name }}</td>
                        <td>{{ $f->service_type }}</td>
                        <td>Rp {{ number_format($f->total_amount, 2, ',', '.') }}</td>
                        <td>{{ ucfirst($f->payment_status) }}</td>
                        <td>{{ $f->payment_method }}</td>
                        <td>{{ $f->payment_date }}</td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                {{-- Detail --}}
                                <a href="{{ route('service-fees.show', $f->id) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('service-fees.edit', $f->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>

                                {{-- Download --}}
                                <a href="{{ route('service-fees.print', $f->id) }}" class="btn btn-sm btn-secondary"
                                    target="_blank" title="Download">
                                    <i class="fas fa-download"></i>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('service-fees.destroy', $f->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Hapus">
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