<nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-white d-flex align-items-center" href="#">
            <img src="{{ asset('gambar/logo.png') }}" alt="Logo" class="rounded-circle" style="height: 40px; margin-right: 10px;">
            HOME'S FLORIST
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="/">Home</a>
                </li>
              
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdownActions" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Tambah
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownActions">
                        <li><a class="dropdown-item" href="/kategori">Kategori</a></li>
                        
                        <li><a class="dropdown-item" href="/papanbunga">Bunga</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item btn-logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
                
            </ul>

        </div>
    </div>
</nav>


<style>
img.rounded-circle {
    border-radius: 50%;
    object-fit: cover;
}

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: 600;
        letter-spacing: 2px;
    }
    .navbar-nav .nav-link {
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #f8f9fa !important;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }
    .dropdown-menu {
        background-color: #0056b3;
        border-radius: 10px;
    }

    .dropdown-menu .dropdown-item {
        color: white;
        padding: 12px 20px;
        font-weight: 500;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #004085;
        border-radius: 5px;
    }
    .btn-outline-light {
        border-color: #f8f9fa;
        color: #f8f9fa;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-light:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }
    .btn-logout {
        background-color: transparent;
        border: none;
        padding: 10px 20px;
        color: #ff6f61;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .btn-logout:hover {
        color: #d9534f;
    }
</style>

