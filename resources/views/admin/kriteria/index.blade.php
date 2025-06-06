@extends('layouts.app')

@section('title', 'Manajemen Kriteria')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Kriteria</h1>
    <a href="{{ route('admin.kriteria.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Kriteria
    </a>
</div>

<!-- Bulk Delete Alert -->
<div id="bulkAlert" class="alert alert-danger d-none mb-3">
    <div class="row align-items-center">
        <div class="col">
            <i class="fas fa-trash me-2"></i>
            <strong><span id="countText">0 item dipilih</span></strong>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-sm btn-outline-light me-2" onclick="batalPilih()">
                <i class="fas fa-times"></i> Batal
            </button>
            <button type="button" class="btn btn-sm btn-light text-danger fw-bold" onclick="hapusTerpilih()">
                <i class="fas fa-trash"></i> Hapus Terpilih
            </button>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50">
                            <input type="checkbox" id="pilihSemua" onchange="toggleSemua()"> 
                            <small>Semua</small>
                        </th>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria)
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" class="pilih-item" value="{{ $kriteria->id }}" onchange="cekPilihan()">
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kriteria->kode }}</td>
                        <td>{{ $kriteria->nama }}</td>
                        <td>{{ $kriteria->bobot }}</td>
                        <td>
                            @if ($kriteria->jenis == 'benefit')
                                <span class="badge bg-success text-white">Benefit</span>
                            @else
                                <span class="badge bg-danger text-white">Cost</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="btn btn-sm btn-warning me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.kriteria.destroy', $kriteria->id) }}" method="POST" class="d-inline">
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

<!-- Form tersembunyi untuk bulk delete -->
<form id="formBulkDelete" action="{{ route('admin.kriteria.bulk-delete') }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="ids" id="idsYangDipilih">
</form>
@endsection

@section('scripts')
<script>
// Inisialisasi DataTable
$(document).ready(function() {
    $('#dataTable').DataTable();
});

// Fungsi toggle semua checkbox
function toggleSemua() {
    const pilihSemua = document.getElementById('pilihSemua');
    const checkboxes = document.querySelectorAll('.pilih-item');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = pilihSemua.checked;
    });
    
    cekPilihan();
}

// Fungsi cek berapa item yang dipilih
function cekPilihan() {
    const terpilih = document.querySelectorAll('.pilih-item:checked');
    const jumlah = terpilih.length;
    const alert = document.getElementById('bulkAlert');
    const countText = document.getElementById('countText');
    
    if (jumlah > 0) {
        alert.classList.remove('d-none');
        countText.textContent = jumlah + ' item dipilih';
    } else {
        alert.classList.add('d-none');
    }
    
    // Update status checkbox "Semua"
    const semua = document.querySelectorAll('.pilih-item');
    const pilihSemua = document.getElementById('pilihSemua');
    
    if (jumlah === 0) {
        pilihSemua.checked = false;
        pilihSemua.indeterminate = false;
    } else if (jumlah === semua.length) {
        pilihSemua.checked = true;
        pilihSemua.indeterminate = false;
    } else {
        pilihSemua.checked = false;
        pilihSemua.indeterminate = true;
    }
}

// Fungsi batal pilih
function batalPilih() {
    document.querySelectorAll('.pilih-item').forEach(function(checkbox) {
        checkbox.checked = false;
    });
    document.getElementById('pilihSemua').checked = false;
    document.getElementById('pilihSemua').indeterminate = false;
    document.getElementById('bulkAlert').classList.add('d-none');
}

// Fungsi hapus terpilih
function hapusTerpilih() {
    const terpilih = document.querySelectorAll('.pilih-item:checked');
    const ids = [];
    
    terpilih.forEach(function(checkbox) {
        ids.push(checkbox.value);
    });
    
    if (ids.length === 0) {
        alert('Pilih minimal satu item untuk dihapus');
        return;
    }
    
    const konfirmasi = confirm('Apakah Anda yakin ingin menghapus ' + ids.length + ' item yang dipilih?\n\nItem: ' + ids.join(', '));
    
    if (konfirmasi) {
        document.getElementById('idsYangDipilih').value = ids.join(',');
        document.getElementById('formBulkDelete').submit();
    }
}
</script>
@endsection