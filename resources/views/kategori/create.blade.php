@extends('layouts.main')

@section('title', 'Tambah Kategori')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" 
      crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoafP2VUjoV6Oq9DhjPrJwV3KSkv6ALQRIDHBpdPUIskzdf" crossorigin="anonymous"></script>


<div class="container mt-4">
    <h1>Tambah Kategori Papan Bunga</h1>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori') }}" required>
            @error('kategori')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
