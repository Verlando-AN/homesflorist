@extends('dashboard.layout.mainuser')

@section('containerr')

<h1 class="titlee">Pilih Gejala</h1>
<form action="{{ route('diagnose') }}" method="POST" class="diagnosis-form">
    @csrf
    <div class="symptoms-list">
        @foreach($symptoms as $symptom)
            <div class="symptom-item">
                <input type="checkbox" name="symptoms[]" value="{{ $symptom->code }}" id="symptom-{{ $symptom->code }}">
                <label for="symptom-{{ $symptom->code }}">{{ $symptom->name }}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="diagnose-button">Diagnosa</button>
</form>

<style>


    .titlee {
        font-size: 28px;
        font-weight: bold;
        color: #4a90e2;
        text-align: center;
        margin-bottom: 20px;
    }

    .diagnosis-form {
        max-width: 85%;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .symptoms-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .symptom-item {
        display: flex;
        align-items: center;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    label {
        font-size: 16px;
    }

    .diagnose-button {
        background-color: #4a90e2;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-top: 20px;
    }

    .diagnose-button:hover {
        background-color: #357abd;
    }
</style>

@endsection
