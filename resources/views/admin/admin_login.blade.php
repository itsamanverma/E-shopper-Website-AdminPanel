<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shopper Admin - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 48px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.4);
        }

        .logo-text {
            color: white;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #6b7280;
            font-size: 16px;
        }

        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            border: 1px solid;
            position: relative;
            font-weight: 500;
        }

        .alert-error {
            background-color: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-color: #bbf7d0;
            color: #16a34a;
        }

        .alert-close {
            position: absolute;
            top: 16px;
            right: 16px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: inherit;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 20px;
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 16px 16px 16px 52px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: rgba(255, 255, 255, 0.95);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .login-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-password:hover {
            color: #4338ca;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px 0 rgba(102, 126, 234, 0.3);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px 0 rgba(102, 126, 234, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .recovery-form {
            display: none;
        }

        .recovery-form.active {
            display: block;
        }

        .main-form.hidden {
            display: none;
        }

        .back-btn {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .back-btn:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }

        .recover-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 15px 0 rgba(16, 185, 129, 0.3);
        }

        .recover-btn:hover {
            box-shadow: 0 8px 25px 0 rgba(16, 185, 129, 0.4);
        }

        .recovery-text {
            color: #6b7280;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 20px;
                padding: 32px 24px;
            }

            .login-title {
                font-size: 24px;
            }

            .login-actions {
                flex-direction: column;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <span class="logo-text">E</span>
            </div>
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Please sign in to your admin account</p>
        </div>

        @if(Session::has('flash_message_error'))
            <div class="alert alert-error">
                <button type="button" class="alert-close" onclick="this.parentElement.remove()">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   

        @if(Session::has('flash_message_success'))
            <div class="alert alert-success">
                <button type="button" class="alert-close" onclick="this.parentElement.remove()">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif

        <!-- Main Login Form -->
        <form class="main-form" method="POST" action="{{ url('admin') }}">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input type="email" name="email" class="form-input" placeholder="Enter your email address" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" name="password" class="form-input" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="login-actions">
                <a href="#" class="forgot-password" onclick="showRecoveryForm()">Forgot password?</a>
            </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

        <!-- Password Recovery Form -->
        <div class="recovery-form" id="recoveryForm">
            <div class="recovery-text">
                Enter your email address below and we will send you instructions on how to recover your password.
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-wrapper">
                    <span class="input-icon">✉️</span>
                    <input type="email" class="form-input" placeholder="Enter your email address" required>
                </div>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="button" class="login-btn back-btn" onclick="showLoginForm()" style="width: auto; flex: 1;">
                    ← Back to Login
                </button>
                <button type="button" class="login-btn recover-btn" style="width: auto; flex: 1;">
                    Recover Password
                </button>
            </div>
        </div>
    </div>

    <script>
        function showRecoveryForm() {
            document.querySelector('.main-form').classList.add('hidden');
            document.querySelector('.recovery-form').classList.add('active');
        }

        function showLoginForm() {
            document.querySelector('.main-form').classList.remove('hidden');
            document.querySelector('.recovery-form').classList.remove('active');
        }

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    if (alert.parentElement) {
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateY(-10px)';
                        setTimeout(() => alert.remove(), 300);
                    }
                }, 5000);
            });
        });

        // Add loading state to login button
        document.querySelector('.main-form').addEventListener('submit', function() {
            const btn = this.querySelector('.login-btn');
            btn.innerHTML = 'Signing In...';
            btn.disabled = true;
        });
    </script>
</body>
</html>