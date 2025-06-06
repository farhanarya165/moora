@extends('layouts.app')

@section('title', 'Manajemen Sub Kriteria')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Sub Kriteria</h1>
    <a href="{{ route('admin.subkriteria.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Sub Kriteria
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Sub Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subKriterias as $subKriteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subKriteria->kriteria->kode }} - {{ $subKriteria->kriteria->nama }}</td>
                        <td>{{ $subKriteria->keterangan }}</td>
                        <td>{{ $subKriteria->nilai }}</td>
                        <td>
                            <a href="{{ route('admin.subkriteria.edit', $subKriteria->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.subkriteria.destroy', $subKriteria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
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