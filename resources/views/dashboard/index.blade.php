@extends('dashboard.layout.mainuser')

@section('containerr')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Account Settings</h5>
                </div>
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        @if (auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="User Image" class="img-fluid rounded-start" style="height: 200px; object-fit: cover; padding: 10px;">
                        @else
                            <img src="https://cdn.icon-icons.com/icons2/2248/PNG/512/account_icon_138984.png" alt="Default Image" class="img-fluid" style="height: 200px; object-fit: cover; padding: 10px;">
                        @endif
                        <h5 class="card-title mt-2">{{ auth()->user()->username }}</h5>
                        <p class="card-text"><small class="text-muted">Joined on {{ auth()->user()->created_at->format('F d, Y') }}</small></p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>

                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(auth()->user()->is_admin)
        <div class="col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Daftar Pengguna</h5>
                </div>
                <div class="card-body">
                    <h1>Daftar Pengguna</h1>
                    <ul>
                        @foreach ($users as $user)
                            <li>{{ $user->name }} - {{ $user->email }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
