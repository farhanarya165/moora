@extends('layouts.app')

@section('title', 'Perhitungan MOORA Baru')

@section('styles')
<style>
    /* Enhanced form styling */
    .page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        color: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 8px 25px rgba(161, 98, 7, 0.15);
        position: relative;
        overflow: hidden;
    }
    
    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    .page-header-content {
        position: relative;
        z-index: 2;
    }
    
    .page-title {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
    }
    
    .page-subtitle {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 1rem;
        font-weight: 400;
    }
    
    .btn-back {
        background: rgba(255,255,255,0.15);
        color: white;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 10px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
    }
    
    .btn-back:hover {
        background: rgba(255,255,255,0.25);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    /* Form container */
    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.08);
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(0,0,0,0.05);
    }

    /* Enhanced form sections */
    .form-section {
        background: linear-gradient(135deg, #fefbf6 0%, #fef7ed 100%);
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary);
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.1);
    }

    .section-title {
        color: var(--primary);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    /* Enhanced radio buttons */
    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .radio-option {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
    }

    .radio-option:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.1);
    }

    .radio-option.selected {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(161, 98, 7, 0.1) 0%, rgba(255, 126, 62, 0.1) 100%);
        box-shadow: 0 4px 15px rgba(161, 98, 7, 0.2);
    }

    .form-check-input {
        margin-right: 0.75rem;
        transform: scale(1.2);
    }

    .form-check-label {
        font-weight: 600;
        color: var(--text-dark);
        cursor: pointer;
        display: flex;
        align-items: center;
        width: 100%;
    }

    /* Enhanced form controls */
    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(161, 98, 7, 0.25);
        background: white;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    /* Alternative cards styling */
    .alternatif-container {
        margin-top: 2rem;
    }

    .alternatif-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        margin-bottom: 1.5rem;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .alternatif-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .alternatif-header {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: between;
        align-items: center;
        position: relative;
    }

    .alternatif-title {
        font-weight: 700;
        margin: 0;
        flex-grow: 1;
    }

    .remove-btn {
        background: rgba(255,255,255,0.2);
        border: 1px solid rgba(255,255,255,0.3);
        color: white;
        border-radius: 8px;
        padding: 0.5rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .remove-btn:hover {
        background: rgba(255,255,255,0.3);
        color: white;
        transform: scale(1.1);
    }

    .alternatif-body {
        padding: 1.5rem;
    }

    .criteria-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .criteria-field {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 10px;
        padding: 1rem;
        border: 1px solid #e2e8f0;
    }

    .criteria-label {
        font-weight: 600;
        color: var(--primary);
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Enhanced buttons */
    .btn-enhanced {
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-enhanced:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .btn-add {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        margin-bottom: 2rem;
    }

    .btn-add:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: white;
    }

    .btn-submit {
        background: var(--gradient);
        color: white;
        font-size: 1rem;
        padding: 1rem 2rem;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        color: white;
    }

    /* Info alert styling */
    .info-alert {
        background: linear-gradient(135deg, #dbeafe 0%, #e0e7ff 100%);
        border: 1px solid #93c5fd;
        color: #1e40af;
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 2rem;
        border-left: 4px solid #3b82f6;
    }

    .info-alert i {
        color: #3b82f6;
        margin-right: 0.5rem;
    }

    /* Animation for form sections */
    .form-section, .alternatif-card {
        animation: slideInUp 0.6s ease-out both;
    }

    .alternatif-card:nth-child(1) { animation-delay: 0.1s; }
    .alternatif-card:nth-child(2) { animation-delay: 0.2s; }
    .alternatif-card:nth-child(3) { animation-delay: 0.3s; }

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

    /* Responsive design */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
            text-align: center;
        }

        .page-title {
            font-size: 1.5rem;
            flex-direction: column;
        }

        .form-container {
            padding: 1.5rem;
        }

        .criteria-grid {
            grid-template-columns: 1fr;
        }

        .alternatif-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }

        .btn-enhanced {
            width: 100%;
            justify-content: center;
        }
    }

    /* Hide/show animation */
    .form-hidden {
        display: none !important;
    }

    .form-visible {
        display: block !important;
        animation: fadeInDown 0.5s ease-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="d-flex justify-content-between align-items-start flex-wrap">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-calculator me-3"></i>
                    Perhitungan MOORA Baru
                </h1>
                <p class="page-subtitle">Buat perhitungan baru untuk evaluasi karyawan terbaik</p>
            </div>
            <a href="{{ route('user.perhitungan.index') }}" class="btn-back">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>
</div>

<form action="{{ route('user.perhitungan.calculate') }}" method="POST" id="main-form">
    @csrf

    <div class="form-container">
        <!-- Mode Selection -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-cog me-2"></i>Pilih Sumber Data Alternatif
            </h3>
            <div class="radio-group">
                <label class="radio-option" for="mode_lama">
                    <input class="form-check-input" type="radio" name="input_mode" id="mode_lama" value="lama" checked>
                    <div>
                        <strong>Gunakan Data Alternatif yang Sudah Ada</strong>
                        <div class="text-muted small mt-1">Menggunakan data karyawan yang telah tersimpan di sistem</div>
                    </div>
                </label>
                <label class="radio-option" for="mode_baru">
                    <input class="form-check-input" type="radio" name="input_mode" id="mode_baru" value="baru">
                    <div>
                        <strong>Masukkan Data Alternatif Baru</strong>
                        <div class="text-muted small mt-1">Input data karyawan baru untuk perhitungan ini</div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Calculation Name -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-tag me-2"></i>Informasi Perhitungan
            </h3>
            <div class="mb-3">
                <label for="nama_perhitungan" class="form-label">Nama Perhitungan</label>
                <input type="text" 
                       class="form-control @error('nama_perhitungan') is-invalid @enderror" 
                       id="nama_perhitungan" 
                       name="nama_perhitungan" 
                       value="{{ old('nama_perhitungan') }}" 
                       placeholder="Contoh: Evaluasi Karyawan Q1 2025"
                       required>
                @error('nama_perhitungan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small class="text-muted">Masukkan nama yang mendeskripsikan perhitungan ini</small>
            </div>
        </div>

        {{-- FORM INPUT ALTERNATIF BARU --}}
        <div id="form-alternatif-baru" class="form-hidden">
            @php
                $nilaiPilihan = [4 => 'Sangat Baik', 3 => 'Baik', 2 => 'Cukup', 1 => 'Buruk'];
                $kriterias = [
                    'C1' => 'Kedisiplinan',
                    'C2' => 'Kerjasama Tim',
                    'C3' => 'Sikap',
                    'C4' => 'Kehadiran',
                    'C5' => 'Skill',
                    'C6' => 'Loyalitas',
                    'C7' => 'Masa Kerja',
                    'C8' => 'Produktifitas',
                ];
            @endphp

            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-users me-2"></i>Data Alternatif Baru
                </h3>
                
                <div id="alternatif-wrapper" class="alternatif-container">
                    <div class="alternatif-card alternatif" data-index="0">
                        <div class="alternatif-header">
                            <h4 class="alternatif-title">Alternatif 1</h4>
                        </div>
                        <div class="alternatif-body">
                            <div class="mb-4">
                                <label for="alternatif_0_nama" class="form-label">
                                    <i class="fas fa-user me-1"></i>Nama Karyawan
                                </label>
                                <input type="text" 
                                       name="alternatifs[0][nama]" 
                                       id="alternatif_0_nama" 
                                       class="form-control"
                                       placeholder="Masukkan nama karyawan">
                            </div>

                            <h5 class="mb-3 text-primary">
                                <i class="fas fa-clipboard-list me-2"></i>Penilaian Kriteria
                            </h5>
                            <div class="criteria-grid">
                                @foreach($kriterias as $kode => $nama)
                                    <div class="criteria-field">
                                        <label for="alternatif_0_{{ $kode }}" class="criteria-label">
                                            {{ $kode }} - {{ $nama }}
                                        </label>
                                        @if($kode === 'C7')
                                            <input type="number" 
                                                   name="alternatifs[0][nilai][{{ $kode }}]" 
                                                   id="alternatif_0_{{ $kode }}" 
                                                   class="form-control" 
                                                   placeholder="Masukkan tahun"
                                                   min="1">
                                        @else
                                            <select name="alternatifs[0][nilai][{{ $kode }}]" 
                                                    id="alternatif_0_{{ $kode }}" 
                                                    class="form-select">
                                                <option value="">-- Pilih Nilai --</option>
                                                @foreach($nilaiPilihan as $val => $label)
                                                    <option value="{{ $val }}">{{ $val }} - {{ $label }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn-enhanced btn-add" id="add-alternatif">
                    <i class="fas fa-plus"></i>
                    Tambah Alternatif
                </button>
            </div>
        </div>

        <!-- Info Alert -->
        <div class="info-alert">
            <i class="fas fa-info-circle"></i>
            <strong>Informasi:</strong> Sistem akan menghitung perangkingan karyawan terbaik menggunakan metode MOORA berdasarkan data penilaian yang tersedia atau yang baru Anda masukkan.
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn-enhanced btn-submit">
                <i class="fas fa-calculator"></i>
                Mulai Perhitungan
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formBaru = document.getElementById('form-alternatif-baru');
    const addButton = document.getElementById('add-alternatif');
    const alternatifWrapper = document.getElementById('alternatif-wrapper');
    const mainForm = document.getElementById('main-form');
    const radioOptions = document.querySelectorAll('.radio-option');
    
    let alternatifCount = 1;

    // Kriteria data
    const kriterias = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8'];
    const kriteriaNama = {
        'C1': 'Kedisiplinan',
        'C2': 'Kerjasama Tim', 
        'C3': 'Sikap',
        'C4': 'Kehadiran',
        'C5': 'Skill',
        'C6': 'Loyalitas',
        'C7': 'Masa Kerja',
        'C8': 'Produktifitas'
    };
    const nilaiPilihan = {4: 'Sangat Baik', 3: 'Baik', 2: 'Cukup', 1: 'Buruk'};

    // Enhanced radio option handling
    radioOptions.forEach(option => {
        const radioInput = option.querySelector('input[type="radio"]');
        
        option.addEventListener('click', function() {
            // Remove selected class from all options
            radioOptions.forEach(opt => opt.classList.remove('selected'));
            // Add selected class to clicked option
            this.classList.add('selected');
            // Check the radio input
            radioInput.checked = true;
            
            // Trigger change event
            toggleFormVisibility(radioInput.value);
        });
        
        // Initialize selected state
        if (radioInput.checked) {
            option.classList.add('selected');
        }
    });

    // Function to toggle required attributes
    function toggleRequiredAttributes(mode) {
        const alternatifInputs = document.querySelectorAll('#form-alternatif-baru input, #form-alternatif-baru select');
        
        alternatifInputs.forEach(input => {
            if (mode === 'baru') {
                input.required = true;
            } else {
                input.required = false;
            }
        });
    }

    // Function to toggle form visibility with animation
    function toggleFormVisibility(mode) {
        if (mode === 'baru') {
            formBaru.classList.remove('form-hidden');
            formBaru.classList.add('form-visible');
            toggleRequiredAttributes('baru');
        } else {
            formBaru.classList.add('form-hidden');
            formBaru.classList.remove('form-visible');
            toggleRequiredAttributes('lama');
        }
    }

    // Initialize required attributes based on current selection
    const currentMode = document.querySelector('input[name="input_mode"]:checked').value;
    toggleRequiredAttributes(currentMode);

    // Add new alternatif
    addButton.addEventListener('click', function () {
        const newIndex = alternatifCount;
        
        // Create container div
        const newAlternatif = document.createElement('div');
        newAlternatif.className = 'alternatif-card alternatif';
        newAlternatif.setAttribute('data-index', newIndex);

        // Create header
        const header = document.createElement('div');
        header.className = 'alternatif-header';
        header.innerHTML = `
            <h4 class="alternatif-title">Alternatif ${newIndex + 1}</h4>
            <button type="button" class="remove-btn remove-alternatif" title="Hapus Alternatif">
                <i class="fas fa-times"></i>
            </button>
        `;

        // Create body
        const body = document.createElement('div');
        body.className = 'alternatif-body';

        // Add nama karyawan field
        const namaDiv = document.createElement('div');
        namaDiv.className = 'mb-4';
        namaDiv.innerHTML = `
            <label for="alternatif_${newIndex}_nama" class="form-label">
                <i class="fas fa-user me-1"></i>Nama Karyawan
            </label>
            <input type="text" 
                   name="alternatifs[${newIndex}][nama]" 
                   id="alternatif_${newIndex}_nama" 
                   class="form-control"
                   placeholder="Masukkan nama karyawan">
        `;

        // Create criteria section
        const criteriaTitle = document.createElement('h5');
        criteriaTitle.className = 'mb-3 text-primary';
        criteriaTitle.innerHTML = '<i class="fas fa-clipboard-list me-2"></i>Penilaian Kriteria';

        const criteriaGrid = document.createElement('div');
        criteriaGrid.className = 'criteria-grid';

        // Add criteria fields
        kriterias.forEach(kode => {
            const criteriaField = document.createElement('div');
            criteriaField.className = 'criteria-field';
            
            const label = document.createElement('label');
            label.setAttribute('for', `alternatif_${newIndex}_${kode}`);
            label.className = 'criteria-label';
            label.textContent = `${kode} - ${kriteriaNama[kode]}`;
            
            let input;
            if (kode === 'C7') {
                input = document.createElement('input');
                input.type = 'number';
                input.name = `alternatifs[${newIndex}][nilai][${kode}]`;
                input.id = `alternatif_${newIndex}_${kode}`;
                input.className = 'form-control';
                input.placeholder = 'Masukkan tahun';
                input.min = '1';
            } else {
                input = document.createElement('select');
                input.name = `alternatifs[${newIndex}][nilai][${kode}]`;
                input.id = `alternatif_${newIndex}_${kode}`;
                input.className = 'form-select';
                
                // Add default option
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = '-- Pilih Nilai --';
                input.appendChild(defaultOption);
                
                // Add value options
                Object.entries(nilaiPilihan).forEach(([val, label]) => {
                    const option = document.createElement('option');
                    option.value = val;
                    option.textContent = `${val} - ${label}`;
                    input.appendChild(option);
                });
            }
            
            // Set required based on current mode
            const currentMode = document.querySelector('input[name="input_mode"]:checked').value;
            input.required = (currentMode === 'baru');
            
            criteriaField.appendChild(label);
            criteriaField.appendChild(input);
            criteriaGrid.appendChild(criteriaField);
        });

        // Assemble the elements
        body.appendChild(namaDiv);
        body.appendChild(criteriaTitle);
        body.appendChild(criteriaGrid);
        newAlternatif.appendChild(header);
        newAlternatif.appendChild(body);
        
        // Add to wrapper with animation
        alternatifWrapper.appendChild(newAlternatif);
        
        // Trigger animation
        setTimeout(() => {
            newAlternatif.style.animation = 'slideInUp 0.6s ease-out both';
        }, 50);
        
        alternatifCount++;
    });

    // Handle remove alternatif
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-alternatif') || e.target.closest('.remove-alternatif')) {
            const alternatifs = document.querySelectorAll('.alternatif');
            if (alternatifs.length > 1) {
                const alternatif = e.target.closest('.alternatif');
                
                // Add fade out animation
                alternatif.style.animation = 'fadeOut 0.3s ease-out forwards';
                
                setTimeout(() => {
                    alternatif.remove();
                    updateAlternatifNumbers();
                }, 300);
            } else {
                alert('Minimal harus ada 1 alternatif!');
            }
        }
    });

    // Function to update alternatif numbers
    function updateAlternatifNumbers() {
        const alternatifs = document.querySelectorAll('.alternatif');
        alternatifs.forEach((alternatif, index) => {
            const header = alternatif.querySelector('.alternatif-title');
            if (header) {
                header.textContent = `Alternatif ${index + 1}`;
            }
        });
    }

    // Enhanced form validation before submit
    mainForm.addEventListener('submit', function(e) {
        const inputMode = document.querySelector('input[name="input_mode"]:checked').value;
        const namaPerhitungan = document.querySelector('#nama_perhitungan').value.trim();
        
        // Check nama perhitungan
        if (!namaPerhitungan) {
            e.preventDefault();
            alert('Nama perhitungan harus diisi!');
            document.querySelector('#nama_perhitungan').focus();
            return false;
        }
        
        // If using new alternatives, validate them
        if (inputMode === 'baru') {
            const alternatifs = document.querySelectorAll('.alternatif');
            let isValid = true;
            let firstInvalidElement = null;
            
            if (alternatifs.length === 0) {
                e.preventDefault();
                alert('Minimal harus ada 1 alternatif!');
                return false;
            }
            
            alternatifs.forEach((alternatif, index) => {
                // Check nama karyawan
                const namaInput = alternatif.querySelector('input[type="text"]');
                if (!namaInput || !namaInput.value.trim()) {
                    isValid = false;
                    if (!firstInvalidElement) firstInvalidElement = namaInput;
                }
                
                // Check all criteria values
                const selects = alternatif.querySelectorAll('select');
                const numberInputs = alternatif.querySelectorAll('input[type="number"]');
                
                selects.forEach(select => {
                    if (!select.value) {
                        isValid = false;
                        if (!firstInvalidElement) firstInvalidElement = select;
                    }
                });
                
                numberInputs.forEach(input => {
                    if (!input.value || input.value <= 0) {
                        isValid = false;
                        if (!firstInvalidElement) firstInvalidElement = input;
                    }
                });
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Semua field pada alternatif harus diisi dengan lengkap!');
                if (firstInvalidElement) {
                    firstInvalidElement.focus();
                    firstInvalidElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
                return false;
            }
        }
        
        return true;
    });

    // Add fade out animation for remove
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection