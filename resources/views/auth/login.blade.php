@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<style>
/* Simplified and Professional Login Page Styles */
.login-container {
    background: linear-gradient(135deg, 
        var(--warm-gray) 0%, 
        #f3f2f0 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 2rem 0;
}

/* Professional Login Card */
.login-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(161, 98, 7, 0.08), 0 1px 3px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(161, 98, 7, 0.08);
    transition: all 0.3s ease;
    width: 100%;
    overflow: hidden;
    margin: 0 auto;
}

.login-card:hover {
    box-shadow: 0 8px 30px rgba(161, 98, 7, 0.12), 0 2px 6px rgba(0, 0, 0, 0.15);
}

/* Professional Card Header */
.login-header {
    background: var(--gradient);
    color: white;
    padding: 2.5rem 3rem;
    text-align: center;
    position: relative;
}

.login-header::after {
    content: '🛡️';
    position: absolute;
    top: 1.5rem;
    right: 2.5rem;
    font-size: 1.8rem;
    opacity: 0.9;
}

.login-title {
    font-size: 2rem;
    font-weight: 600;
    margin: 0;
    letter-spacing: -0.02em;
}

.login-subtitle {
    font-size: 1rem;
    opacity: 0.95;
    margin-top: 0.5rem;
    font-weight: 400;
}

/* Professional Form Body */
.login-body {
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

/* Professional Checkbox */
.form-check-enhanced {
    display: flex;
    align-items: center;
    margin: 2rem 0;
    padding: 1rem 1.25rem;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.form-check-input-enhanced {
    width: 1.2rem;
    height: 1.2rem;
    margin-right: 1rem;
    accent-color: var(--primary);
}

.form-check-label-enhanced {
    font-weight: 500;
    color: var(--text-dark);
    margin: 0;
    font-size: 0.95rem;
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
.btn-login {
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

.btn-login:hover {
    background: linear-gradient(135deg, #92400e 0%, #a16207 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(161, 98, 7, 0.25);
    color: white;
}

.btn-login:active {
    transform: translateY(0);
}

/* Professional Footer */
.login-footer {
    background: #f8fafc;
    text-align: center;
    padding: 2rem 3rem;
    border-top: 1px solid #e5e7eb;
}

.login-footer p {
    margin: 0;
    color: var(--text-light);
    font-size: 0.95rem;
}

.login-footer a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.login-footer a:hover {
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
.btn-login.loading {
    pointer-events: none;
    opacity: 0.8;
}

.btn-login.loading::after {
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

/* Responsive Design */
@media (max-width: 768px) {
    .login-card {
        margin: 1rem;
        max-width: none;
    }
    
    .login-header {
        padding: 1.5rem 1.5rem;
    }
    
    .login-body {
        padding: 2rem 1.5rem;
    }
    
    .login-footer {
        padding: 1.25rem 1.5rem;
    }
}

@media (max-width: 576px) {
    .login-container {
        padding: 1rem 0;
    }
    
    .login-card {
        margin: 0.5rem;
    }
    
    .login-header::after {
        display: none;
    }
}
</style>
@endsection

@section('content')
<div class="login-container">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="login-card fade-in-up">
                    <div class="login-header">
                        <h4 class="login-title">Selamat Datang</h4>
                        <p class="login-subtitle">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>
                    <div class="login-body">
                        <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
                            @csrf
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
                                       autofocus
                                       placeholder="Masukkan alamat email Anda">
                                @error('email')
                                <div class="invalid-feedback-enhanced">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

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
                                       autocomplete="current-password"
                                       placeholder="Masukkan password Anda">
                                @error('password')
                                <div class="invalid-feedback-enhanced">
                                    <i class="fas fa-exclamation-triangle me-1"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-check-enhanced">
                                <input class="form-check-input-enhanced" 
                                       type="checkbox" 
                                       name="remember" 
                                       id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label-enhanced" for="remember">
                                    <i class="fas fa-bookmark me-1"></i>
                                    Ingat saya di perangkat ini
                                </label>
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
                                <button type="submit" class="btn-login" id="loginBtn">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    Masuk ke Sistem
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <p>Belum memiliki akun? 
                            <a href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>
                                Daftar Sekarang
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
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('loginBtn');
    
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
                this.style.boxShadow = '0 0 0 0.2rem rgba(16, 185, 129, 0.15)';
            }
        });
        
        input.addEventListener('focus', function() {
            this.style.borderColor = 'var(--primary)';
            this.style.boxShadow = '0 0 0 0.2rem rgba(161, 98, 7, 0.15)';
        });
    });
});
</script>

{!! NoCaptcha::renderJs() !!}
@endsection