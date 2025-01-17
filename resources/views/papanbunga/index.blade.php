@extends('layouts.main')

@section('title', 'Daftar Papan Bunga')

@section('content')
<div class="container mt-4">
    <h1>Daftar Papan Bunga</h1>
    <a href="{{ route('papanbunga.create') }}" class="btn btn-primary mb-3">Tambah Papan Bunga</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Papan Bunga</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($papanBunga as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ number_format($item->harga, 2) }}</td>
                <td>{{ $item->kategori->nama_kategori ?? 'Tidak ada' }}</td>
                <td>
                    <a href="{{ route('papanbunga.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    
                    <a href="{{ route('papanbunga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('papanbunga.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
