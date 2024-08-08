@extends('dashboard.layout.mainuser')

@section('containerr')
<div class="container mt-4">
    <h1>{{ $symptoms->name }}</h1>
    <p>{{ $symptoms->description }}</p>
    <a href="{{ route('symptoms.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
