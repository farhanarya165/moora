@extends('layouts.app')

@section('title', 'Detail Perhitungan MOORA')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Perhitungan: {{ $hasil->nama_perhitungan }}</h1>
    <div>
        <a href="{{ route('user.perhitungan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('user.perhitungan.cetak', $hasil->id) }}" target="_blank" class="btn btn-success">
            <i class="fas fa-print"></i> Cetak
        </a>
    </div>
</div>

<div class="alert alert-info">
    <i class="fas fa-info-circle"></i> Perhitungan dilakukan pada: {{ $hasil->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
</div>

<!-- Matriks Keputusan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">1. Matriks Keputusan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @php
                            $matriksKeputusan = $hasil->data_perhitungan['matriks_keputusan'] ?? [];
                            $kriteriaIds = !empty($matriksKeputusan) ? array_keys(reset($matriksKeputusan)) : [];
                        @endphp
                        @foreach ($kriteriaIds as $kriteriaId)
                            @php
                                $kriteria = \App\Models\Kriteria::find($kriteriaId);
                            @endphp
                            <th>{{ $kriteria ? $kriteria->kode : 'Kriteria #'.$kriteriaId }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriksKeputusan as $alternatifId => $nilai)
                        @php
                            $alternatif = \App\Models\Alternatif::find($alternatifId);
                        @endphp
                        <tr>
                            <td>{{ $alternatif ? $alternatif->kode : 'A'.($loop->iteration) }}</td>
                            @foreach ($nilai as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Matriks Normalisasi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">2. Matriks Normalisasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @php
                            $matriksNormalisasi = $hasil->data_perhitungan['matriks_normalisasi'] ?? [];
                            $kriteriaIds = !empty($matriksNormalisasi) ? array_keys(reset($matriksNormalisasi)) : [];
                        @endphp
                        @foreach ($kriteriaIds as $kriteriaId)
                            @php
                                $kriteria = \App\Models\Kriteria::find($kriteriaId);
                            @endphp
                            <th>{{ $kriteria ? $kriteria->kode : 'Kriteria #'.$kriteriaId }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($matriksNormalisasi as $alternatifId => $nilai)
                        @php
                            $alternatif = \App\Models\Alternatif::find($alternatifId);
                        @endphp
                        <tr>
                            <td>{{ $alternatif ? $alternatif->kode : 'A'.($loop->iteration) }}</td>
                            @foreach ($nilai as $value)
                                <td>{{ number_format($value, 5) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Nilai Optimasi -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">3. Nilai Optimasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai Optimasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Ambil data dari hasil perangkingan yang sudah terurut
                        $hasilPerhitungan = collect($hasil->hasil_perangkingan)->sortBy('kode');
                    @endphp
                    @foreach ($hasilPerhitungan as $alternatif)
                        <tr>
                            <td>{{ $alternatif['kode'] }} - {{ $alternatif['nama'] }}</td>
                            <td>{{ number_format($alternatif['nilai_optimasi'], 5) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Hasil Perangkingan -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Perangkingan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Kode</th>
                        <th>Nama Alternatif</th>
                        <th>Nilai Optimasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil->hasil_perangkingan as $alternatif)
                    <tr class="{{ $alternatif['rank'] === 1 ? 'table-success' : '' }}">
                        <td>{{ $alternatif['rank'] }}</td>
                        <td>{{ $alternatif['kode'] }}</td>
                        <td>{{ $alternatif['nama'] }}</td>
                        <td>{{ number_format($alternatif['nilai_optimasi'], 5) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kesimpulan</h6>
    </div>
    <div class="card-body">
        @if (count($hasil->hasil_perangkingan) > 0)
            @php
                $terbaik = collect($hasil->hasil_perangkingan)->where('rank', 1)->first();
            @endphp
            @if($terbaik)
                <p>Berdasarkan perhitungan menggunakan metode MOORA, alternatif terbaik adalah <strong>{{ $terbaik['kode'] }} - {{ $terbaik['nama'] }}</strong> dengan nilai optimasi sebesar <strong>{{ number_format($terbaik['nilai_optimasi'], 5) }}</strong>.</p>
                
                <p>Sehingga, karyawan terbaik parking area PT. Centrepark Citra Corpora adalah <strong>{{ $terbaik['nama'] }}</strong>.</p>
            @else
                <p>Data perangkingan tidak valid.</p>
            @endif
        @else
            <p>Tidak ada data hasil perangkingan yang tersedia.</p>
        @endif
    </div>
</div>
@endsection