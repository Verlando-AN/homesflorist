@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>Daftar Penyakit</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('diseases.create') }}" class="btn btn-primary mb-3">Tambah Penyakit</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diseases as $disease)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $disease->name }}</td>
                <td>
                    <a href="{{ route('diseases.edit', $disease) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('diseases.destroy', $disease) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penyakit ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
