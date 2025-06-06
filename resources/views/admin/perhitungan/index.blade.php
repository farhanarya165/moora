@extends('layouts.app')

@section('title', 'Perhitungan MOORA')

@section('styles')
<style>
    .header-section {
        background: var(--gradient);
        color: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .header-content h1 {
        margin: 0 0 5px 0;
        font-size: 1.75rem;
        font-weight: 600;
    }
    
    .header-content p {
        margin: 0;
        opacity: 0.9;
        font-size: 0.95rem;
    }
    
    .header-button {
        background: rgba(255,255,255,0.2);
        border: 1px solid rgba(255,255,255,0.3);
        color: white;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .header-button:hover {
        background: rgba(255,255,255,0.3);
        color: white;
        transform: translateY(-1px);
    }
    
    .stats-box {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border-left: 4px solid var(--orange);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        text-align: center;
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--orange);
        margin: 0;
        line-height: 1;
    }
    
    .stat-text {
        color: #666;
        font-weight: 500;
        margin: 8px 0 0 0;
        font-size: 0.9rem;
    }
    
    .section-title {
        margin: 0 0 15px 0;
        font-size: 1.2rem;
        font-weight: 600;
        color: #495057;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    
    .main-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    
    .card-title {
        background: #f8f9fa;
        border-bottom: 2px solid var(--orange);
        padding: 15px 20px;
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #495057;
    }
    
    .data-table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
        background: white;
    }
    
    .data-table thead th {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        padding: 15px 20px;
        font-weight: 600;
        color: #495057;
        font-size: 0.9rem;
        text-align: center;
        vertical-align: middle;
    }
    
    .data-table tbody td {
        padding: 15px 20px;
        border: 1px solid #e9ecef;
        vertical-align: middle;
        text-align: center;
        background: white;
    }
    
    .data-table tbody tr {
        transition: background-color 0.2s ease;
    }
    
    .data-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .data-table tbody tr:hover td {
        background: #f8f9fa;
    }
    
    .row-number {
        background: var(--orange);
        color: white;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .calc-name {
        font-weight: 600;
        color: #495057;
        margin-bottom: 5px;
        text-align: left;
        font-size: 1rem;
    }
    
    .user-tag {
        background: #e9ecef;
        color: #666;
        padding: 3px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        display: inline-block;
        margin-top: 3px;
    }
    
    .date-badge {
        background: #e8f5e8;
        color: #2d5a2d;
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }
    
    .action-group {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
    }
    
    .action-btn {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 500;
        border: none;
        text-decoration: none;
        display: inline-block;
        min-width: 85px;
        text-align: center;
        transition: all 0.2s ease;
    }
    
    .btn-view {
        background: #17a2b8;
        color: white;
    }
    
    .btn-view:hover {
        background: #138496;
        color: white;
        text-decoration: none;
    }
    
    .btn-remove {
        background: #dc3545;
        color: white;
    }
    
    .btn-remove:hover {
        background: #c82333;
        color: white;
    }
    
    .empty-state {
        text-align: center;
        padding: 50px 30px;
        color: #999;
    }
    
    .empty-state .icon {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #ddd;
    }
    
    .empty-state h5 {
        color: #666;
        margin-bottom: 10px;
    }
    
    .empty-state p {
        margin-bottom: 20px;
    }
    
    .modal-form .modal-content {
        border: none;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    .modal-form .modal-header {
        background: var(--gradient);
        color: white;
        border: none;
        border-radius: 10px 10px 0 0;
        padding: 20px 25px;
    }
    
    .modal-form .modal-title {
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0;
    }
    
    .modal-form .modal-body {
        padding: 25px;
    }
    
    .modal-form .modal-footer {
        border: none;
        padding: 15px 25px;
        background: #f8f9fa;
        border-radius: 0 0 10px 10px;
    }
    
    .input-field {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 10px 15px;
        font-size: 1rem;
        width: 100%;
        transition: border-color 0.2s ease;
    }
    
    .input-field:focus {
        border-color: var(--orange);
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(255, 126, 62, 0.15);
    }
    
    .btn-primary-custom {
        background: var(--orange);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .btn-primary-custom:hover {
        background: #e86a2c;
        color: white;
    }
    
    .btn-secondary-custom {
        background: #6c757d;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        color: white;
        font-weight: 500;
    }
    
    .info-notice {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        color: #495057;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    
    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .header-button {
            width: 100%;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .section-title {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .data-table thead th,
        .data-table tbody td {
            padding: 10px 8px;
            font-size: 0.85rem;
        }
        
        .action-group {
            flex-direction: column;
            gap: 5px;
        }
        
        .action-btn {
            width: 100%;
            min-width: auto;
        }
        
        .calc-name {
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<!-- Header Section -->
<div class="header-section">
    <div class="header-content">
        <h1><i class="fas fa-calculator me-2"></i>Perhitungan MOORA</h1>
        <p>Sistem Pendukung Keputusan - Multi-Objective Optimization by Ratio Analysis</p>
    </div>
    <button type="button" class="btn header-button d-none d-md-block" data-bs-toggle="modal" data-bs-target="#perhitunganModal">
        <i class="fas fa-plus me-2"></i>Hitung Baru
    </button>
</div>

<!-- Stats Section -->
@if(count($hasilPerhitungans) > 0)
<div class="stats-box">
    <div class="stats-grid">
        <div>
            <h2 class="stat-value">{{ count($hasilPerhitungans) }}</h2>
            <p class="stat-text">Total Perhitungan</p>
        </div>
        <div>
            <h2 class="stat-value">{{ $hasilPerhitungans->last()->created_at->setTimezone('Asia/Jakarta')->format('M Y') }}</h2>
            <p class="stat-text">Perhitungan Terbaru</p>
        </div>
    </div>
</div>
@endif

<!-- Section Title with Button -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Perhitungan</h5>
    <button type="button" class="btn btn-primary-custom d-md-none" data-bs-toggle="modal" data-bs-target="#perhitunganModal">
        <i class="fas fa-plus me-2"></i>Hitung Baru
    </button>
</div>

<!-- Main Content Card -->
<div class="main-card">
    <h6 class="card-title"><i class="fas fa-list me-2"></i>Daftar Perhitungan MOORA</h6>
    
    @if(count($hasilPerhitungans) > 0)
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width: 80px; border-right: 1px solid #dee2e6;">No</th>
                        <th style="border-right: 1px solid #dee2e6;">Nama Perhitungan</th>
                        <th style="width: 180px; border-right: 1px solid #dee2e6;">Tanggal</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Urutkan data dari yang lama ke yang baru (ascending) dengan indeks baru
                        $sortedHasilPerhitungans = $hasilPerhitungans->sortBy('created_at')->values();
                    @endphp
                    @foreach ($sortedHasilPerhitungans as $index => $hasil)
                    <tr>
                        <td style="border-right: 1px solid #dee2e6;">
                            <span class="row-number">{{ $index + 1 }}</span>
                        </td>
                        <td style="border-right: 1px solid #dee2e6; text-align: left;">
                            <div class="calc-name">{{ $hasil->nama_perhitungan }}</div>
                            <span class="user-tag">
                                <i class="fas fa-user me-1"></i>{{ $hasil->user->name ?? 'System' }}
                            </span>
                        </td>
                        <td style="border-right: 1px solid #dee2e6;">
                            <span class="date-badge">
                                {{ $hasil->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') }} WIB
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.perhitungan.show', $hasil->id) }}" 
                                   class="action-btn btn-view"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye me-1"></i>Detail
                                </a>
                                <form action="{{ route('admin.perhitungan.destroy', $hasil->id) }}" 
                                      method="POST" 
                                      style="display: inline;"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus hasil perhitungan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="action-btn btn-remove" 
                                            title="Hapus">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-calculator icon"></i>
            <h5>Belum Ada Perhitungan</h5>
            <p>Anda belum melakukan perhitungan MOORA. Klik tombol "Hitung Baru" untuk memulai.</p>
            <button type="button" class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#perhitunganModal">
                <i class="fas fa-plus me-2"></i>Mulai Perhitungan
            </button>
        </div>
    @endif
</div>

<!-- Modal Perhitungan Baru -->
<div class="modal fade modal-form" id="perhitunganModal" tabindex="-1" aria-labelledby="perhitunganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perhitunganModalLabel">
                    <i class="fas fa-calculator me-2"></i>Perhitungan MOORA Baru
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.perhitungan.calculate') }}" method="POST" id="formPerhitungan">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_perhitungan" class="form-label fw-bold">
                            <i class="fas fa-tag me-2"></i>Nama Perhitungan
                        </label>
                        <input type="text" 
                               class="input-field" 
                               id="nama_perhitungan" 
                               name="nama_perhitungan" 
                               placeholder="Contoh: Evaluasi Karyawan Q2 2025"
                               required>
                        <div class="form-text mt-2">
                            Berikan nama yang mendeskripsikan perhitungan ini untuk memudahkan identifikasi
                        </div>
                    </div>
                    
                    <div class="info-notice">
                        <i class="fas fa-info-circle text-info"></i>
                        <div>
                            <strong>Informasi:</strong>
                            <p class="mb-0 mt-1">Sistem akan menggunakan data kriteria dan alternatif yang sudah tersimpan untuk melakukan perhitungan MOORA.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary-custom" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary-custom" id="btnHitung">
                        <i class="fas fa-calculator me-2"></i>Mulai Hitung
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Form submission with loading state
    $('#formPerhitungan').on('submit', function() {
        const btn = $('#btnHitung');
        const originalText = btn.html();
        
        btn.html('<i class="fas fa-spinner fa-spin me-2"></i>Menghitung...');
        btn.prop('disabled', true);
        
        // Reset button after 10 seconds (fallback)
        setTimeout(function() {
            btn.html(originalText);
            btn.prop('disabled', false);
        }, 10000);
    });
    
    // Auto focus on modal open
    $('#perhitunganModal').on('shown.bs.modal', function() {
        $('#nama_perhitungan').focus();
    });
});
</script>
@endsection