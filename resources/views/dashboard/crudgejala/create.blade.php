@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>Tambah Penyakit</h1>
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
    <form action="{{ route('symptoms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Kode Penyakit</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Penyakit</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="mb" class="form-label">Nilai MB</label>
            <input type="text" class="form-control" id="mb" name="mb" required>
        </div>
        <div class="mb-3">
            <label for="md" class="form-label">Nilai MD</label>
            <input type="text" class="form-control" id="md" name="md" required>
        </div> <div class="mb-3">
            <label for="cf" class="form-label">Nilai CF</label>
            <input type="text" class="form-control" id="cf" name="cf" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
