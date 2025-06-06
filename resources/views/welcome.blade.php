@extends('layouts.app')

@section('title', 'Welcome to SPK Karyawan Terbaik')

@section('styles')
<style>
/* Enhanced Color Variables - Matching App.blade Color Scheme */
:root {
    --primary: #a16207;
    --secondary: #ca8a04;
    --orange: #ff7e3e;
    --light-primary: #fef3c7;
    --light-secondary: #fffbeb;
    --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    --accent: #059669;
    --soft-bg: #fefefe;
    --text-dark: #1c1917;
    --text-light: #78716c;
    --emerald: #10b981;
    --amber: #f59e0b;
    --brown-light: #fef7ed;
    --brown-medium: #fed7aa;
    --red-soft: #ef4444;
    --warm-gray: #f5f5f4;
    
    /* Welcome page specific gradients using brown theme */
    --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    --gradient-soft: linear-gradient(135deg, var(--light-primary) 0%, var(--brown-light) 100%);
    --shadow-primary: 0 20px 40px rgba(161, 98, 7, 0.15);
    --shadow-secondary: 0 10px 30px rgba(202, 138, 4, 0.15);
}

/* Enhanced Welcome Container */
.welcome-container {
    background: linear-gradient(135deg, 
        var(--warm-gray) 0%, 
        #f3f2f0 25%,
        var(--brown-light) 50%,
        #fef3c7 75%,
        var(--light-primary) 100%);
    position: relative;
    overflow: hidden;
    min-height: 100vh;
    padding: 2rem 0;
}

.welcome-container::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="3" fill="rgba(161,98,7,0.1)"/><circle cx="80" cy="40" r="2.5" fill="rgba(202,138,4,0.08)"/><circle cx="40" cy="80" r="2" fill="rgba(161,98,7,0.06)"/><circle cx="90" cy="80" r="1.8" fill="rgba(202,138,4,0.05)"/><circle cx="10" cy="70" r="1.5" fill="rgba(161,98,7,0.04)"/><circle cx="60" cy="30" r="2.2" fill="rgba(202,138,4,0.07)"/></svg>');
    animation: float-bg 25s ease-in-out infinite;
    pointer-events: none;
}

@keyframes float-bg {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(3deg); }
}

/* Enhanced Hero Card */
.hero-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(161, 98, 7, 0.1);
    border-radius: 30px;
    box-shadow: 
        0 25px 50px rgba(161, 98, 7, 0.1),
        0 10px 30px rgba(202, 138, 4, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.hero-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: var(--gradient-primary);
    border-radius: 30px 30px 0 0;
}

.hero-card:hover {
    transform: translateY(-10px);
    box-shadow: 
        0 35px 70px rgba(161, 98, 7, 0.15),
        0 15px 40px rgba(202, 138, 4, 0.15);
}

/* Enhanced Typography */
.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    position: relative;
    line-height: 1.2;
}

.hero-title::after {
    content: '🏆';
    position: absolute;
    top: -10px;
    right: -40px;
    font-size: 2rem;
    animation: bounce-trophy 2s ease-in-out infinite;
}

@keyframes bounce-trophy {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.hero-subtitle {
    font-size: 2rem;
    font-weight: 600;
    color: var(--secondary);
    margin-bottom: 2rem;
    position: relative;
}

.hero-subtitle::before {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: var(--gradient-primary);
    border-radius: 2px;
}

.hero-description {
    font-size: 1.3rem;
    color: var(--text-light);
    font-weight: 500;
    margin-bottom: 2rem;
}

/* Enhanced Buttons */
.btn-enhanced {
    padding: 1rem 2.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(161, 98, 7, 0.2);
}

.btn-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
}

.btn-enhanced:hover::before {
    left: 100%;
}

.btn-enhanced:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(161, 98, 7, 0.25);
}

.btn-primary-enhanced {
    background: var(--gradient-primary);
    border: none;
    color: white;
}

.btn-primary-enhanced:hover {
    background: linear-gradient(135deg, #92400e 0%, #a16207 100%);
    color: white;
}

.btn-outline-enhanced {
    background: transparent;
    border: 2px solid var(--secondary);
    color: var(--secondary);
}

.btn-outline-enhanced:hover {
    background: var(--gradient-primary);
    border-color: transparent;
    color: white;
}

/* Enhanced Info Card */
.info-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(161, 98, 7, 0.1);
    border-radius: 25px;
    box-shadow: 0 20px 40px rgba(161, 98, 7, 0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.info-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
    border-radius: 25px 25px 0 0;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(161, 98, 7, 0.12);
}

.info-card-header {
    background: var(--gradient-primary);
    color: white;
    padding: 1.5rem 2rem;
    border-radius: 25px 25px 0 0;
    position: relative;
}

.info-card-header::after {
    content: '💡';
    position: absolute;
    top: 50%;
    right: 2rem;
    transform: translateY(-50%);
    font-size: 1.5rem;
    animation: pulse-icon 2s ease-in-out infinite;
}

@keyframes pulse-icon {
    0%, 100% { transform: translateY(-50%) scale(1); }
    50% { transform: translateY(-50%) scale(1.1); }
}

/* Enhanced Steps List */
.steps-container {
    background: var(--gradient-soft);
    border-radius: 20px;
    padding: 2rem;
    margin: 2rem 0;
}

.steps-title {
    color: var(--primary);
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.steps-title::before {
    content: '🚀';
    margin-right: 0.5rem;
    font-size: 1.5rem;
}

.enhanced-steps {
    counter-reset: step-counter;
    padding-left: 0;
    list-style: none;
}

.enhanced-step {
    position: relative;
    margin-bottom: 1.5rem;
    padding: 1rem 1rem 1rem 4rem;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(161, 98, 7, 0.08);
    transition: all 0.3s ease;
    opacity: 0;
    animation: slideInLeft 0.6s ease forwards;
}

.enhanced-step:nth-child(1) { animation-delay: 0.2s; }
.enhanced-step:nth-child(2) { animation-delay: 0.4s; }
.enhanced-step:nth-child(3) { animation-delay: 0.6s; }
.enhanced-step:nth-child(4) { animation-delay: 0.8s; }

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.enhanced-step::before {
    content: counter(step-counter);
    counter-increment: step-counter;
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 2.5rem;
    height: 2.5rem;
    background: var(--gradient-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    box-shadow: 0 4px 15px rgba(161, 98, 7, 0.3);
    transition: all 0.3s ease;
}

.enhanced-step:hover {
    transform: translateX(10px);
    box-shadow: 0 8px 25px rgba(161, 98, 7, 0.15);
}

.enhanced-step:hover::before {
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 6px 20px rgba(161, 98, 7, 0.4);
}

/* Animation Classes */
.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-down {
    animation: fadeInDown 1s ease-out;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}

.animate-delay-1 { animation-delay: 0.3s; }
.animate-delay-2 { animation-delay: 0.6s; }
.animate-delay-3 { animation-delay: 0.9s; }
.animate-delay-4 { animation-delay: 1.2s; }

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced HR */
.enhanced-hr {
    height: 4px;
    border: none;
    background: var(--gradient-primary);
    border-radius: 2px;
    margin: 3rem 0;
    position: relative;
    overflow: hidden;
}

.enhanced-hr::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    animation: shine 2s ease-in-out infinite;
}

@keyframes shine {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-title::after {
        display: none;
    }
    
    .hero-subtitle {
        font-size: 1.5rem;
    }
    
    .btn-enhanced {
        padding: 0.8rem 2rem;
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    
    .enhanced-step {
        padding: 1rem 1rem 1rem 3.5rem;
    }
    
    .enhanced-step::before {
        width: 2rem;
        height: 2rem;
        font-size: 0.9rem;
    }
}

/* Loading Animation */
.loading-animation {
    opacity: 0;
    animation: loadIn 0.8s ease-out forwards;
}

@keyframes loadIn {
    to { opacity: 1; }
}
</style>
@endsection

@section('content')
<div class="welcome-container">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Hero Section -->
                <div class="hero-card shadow-lg loading-animation">
                    <div class="card-body p-5 text-center">
                        <h1 class="hero-title animate-fade-in-down">
                            Sistem Pendukung Keputusan
                        </h1>
                        <h2 class="hero-subtitle animate-fade-in-down animate-delay-1">
                            Pemilihan Karyawan Terbaik Parking Area
                        </h2>
                        <p class="hero-description animate-fade-in animate-delay-2">
                            Menggunakan Metode MOORA (Multi-Objective Optimization on the basis of Ratio Analysis)
                        </p>
                        
                        <div class="enhanced-hr animate-fade-in animate-delay-2"></div>
                        
                        <p class="lead animate-fade-in animate-delay-3">
                            SPK ini membantu menentukan karyawan terbaik berdasarkan kriteria penilaian yang telah ditentukan.
                        </p>
                        
                        <div class="mt-5 animate-fade-in-up animate-delay-3">
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-enhanced btn-primary-enhanced me-3">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard Admin
                                    </a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-enhanced btn-primary-enhanced me-3">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard User
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-enhanced btn-primary-enhanced me-3">
                                    <i class="fas fa-sign-in-alt me-2"></i> Login
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-enhanced btn-outline-enhanced">
                                    <i class="fas fa-user-plus me-2"></i> Register
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                
                <!-- Info Section -->
                <div class="info-card mt-5 loading-animation animate-delay-4">
                    <div class="info-card-header">
                        <h4 class="mb-0 fw-bold">Tentang Metode MOORA</h4>
                    </div>
                    <div class="card-body p-4">
                        <p class="mb-4">
                            Metode MOORA (Multi-Objective Optimization on the basis of Ratio Analysis) adalah metode perhitungan 
                            yang diperkenalkan oleh Brauers dan Zavadkas pada tahun 2006.
                        </p>
                        
                        <div class="steps-container">
                            <h5 class="steps-title">Tahapan perhitungan MOORA:</h5>
                            <ol class="enhanced-steps">
                                <li class="enhanced-step">
                                    <strong>Membuat matriks keputusan</strong>
                                    <br><small class="text-muted">Menyusun data alternatif dan kriteria dalam bentuk matriks</small>
                                </li>
                                <li class="enhanced-step">
                                    <strong>Normalisasi matriks keputusan</strong>
                                    <br><small class="text-muted">Mengubah nilai matriks menjadi nilai yang dapat dibandingkan</small>
                                </li>
                                <li class="enhanced-step">
                                    <strong>Menghitung nilai optimasi dengan mengalikan bobot kriteria</strong>
                                    <br><small class="text-muted">Mengalikan matriks ternormalisasi dengan bobot masing-masing kriteria</small>
                                </li>
                                <li class="enhanced-step">
                                    <strong>Melakukan perangkingan</strong>
                                    <br><small class="text-muted">Mengurutkan alternatif berdasarkan nilai optimasi tertinggi</small>
                                </li>
                            </ol>
                        </div>
                        
                        <div class="alert alert-info border-0" style="background: var(--gradient-soft); border-radius: 15px;">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Keunggulan MOORA:</strong> Memiliki tingkat selektivitas yang baik dalam menentukan suatu alternatif. 
                            Metode ini memiliki tingkat fleksibilitas yang tinggi dan kemudahan pemahaman dalam memisahkan 
                            bagian subjektif dan objektif dari proses evaluasi.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection