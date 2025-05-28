@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="text-center">
            <h2 class="fw-bold text-primary">Selamat Datang di Halaman Dashboard Notaris</h2>
            <p class="text-muted">
                Anda telah berhasil masuk ke dashboard Notaris
            </p>

            {{-- <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger mt-3">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form> --}}
        </div>
    </div>
@endsection