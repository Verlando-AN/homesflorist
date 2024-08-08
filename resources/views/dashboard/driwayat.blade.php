@extends('dashboard.layout.mainuser')

@section('containerr')

<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Detail Riwayat Diagnosis</h5>
        </div>
        <div class="card-body">
            <h6>Tanggal: {{ $history->created_at->format('d-m-Y H:i') }}</h6>
            <p>Detail Diagnosis: {{ $history->details }}</p>
            
            <div class="container mt-4">
                <h1 class="text-center mb-4">Hasil Diagnosa</h1>
              
                <div class="card">
                  <div class="card-body">
                    <ul class="list-group">
                      @php
                        $maxConfidence = 0;
                        $mostLikelyDisease = null;
                      @endphp
              
                      @foreach($results as $result)
                        @php
                          $percentage = $result['cf'];
                          if ($percentage > $maxConfidence) {
                              $maxConfidence = $percentage;
                              $mostLikelyDisease = $result['disease']->name;
                          }
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          {{ $result['disease']->name }}
                          <span class="badge bg-primary rounded-pill">{{ $percentage }}%</span>
                        </li>
                      @endforeach
                    </ul>
              
                    @if($mostLikelyDisease)
                      <div class="alert alert-info text-center mt-4" role="alert">
                        <h4 class="alert-heading">Kemungkinan Terbesar</h4>
                        <p>{{ $mostLikelyDisease }} ({{ $maxConfidence }}%)</p>
                      </div>
                    @endif
              
                    <div class="text-center mt-3">
                      <a href="{{ url('index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                  </div>
                </div>
              
            </div>
            
        </div>
    </div>
</div>

@endsection
