@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>Daftar Penyakit</h1>
    <a href="{{ route('diseases.create') }}" class="btn btn-primary mb-3">Tambah Penyakit</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diseases as $disease)
            <tr>
                <td>{{ $disease->name }}</td>
                <td>
                    <a href="{{ route('diseases.edit', $disease) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('diseases.destroy', $disease) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
