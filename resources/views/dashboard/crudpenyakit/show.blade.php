@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>{{ $disease->name }}</h1>
    <p>{{ $disease->description }}</p>
    <a href="{{ route('diseases.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
