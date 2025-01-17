@extends('layouts.main')

@section('title', 'Daftar Papan Bunga')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" 
      crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoafP2VUjoV6Oq9DhjPrJwV3KSkv6ALQRIDHBpdPUIskzdf" crossorigin="anonymous"></script>


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
