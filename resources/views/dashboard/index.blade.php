@extends('dashboard.layout.mainuser')

@section('containerr')
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
<div class="container mt-4">
    <div class="row">
       
        <div class="col-md-6">
            <div class="card mb-3 card-height">
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

        <div class="col-md-6">
            <div class="card mb-3 card-height">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Riwayat Diagnosis</h5>
                </div>
                <div class="card-body card-body-scroll">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('dashboard.driwayat', $history->id) }}">
                                        {{ $history->created_at->format('d-m-Y H:i') }}
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">Tidak ada riwayat diagnosis</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

      
        @if(auth()->user()->is_admin)
<div class="col-md-12 mt-4">
    <div class="card mb-3 card-height">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Pengguna</h5>
        </div>
        <div class="card-body card-body-scroll">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                        <td>
                            <form action="{{ route('account.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">Tidak ada pengguna yang tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

    </div>
</div>

@endsection
