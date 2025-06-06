@extends('layouts.app')

@section('title', 'Daftar Alternatif')

@section('styles')
<style>
    /* Enhanced page header */
    .page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 20px;
        color: white;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(161, 98, 7, 0.2);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .page-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .page-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        margin-top: 0.5rem;
        position: relative;
        z-index: 2;
    }

    /* Enhanced content cards */
    .content-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
        animation: slideInUp 0.6s ease-out both;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .content-card:nth-child(2) {
        animation-delay: 0.1s;
    }

    .content-card:nth-child(3) {
        animation-delay: 0.2s;
    }

    .content-card:nth-child(4) {
        animation-delay: 0.3s;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .content-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        padding: 1.5rem 2rem;
        border-bottom: 2px solid #e2e8f0;
        position: relative;
    }

    .content-card-header::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 2rem;
        right: 2rem;
        height: 2px;
        background: var(--gradient);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .content-card:hover .content-card-header::before {
        transform: scaleX(1);
    }

    .content-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-card-body {
        padding: 2rem;
    }

    /* Enhanced table */
    .enhanced-table {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        margin-bottom: 0;
    }

    .enhanced-table thead th {
        background: linear-gradient(135deg, var(--brown-light) 0%, #fef3c7 100%);
        font-weight: 600;
        color: var(--text-dark);
        padding: 1rem 1.25rem;
        border: none;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
    }

    .enhanced-table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--gradient);
        opacity: 0.3;
    }

    .enhanced-table tbody td {
        padding: 1rem 1.25rem;
        border-color: #f1f5f9;
        vertical-align: middle;
        transition: all 0.2s ease;
    }

    .enhanced-table tbody tr {
        transition: all 0.2s ease;
    }

    .enhanced-table tbody tr:hover {
        background: linear-gradient(135deg, #fefbf6 0%, #fef7ed 100%);
        transform: scale(1.005);
    }

    .enhanced-table tbody tr:hover td {
        color: var(--primary);
        font-weight: 500;
    }

    /* Enhanced buttons */
    .btn-enhanced {
        border-radius: 12px;
        padding: 0.5rem 1rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
        font-size: 0.85rem;
    }

    .btn-enhanced:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .btn-enhanced.btn-info {
        background: linear-gradient(135deg, #0ea5e9, #06b6d4);
        color: white;
    }

    .btn-enhanced.btn-info:hover {
        background: linear-gradient(135deg, #0284c7, #0891b2);
        color: white;
    }

    /* Number badges */
    .number-badge {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.85rem;
    }

    /* Kode badges */
    .kode-badge {
        background: linear-gradient(135deg, #059669, #10b981);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Value badges for penilaian */
    .nilai-badge {
        background: linear-gradient(135deg, #f59e0b, #fbbf24);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.8rem;
        min-width: 40px;
        text-align: center;
    }

    .nilai-badge.empty {
        background: linear-gradient(135deg, #64748b, #94a3b8);
    }

    /* Statistics info */
    .stats-info {
        background: linear-gradient(135deg, #fefbf6 0%, #fef7ed 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
    }

    .stat-item {
        text-align: center;
        padding: 1rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.1);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(161, 98, 7, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 0.5rem;
        display: block;
    }

    .stat-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-dark);
        opacity: 0.8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* DataTable customization */
    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        padding: 0.5rem;
        transition: all 0.3s ease;
    }

    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(161, 98, 7, 0.1);
        outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px !important;
        margin: 0 2px !important;
        border: none !important;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9) !important;
        color: var(--text-dark) !important;
        transition: all 0.3s ease !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--gradient) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.2) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--gradient) !important;
        color: white !important;
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.2) !important;
    }

    /* Loading state */
    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        border-radius: 20px;
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }

        .page-title {
            font-size: 1.8rem;
        }

        .content-card-body {
            padding: 1.5rem;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .enhanced-table thead th,
        .enhanced-table tbody td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Enhanced Page Header -->
<div class="page-header">
    <h1 class="page-title">📊 Daftar Alternatif Karyawan</h1>
    <p class="page-subtitle">Kelola data alternatif karyawan untuk penilaian kinerja sistem pendukung keputusan</p>
</div>

<!-- Statistics Info -->
<div class="stats-info">
    <div class="stats-grid">
        <div class="stat-item">
            <span class="stat-number">{{ $alternatifs->count() }}</span>
            <span class="stat-label">Total Alternatif</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $kriterias->count() }}</span>
            <span class="stat-label">Total Kriteria</span>
        </div>
        <div class="stat-item">
            <span class="stat-number">{{ $alternatifs->count() * $kriterias->count() }}</span>
            <span class="stat-label">Total Penilaian</span>
        </div>
    </div>
</div>

<!-- Enhanced Alternatif List Card -->
<div class="content-card">
    <div class="content-card-header">
        <h3 class="content-card-title">
            <i class="fas fa-users"></i>
            Data Alternatif Karyawan
        </h3>
    </div>
    <div class="content-card-body">
        <div class="table-responsive">
            <table class="table enhanced-table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><i class="fas fa-hash me-2"></i>No</th>
                        <th><i class="fas fa-code me-2"></i>Kode</th>
                        <th><i class="fas fa-user me-2"></i>Nama Karyawan</th>
                        <th><i class="fas fa-cogs me-2"></i>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                    <tr>
                        <td>
                            <div class="number-badge">{{ $loop->iteration }}</div>
                        </td>
                        <td>
                            <span class="kode-badge">{{ $alternatif->kode }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <strong>{{ $alternatif->nama }}</strong>
                                    <div class="text-muted small">ID: {{ $alternatif->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('user.alternatif.show', $alternatif->id) }}"
                                class="btn btn-enhanced btn-info btn-sm">
                                <i class="fas fa-eye me-1"></i>Lihat Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Enhanced Penilaian Table Card -->
<div class="content-card">
    <div class="content-card-header">
        <h3 class="content-card-title">
            <i class="fas fa-table"></i>
            Tabel Penilaian Alternatif
        </h3>
    </div>
    <div class="content-card-body">
        <div class="alert alert-info border-0" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-radius: 12px;">
            <div class="d-flex align-items-center">
                <i class="fas fa-info-circle me-2 text-primary"></i>
                <div>
                    <strong>Informasi:</strong> Tabel ini menampilkan nilai penilaian setiap alternatif berdasarkan kriteria yang telah ditentukan.
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table enhanced-table" id="nilaiTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th><i class="fas fa-hash me-2"></i>No</th>
                        <th><i class="fas fa-code me-2"></i>Kode</th>
                        <th><i class="fas fa-user me-2"></i>Nama Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                        <th class="text-center">
                            <div class="d-flex flex-column align-items-center">
                                <strong>{{ $kriteria->kode }}</strong>
                                <small class="text-muted">{{ $kriteria->nama }}</small>
                            </div>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                    <tr>
                        <td>
                            <div class="number-badge">{{ $loop->iteration }}</div>
                        </td>
                        <td>
                            <span class="kode-badge">{{ $alternatif->kode }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 35px; height: 35px;">
                                        <i class="fas fa-user text-white" style="font-size: 0.8rem;"></i>
                                    </div>
                                </div>
                                <div>
                                    <strong>{{ $alternatif->nama }}</strong>
                                </div>
                            </div>
                        </td>
                        @foreach ($kriterias as $kriteria)
                        <td class="text-center">
                            @php
                            $penilaian = $alternatif->penilaians->where('kriteria_id', $kriteria->id)->first();
                            @endphp
                            @if($penilaian)
                            <span class="nilai-badge">{{ $penilaian->nilai }}</span>
                            @else
                            <span class="nilai-badge empty">-</span>
                            @endif
                        </td>
                        @endforeach
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
        // Initialize DataTables with custom configuration
        $('#dataTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Semua"]
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            drawCallback: function() {
                // Add animation to new rows
                $(this.api().table().body()).find('tr').addClass('animate__animated animate__fadeIn');
            }
        });

        $('#nilaiTable').DataTable({
            responsive: true,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "Semua"]
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            scrollX: true,
            drawCallback: function() {
                // Add animation to new rows
                $(this.api().table().body()).find('tr').addClass('animate__animated animate__fadeIn');
            }
        });

        // Add loading state for better UX
        $('.content-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
        });

        // Enhanced hover effects for buttons
        $('.btn-enhanced').hover(
            function() {
                $(this).addClass('animate__animated animate__pulse');
            },
            function() {
                $(this).removeClass('animate__animated animate__pulse');
            }
        );

        // Add tooltips to action buttons
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endsection