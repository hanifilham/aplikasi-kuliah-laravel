@extends('layouts.app')

@section('title', 'Daftar Program Studi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-graduation-cap me-2"></i> Daftar Program Studi</h5>
        <a href="{{ route('prodis.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus-circle me-1"></i> Tambah Prodi</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Fakultas</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodis as $prodi)
                        <tr>
                            <td>{{ $prodi->id }}</td>
                            <td>{{ $prodi->nama }}</td>
                            <td>{{ $prodi->fakultas }}</td>
                            <td class="text-center">
                                <a href="{{ route('prodis.edit', $prodi->id) }}" class="btn btn-warning btn-sm me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('prodis.destroy', $prodi->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus prodi ini?')" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($prodis->isEmpty())
            <div class="alert alert-info text-center mt-3">Belum ada data program studi.</div>
        @endif
    </div>
</div>
@endsection