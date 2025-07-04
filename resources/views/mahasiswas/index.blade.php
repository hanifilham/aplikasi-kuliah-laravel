@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-user-graduate me-2"></i> Daftar Mahasiswa</h5>
        <a href="{{ route('mahasiswas.create') }}" class="btn btn-light btn-sm"><i class="fas fa-user-plus me-1"></i> Tambah Mahasiswa</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $mahasiswa->id }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->kelas }}</td>
                            <td>{{ $mahasiswa->prodi->nama ?? 'Tidak Ada' }}</td>
                            <td>{{ $mahasiswa->angkatan }}</td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($mahasiswas->isEmpty())
            <div class="alert alert-info text-center mt-3">Belum ada data mahasiswa.</div>
        @endif
    </div>
</div>
@endsection