@extends('layouts.main')

@section('title', 'Edit Papan Bunga')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" 
      crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoafP2VUjoV6Oq9DhjPrJwV3KSkv6ALQRIDHBpdPUIskzdf" crossorigin="anonymous"></script>

<div class="container mt-4">
    <h1>Edit Papan Bunga</h1>
    <form action="{{ route('papanbunga.update', $papanBunga->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Papan Bunga</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $papanBunga->nama) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $papanBunga->harga) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $papanBunga->kategori_id == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Papan Bunga</label>
            <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
        </div>
        
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi papan bunga...">{{ old('deskripsi', $papanBunga->deskripsi) }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('papanbunga.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
