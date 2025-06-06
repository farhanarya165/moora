@extends('layouts.app')

@section('title', 'Manajemen Penilaian')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Penilaian</h1>
    <a href="{{ route('admin.penilaian.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Penilaian
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Penilaian Alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->kode }}</th>
                        @endforeach
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternatif->kode }}</td>
                        <td>{{ $alternatif->nama }}</td>
                        @foreach ($kriterias as $kriteria)
                            <td>
                                @php
                                    $penilaian = $alternatif->penilaians->where('kriteria_id', $kriteria->id)->first();
                                @endphp
                                {{ $penilaian ? $penilaian->nilai : '-' }}
                            </td>
                        @endforeach
                        <td>
                            <a href="{{ route('admin.penilaian.edit', $alternatif->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.penilaian.destroy', $alternatif->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus semua penilaian untuk alternatif ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection