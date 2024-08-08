@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>Daftar Gejala</h1>
    <a href="{{ route('symptoms.create') }}" class="btn btn-primary mb-3">Tambah Gejala</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($symptoms as $symptom)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $symptom->name }}</td>
                <td>
                    <a href="{{ route('symptoms.edit', $symptom) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('symptoms.destroy', $symptom) }}" method="POST" style="display:inline;">
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
