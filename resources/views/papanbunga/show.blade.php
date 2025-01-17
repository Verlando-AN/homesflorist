@extends('layouts.main')

@section('title', 'Detail Papan Bunga')

@push('styles') 
    <!-- Menambahkan CSS Eksternal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
          integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="row g-4 align-items-start">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide shadow-sm rounded" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach([$papanBunga->gambar] as $index => $gambar)
                        <button type="button" data-bs-target="#carouselExampleIndicators" 
                                data-bs-slide-to="{{ $index }}" 
                                class="{{ $index === 0 ? 'active' : '' }}" 
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                                aria-label="Slide {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @if($papanBunga->gambar)
                        @foreach([$papanBunga->gambar] as $index => $gambar)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $gambar) }}" 
                                     class="d-block w-100 img-fluid product-image" 
                                     alt="{{ $papanBunga->nama }}">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/500x300" 
                                 class="d-block w-100 img-fluid product-image" 
                                 alt="Gambar Tidak Tersedia">
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h1 class="card-title text-dark mb-3">{{ $papanBunga->nama }}</h1>
                    <h2 class="price mb-3">Rp {{ number_format($papanBunga->harga, 0, ',', '.') }}</h2>

                    <hr>
                    <p class="mb-4"><strong>Deskripsi:</strong> {{ $papanBunga->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
                    <div class="d-grid gap-3">
                        <a href="https://wa.me/6281374406280?text=Halo%20saya%20tertarik%20dengan%20papan%20bunga%20yang%20anda%20jual" class="btn btn-success btn-lg">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi Penjual
                        </a>
                        <a href="/home" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
    .price {
        font-size: 1.8rem;
        font-weight: bold;
        color: #28a745;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .btn-outline-secondary {
        transition: all 0.3s ease;
    }
    .btn-outline-secondary:hover {
        background-color: #e9ecef;
        color: #000;
    }
    hr {
        border-top: 1px solid #e9ecef;
    }
</style>
@endsection
