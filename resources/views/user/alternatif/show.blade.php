@extends('layouts.app')

@section('title', 'Detail Alternatif')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Alternatif: {{ $alternatif->kode }} - {{ $alternatif->nama }}</h1>
    <a href="{{ route('user.alternatif.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Alternatif</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width: 30%">Kode</th>
                            <td>{{ $alternatif->kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $alternatif->nama }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kriteria->kode }}</td>
                        <td>{{ $kriteria->nama }}</td>
                        <td>
                            @php
                                $penilaian = $alternatif->penilaians->where('kriteria_id', $kriteria->id)->first();
                                $nilai = $penilaian ? $penilaian->nilai : '-';
                                
                                // Jika kriteria memiliki sub kriteria, tampilkan keterangan
                                if ($nilai != '-' && $kriteria->subKriterias->count() > 0) {
                                    $subKriteria = $kriteria->subKriterias->where('nilai', $nilai)->first();
                                    if ($subKriteria) {
                                        $nilai = $nilai . ' (' . $subKriteria->keterangan . ')';
                                    }
                                }
                            @endphp
                            {{ $nilai }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection