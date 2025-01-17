@extends('layouts.main')

@section('content')
<div class="container mt-4 text-center">
    <h1 class="mb-4 text-primary">BAMBANG MOTOR</h1>
    <p class="lead text-secondary">Tempat terbaik untuk menemukan motor impian Anda dengan berbagai pilihan menarik!</p>
</div>

<div class="container mt-4">
    <div id="carouselAllMotors" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($motors->chunk(5) as $index => $chunk)
            <button type="button" data-bs-target="#carouselAllMotors" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach($motors->chunk(5) as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center gap-3">
                    @foreach($chunk as $motor)
                    <a href="{{ route('motor.show', $motor->id) }}" class="text-decoration-none">
                        <div class="card shadow-lg" style="width: 10rem;">
                            @if($motor->gambar)
                                <img src="{{ asset('storage/' . $motor->gambar) }}" class="card-img-top rounded" alt="{{ $motor->nama_motor }}" style="height: 150px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top rounded" alt="No image available" style="height: 150px; object-fit: cover;">
                            @endif
                            <div class="card-body text-center p-2">
                                <h5 class="card-title">{{ $motor->nama_motor }}</h5>
                                <p class="card-text">Merk: <strong>{{ $motor->merk }}</strong></p>
                                <div>
                                    <span class="badge bg-success">Rp {{ number_format($motor->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAllMotors" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselAllMotors" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

@foreach(['Metik', 'Kompling', 'Manual'] as $kategori)
    <div class="container mt-4">
        <h3 class="mb-4 text-secondary">{{ $kategori }}</h3>
        @if($$kategori->isEmpty())
            <p>Tidak ada data motor {{ $kategori }}.</p>
        @else
            <div id="carousel{{ $kategori }}" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    @foreach($$kategori->chunk(5) as $index => $chunk)
                        <button type="button" data-bs-target="#carousel{{ $kategori }}" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($$kategori->chunk(5) as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center gap-3">
                                @foreach($chunk as $motor)
                                    <a href="{{ route('motor.show', $motor->id) }}" class="text-decoration-none">
                                        <div class="card shadow-sm" style="width: 10rem; border: 1px solid #ddd; transition: transform 0.3s;">
                                            @if($motor->gambar)
                                                <img src="{{ asset('storage/' . $motor->gambar) }}" class="card-img-top" alt="{{ $motor->nama_motor }}" style="height: 150px; object-fit: cover;">
                                            @else
                                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No image available" style="height: 150px; object-fit: cover;">
                                            @endif
                                            <div class="card-body p-2">
                                                <h5 class="card-title text-center" style="font-size: 0.9rem;">{{ $motor->nama_motor }}</h5>
                                                <p class="card-text text-center" style="font-size: 0.8rem;">Merk: <strong>{{ $motor->merk }}</strong></p>
                                                <div class="text-center">
                                                    <span class="badge bg-info">Rp {{ number_format($motor->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $kategori }}" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $kategori }}" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </div>
@endforeach

<style>
    body {
    background: linear-gradient(to bottom right, #f8f9fa, #e9ecef);
    font-family: 'Arial', sans-serif;
}

h1, h3 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

.card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card:hover {
    transform: scale(1.0);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.carousel-inner .active {
    border: 2px solid #007bff;
    box-shadow: 0 8px 16px rgba(0, 123, 255, 0.4);
    border-radius: 10px;
}

.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: #007bff;
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
}

.btn-outline-primary {
    border: 2px solid #007bff;
    color: #007bff;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
}

</style>
@endsection
