@extends('layouts.main')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
      integrity="sha384-TN2N27yshwE6P2IHpCsMa9bQgFBdT5w+Zn/8LW4G65w9I9m/Vs9r3YO6UyCQc/x8" 
      crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoafP2VUjoV6Oq9DhjPrJwV3KSkv6ALQRIDHBpdPUIskzdf" crossorigin="anonymous"></script>

<div class="container mt-5">
    <div class="text-center mb-5 position-relative">
        <div class="bg-light rounded shadow-lg py-4 px-3">
            <h1 class="display-4 fw-bold text-primary mb-3">HOME'S FLORIST</h1>
            <p class="lead text-muted px-lg-5">
                Spesialis Papan Bunga Terbaik untuk Segala Momen Penting!
            </p>
        </div>
    </div>

    <div class="row mb-4 text-center">
        @foreach ([
            ['icon' => 'fa-truck', 'title' => 'Pengiriman Cepat', 'desc' => 'Kirim ke seluruh wilayah dalam 24 jam', 'color' => 'text-primary'],
            ['icon' => 'fa-heart', 'title' => 'Kualitas Terjamin', 'desc' => 'Bunga segar dan desain premium', 'color' => 'text-danger'],
            ['icon' => 'fa-tags', 'title' => 'Harga Kompetitif', 'desc' => 'Harga terbaik untuk kualitas terbaik', 'color' => 'text-success']
        ] as $feature)
        <div class="col-12 col-md-4 mb-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body">
                    <i class="fas {{ $feature['icon'] }} {{ $feature['color'] }} fs-2 mb-3"></i>
                    <h5 class="card-title fw-bold">{{ $feature['title'] }}</h5>
                    <p class="text-muted">{{ $feature['desc'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        @foreach($papanBunga as $papan_bunga)
        <div class="col-12 col-md-4 mb-4">
            <div class="card border-0 shadow-lg h-100">
                <a href="{{ route('papan_bunga.show', $papan_bunga->id) }}" class="text-decoration-none">
                    <div class="position-relative overflow-hidden rounded-top">
                        <img src="{{ $papan_bunga->gambar ? asset('storage/' . $papan_bunga->gambar) : 'https://via.placeholder.com/250' }}" 
                             class="card-img-top img-fluid transition-transform" 
                             alt="{{ $papan_bunga->nama }}" 
                             style="height: 250px; object-fit: cover;">
                    </div>
                    <div class="card-body bg-light text-center py-3">
                        <h5 class="card-title mb-2 text-dark fw-bold">{{ $papan_bunga->nama }}</h5>
                        <span class="badge bg-success fs-6">Rp {{ number_format($papan_bunga->harga, 0, ',', '.') }}</span>
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-shopping-cart me-1"></i>Beli Sekarang
                            </button>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-5 text-center">
        <h2 class="mb-4 text-primary">Mengapa Memilih Kami?</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="list-group list-group-flush">
                    @foreach ([
                        'Desain Profesional yang Disesuaikan dengan Acara Anda',
                        'Kepuasan Pelanggan Adalah Prioritas Utama Kami',
                        'Garansi Uang Kembali Jika Tidak Sesuai Harapan'
                    ] as $reason)
                    <li class="list-group-item bg-light mb-2 rounded shadow-sm">
                        <i class="fas fa-check-circle text-success me-2"></i>{{ $reason }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <div class="row align-items-center">
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-primary">HOME'S FLORIST</h6>
                    <p class="text-muted">Pusatnya Papan Bunga Berkualitas</p>
                    <p class="text-muted">Terpercaya dan Profesional</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-primary">Lokasi</h6>
                    <div class="rounded overflow-hidden border">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.1697234290205!2d104.9610781!3d-5.3910874999999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e472d95444c2dc7%3A0x7ae4e438beb829bb!2sJX56%2BHC8%2C%20Margodadi%2C%20Kec.%20Ambarawa%2C%20Kabupaten%20Pringsewu%2C%20Lampung!5e0!3m2!1sid!2sid!4v1733712916229!5m2!1sid!2sid" 
                            width="100%" 
                            height="150" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <h6 class="fw-bold text-primary">Kontak Kami</h6>
                    <p class="text-muted mb-1">@homes_florist</p>
                    <p class="text-muted mb-1">+62 813-7440-6280</p>
                    <p class="text-muted">Sukarame</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<footer class="bg-primary text-white py-4 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-md-start mb-3 mb-md-0">
                <p class="mb-0">&copy; 2024 HOME'S FLORIST. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-white text-decoration-none mx-2">Privacy Policy</a>
                <a href="#" class="text-white text-decoration-none mx-2">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<style>
    .transition-transform:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
    footer {
        background-color: #343a40;
    }
</style>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoafP2VUjoV6Oq9DhjPrJwV3KSkv6ALQRIDHBpdPUIskzdf" crossorigin="anonymous"></script>
@endsection
