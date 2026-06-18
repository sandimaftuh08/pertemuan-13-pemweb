@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-speedometer2"></i> Dashboard</h1>
    <small class="text-muted">Sistem Manajemen Perpustakaan</small>
</div>

{{-- Statistik Buku --}}
<h5 class="mb-3 text-primary"><i class="bi bi-book"></i> Statistik Buku</h5>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Total Buku</h6>
                    <h2 class="mb-0">{{ $totalBuku }}</h2>
                </div>
                <i class="bi bi-book-fill text-primary" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Buku Tersedia</h6>
                    <h2 class="mb-0">{{ $bukuTersedia }}</h2>
                </div>
                <i class="bi bi-check-circle-fill text-success" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Buku Habis</h6>
                    <h2 class="mb-0">{{ $bukuHabis }}</h2>
                </div>
                <i class="bi bi-x-circle-fill text-danger" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
</div>

{{-- Statistik Anggota --}}
<h5 class="mb-3 text-success"><i class="bi bi-people"></i> Statistik Anggota</h5>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Total Anggota</h6>
                    <h2 class="mb-0">{{ $totalAnggota }}</h2>
                </div>
                <i class="bi bi-people-fill text-success" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Anggota Aktif</h6>
                    <h2 class="mb-0">{{ $anggotaAktif }}</h2>
                </div>
                <i class="bi bi-person-check-fill text-primary" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-secondary">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted mb-1">Anggota Nonaktif</h6>
                    <h2 class="mb-0">{{ $anggotaNonaktif }}</h2>
                </div>
                <i class="bi bi-person-x-fill text-secondary" style="font-size:3rem;"></i>
            </div>
        </div>
    </div>
</div>

{{-- Tabel Terbaru --}}
<div class="row">
    {{-- 5 Buku Terbaru --}}
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> 5 Buku Terbaru</h6>
                <a href="{{ route('buku.index') }}" class="btn btn-sm btn-light">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bukuTerbaru as $buku)
                        <tr>
                            <td>
                                <a href="{{ route('buku.show', $buku->id) }}" class="text-decoration-none">
                                    {{ Str::limit($buku->judul, 30) }}
                                </a>
                            </td>
                            <td><span class="badge bg-primary">{{ $buku->kategori }}</span></td>
                            <td>
                                @if ($buku->stok > 0)
                                    <span class="badge bg-success">{{ $buku->stok }}</span>
                                @else
                                    <span class="badge bg-danger">Habis</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- 5 Anggota Terbaru --}}
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-clock-history"></i> 5 Anggota Terbaru</h6>
                <a href="{{ route('anggota.index') }}" class="btn btn-sm btn-light">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotaTerbaru as $anggota)
                        <tr>
                            <td>
                                <a href="{{ route('anggota.show', $anggota->id) }}" class="text-decoration-none">
                                    {{ $anggota->nama }}
                                </a>
                            </td>
                            <td>{{ Str::limit($anggota->email, 25) }}</td>
                            <td>
                                @if ($anggota->status == 'Aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">Belum ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Quick Links --}}
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0"><i class="bi bi-lightning-charge"></i> Quick Links</h6>
            </div>
            <div class="card-body d-flex flex-wrap gap-2">
                <a href="{{ route('buku.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-book"></i> Daftar Buku
                </a>
                <a href="{{ route('buku.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Buku
                </a>
                <a href="{{ route('anggota.index') }}" class="btn btn-outline-success">
                    <i class="bi bi-people"></i> Daftar Anggota
                </a>
                <a href="{{ route('anggota.create') }}" class="btn btn-success">
                    <i class="bi bi-person-plus"></i> Tambah Anggota
                </a>
                <a href="#" class="btn btn-outline-info">
                    <i class="bi bi-arrow-left-right"></i> Transaksi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection