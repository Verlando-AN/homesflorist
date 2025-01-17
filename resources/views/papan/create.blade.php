@extends('layouts.main')

@section('title', 'Tambah Papan Bunga')

@section('content')
<div class="container mt-4">
    <h1>Tambah Papan Bunga</h1>
    <form action="{{ route('papanbunga.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Papan Bunga</label>
            <input 
                type="text" 
                name="nama" 
                id="nama" 
                class="form-control @error('nama') is-invalid @enderror" 
                value="{{ old('nama') }}" 
                required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input 
                type="number" 
                name="harga" 
                id="harga" 
                class="form-control @error('harga') is-invalid @enderror" 
                value="{{ old('harga') }}" 
                required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select 
                name="kategori" 
                id="kategori" 
                class="form-control @error('kategori') is-invalid @enderror">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Papan Bunga</label>
            <input 
                type="file" 
                name="gambar" 
                id="gambar" 
                class="form-control @error('gambar') is-invalid @enderror" 
                accept="image/*">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                class="form-control @error('deskripsi') is-invalid @enderror" 
                rows="4" 
                placeholder="Masukkan deskripsi papan bunga...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('papanbunga.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
