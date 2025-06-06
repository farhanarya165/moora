@extends('layouts.app')

@section('title', 'Register')

@section('styles')
<style>
/* Simplified and Professional Register Page Styles */
.register-container {
    background: linear-gradient(135deg, 
        var(--warm-gray) 0%, 
        #f3f2f0 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 2rem 0;
}

/* Professional Register Card */
.register-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(161, 98, 7, 0.08), 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(161, 98, 7, 0.08);
    transition: all 0.3s ease;
    width: 100%;
    overflow: hidden;
    margin: 0 auto;
}

.register-card:hover {
    box-shadow: 0 8px 30px rgba(161, 98, 7, 0.12), 0 2px 6px rgba(0, 0, 0, 0.15);
}

/* Professional Card Header */
.register-header {
    background: var(--gradient);
    color: white;
    padding: 2.5rem 3rem;
    text-align: center;
    position: relative;
}

.register-header::after {
    content: '👥';
    position: absolute;
    top: 1.5rem;
    right: 2.5rem;
    font-size: 1.8rem;
    opacity: 0.9;
}

.register-title {
    font-size: 2rem;
    font-weight: 600;
    margin: 0;
    letter-spacing: -0.02em;
}

.register-subtitle {
    font-size: 1rem;
    opacity: 0.95;
    margin-top: 0.5rem;
    font-weight: 400;
}

/* Professional Form Body */
.register-body {
    padding: 3rem;
}

/* Clean Form Controls */
.form-group-enhanced {
    margin-bottom: 2rem;
}

.form-label-enhanced {
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.75rem;
    display: flex;
    align-items: center;
    font-size: 0.95rem;
}

.form-label-enhanced i {
    margin-right: 0.75rem;
    color: var(--primary);
    width: 18px;
    font-size: 1.1rem;
}

.form-control-enhanced {
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    padding: 1.25rem 1.5rem;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    width: 100%;
    background: #fafafa;
    min-height: 52px;
}

.form-control-enhanced:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(161, 98, 7, 0.1);
    outline: none;
    background: white;
}

.form-control-enhanced.is-invalid {
    border-color: #dc3545;
    background: #fef2f2;
}

/* Clean Invalid Feedback */
.invalid-feedback-enhanced {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    padding: 0.5rem;
    background: #fef2f2;
    border-radius: 6px;
    border-left: 3px solid #dc3545;
}

/* Clean Captcha Container */
.captcha-container {
    background: #f8fafc;
    border-radius: 8px;
    padding: 1.5rem;
    margin: 2rem 0;
    text-align: center;
    border: 1px solid #e5e7eb;
}

.captcha-title {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.captcha-title i {
    margin-right: 0.75rem;
    color: var(--primary);
    font-size: 1.1rem;
}

.captcha-error {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    background: #fef2f2;
    padding: 0.5rem;
    border-radius: 6px;
}

/* Professional Submit Button */
.btn-register {
    background: var(--gradient);
    border: none;
    color: white;
    font-weight: 600;
    font-size: 1.05rem;
    padding: 1rem 2rem;
    border-radius: 8px;
    width: 100%;
    transition: all 0.3s ease;
    text-transform: none;
    letter-spacing: 0.025em;
}

.btn-register:hover {
    background: linear-gradient(135deg, #92400e 0%, #a16207 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(161, 98, 7, 0.25);
    color: white;
}

.btn-register:active {
    transform: translateY(0);
}

/* Professional Footer */
.register-footer {
    background: #f8fafc;
    text-align: center;
    padding: 2rem 3rem;
    border-top: 1px solid #e5e7eb;
}

.register-footer p {
    margin: 0;
    color: var(--text-light);
    font-size: 0.95rem;
}

.register-footer a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.register-footer a:hover {
    color: var(--secondary);
}

/* Simple Animations */
.fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Loading state */
.btn-register.loading {
    pointer-events: none;
    opacity: 0.8;
}

.btn-register.loading::after {
    content: '';
    width: 16px;
    height: 16px;
    margin-left: 10px;
    border: 2px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: spin 1s ease infinite;
    display: inline-block;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Form Rows for Responsive Layout */
.form-row {
    display: flex;
    gap: 1rem;
}

.form-row .form-group-enhanced {
    flex: 1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .register-card {
        margin: 1rem;
    }
    
    .register-header {
        padding: 1.5rem 1.5rem;
    }
    
    .register-body {
        padding: 2rem 1.5rem;
    }
    
    .register-footer {
        padding: 1.25rem 1.5rem;
    }
    
    .form-row {
        flex-direction: column;
        gap: 0;
    }
}

@media (max-width: 576px) {
    .register-container {
        padding: 1rem 0;
    }
    
    .register-card {
        margin: 0.5rem;
    }
    
    .register-header::after {
        display: none;
    }
}
</style>
@endsection

@section('content')
<div class="register-container">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="register-card fade-in-up">
                    <div class="register-header">
                        <h4 class="register-title">Bergabung dengan Kami</h4>
                        <p class="register-subtitle">Buat akun baru untuk mengakses sistem</p>
                    </div>
                    <div class="register-body">
                        <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
                            @csrf
                            <div class="form-group-enhanced">
                                <label for="name" class="form-label-enhanced">
                                    <i class="fas fa-user"></i>
                                    Nama Lengkap
                                </label>
                                <input id="name" 
                                       type="text" 
                                       class="form-control-enhanced @error('name') is-invalid @enderror" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autocomplete="name" 
                                       autofocus
                                       placeholder="Masukkan nama lengkap Anda">
                                @error('name')
                                <div class="invalid-feedback-enhanced">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group-enhanced">
                                <label for="email" class="form-label-enhanced">
                                    <i class="fas fa-envelope"></i>
                                    Email Address
                                </label>
                                <input id="email" 
                                       type="email" 
                                       class="form-control-enhanced @error('email') is-invalid @enderror" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email"
                                       placeholder="Masukkan alamat email Anda">
                                @error('email')
                                <div class="invalid-feedback-enhanced">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group-enhanced">
                                    <label for="password" class="form-label-enhanced">
                                        <i class="fas fa-lock"></i>
                                        Password
                                    </label>
                                    <input id="password" 
                                           type="password" 
                                           class="form-control-enhanced @error('password') is-invalid @enderror" 
                                           name="password" 
                                           required 
                                           autocomplete="new-password"
                                           placeholder="Masukkan password">
                                    @error('password')
                                    <div class="invalid-feedback-enhanced">
                                        <i class="fas fa-exclamation-triangle me-1"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group-enhanced">
                                    <label for="password-confirm" class="form-label-enhanced">
                                        <i class="fas fa-lock"></i>
                                        Konfirmasi Password
                                    </label>
                                    <input id="password-confirm" 
                                           type="password" 
                                           class="form-control-enhanced" 
                                           name="password_confirmation" 
                                           required 
                                           autocomplete="new-password"
                                           placeholder="Konfirmasi password">
                                </div>
                            </div>

                            <div class="captcha-container">
                                <div class="captcha-title">
                                    <i class="fas fa-shield-alt"></i>
                                    Verifikasi Keamanan
                                </div>
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                <div class="captcha-error">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $errors->first('g-recaptcha-response') }}
                                </div>
                                @endif
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn-register" id="registerBtn">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="register-footer">
                        <p>Sudah memiliki akun? 
                            <a href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>
                                Masuk Sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Enhanced form interaction
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const submitBtn = document.getElementById('registerBtn');
    
    // Add loading state on form submit
    form.addEventListener('submit', function() {
        submitBtn.classList.add('loading');
        submitBtn.innerHTML = '<span>Memproses...</span>';
    });
    
    // Enhanced form validation feedback
    const inputs = document.querySelectorAll('.form-control-enhanced');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() !== '') {
                this.style.borderColor = 'var(--emerald)';
                this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
            }
        });
        
        input.addEventListener('focus', function() {
            this.style.borderColor = 'var(--primary)';
            this.style.boxShadow = '0 0 0 3px rgba(161, 98, 7, 0.1)';
        });
    });
    
    // Password confirmation validation
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');
    
    function validatePasswords() {
        if (passwordConfirm.value !== '' && password.value !== passwordConfirm.value) {
            passwordConfirm.style.borderColor = '#dc3545';
            passwordConfirm.style.background = '#fef2f2';
        } else if (passwordConfirm.value !== '') {
            passwordConfirm.style.borderColor = 'var(--emerald)';
            passwordConfirm.style.background = '#f0fdf4';
        }
    }
    
    password.addEventListener('input', validatePasswords);
    passwordConfirm.addEventListener('input', validatePasswords);
});
</script>

{!! NoCaptcha::renderJs() !!}
@endsection