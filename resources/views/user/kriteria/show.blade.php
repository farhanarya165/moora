@extends('layouts.app')

@section('title', 'Detail Kriteria')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Kriteria: {{ $kriteria->kode }} - {{ $kriteria->nama }}</h1>
    <a href="{{ route('user.kriteria.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Kriteria</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Kode</th>
                            <td>{{ $kriteria->kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $kriteria->nama }}</td>
                        </tr>
                        <tr>
                            <th>Bobot</th>
                            <td>{{ $kriteria->bobot }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>
                                @if ($kriteria->jenis == 'benefit')
                                <span class="badge bg-success text-white">Benefit</span>
                                @else
                                <span class="badge bg-danger text-white">Cost</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
            </div>
            <div class="card-body">
                <p>
                    <strong>Jenis Kriteria:</strong><br>
                    @if ($kriteria->jenis == 'benefit')
                    <strong>Benefit</strong>: Kriteria yang nilainya semakin tinggi semakin baik
                    @else
                    <strong>Cost</strong>: Kriteria yang nilainya semakin rendah semakin baik
                    @endif
                </p>

                <p>
                    <strong>Bobot:</strong><br>
                    Bobot {{ $kriteria->bobot }} menandakan tingkat kepentingan kriteria ini relatif terhadap kriteria lainnya.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sub Kriteria</h6>
    </div>
    <div class="card-body">
        @if ($kriteria->subKriterias->count() > 0)
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria->subKriterias as $subKriteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subKriteria->keterangan }}</td>
                        <td>{{ $subKriteria->nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            Tidak ada data sub kriteria untuk kriteria ini.
        </div>
        @endif
    </div>
</div>
@endsection