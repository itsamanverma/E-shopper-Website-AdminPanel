<x-admin.layout-simple>
    <style>
        .settings-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .settings-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 24px;
            position: relative;
            overflow: hidden;
        }

        .settings-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(50%, -50%);
        }

        .settings-title {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px 0;
            position: relative;
            z-index: 1;
        }

        .settings-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .settings-content {
            padding: 32px;
        }

        .settings-tabs {
            display: flex;
            background: #f8fafc;
            border-radius: 12px;
            padding: 4px;
            margin-bottom: 32px;
        }

        .tab-button {
            flex: 1;
            padding: 12px 24px;
            background: none;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .tab-button.active {
            background: white;
            color: #667eea;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            border-left: 4px solid #667eea;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin: 0 0 16px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-icon {
            width: 20px;
            height: 20px;
            background: #667eea;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .form-input {
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .password-input-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 4px;
        }

        .form-help {
            font-size: 12px;
            color: #6b7280;
        }

        .password-strength {
            margin-top: 8px;
        }

        .strength-bar {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 4px;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ef4444; width: 25%; }
        .strength-medium { background: #f59e0b; width: 50%; }
        .strength-strong { background: #10b981; width: 75%; }
        .strength-very-strong { background: #059669; width: 100%; }

        .strength-text {
            font-size: 12px;
            font-weight: 500;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 14px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            border: 1px solid;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #16a34a;
        }

        .alert-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }

        .alert-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .alert-success .alert-icon {
            background: #16a34a;
        }

        .alert-error .alert-icon {
            background: #dc2626;
        }

        .check-password {
            margin-top: 8px;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
        }

        .check-correct {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        .check-incorrect {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        @media (max-width: 768px) {
            .settings-content {
                padding: 20px;
            }

            .btn-group {
                flex-direction: column;
            }

            .settings-tabs {
                flex-direction: column;
                gap: 4px;
            }
        }
    </style>

    <div class="breadcrumb-container">
        <nav class="breadcrumb">
            <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                <span class="breadcrumb-icon">🏠</span>
                Dashboard
            </a>
            <span class="breadcrumb-separator">→</span>
            <span class="breadcrumb-current">Settings</span>
        </nav>
    </div>

    @if(Session::has('flash_message_error'))
        <div class="alert alert-error">
            <div class="alert-icon">✕</div>
            <div>
                <strong>Error!</strong> {!! session('flash_message_error') !!}
            </div>
        </div>
    @endif   

    @if(Session::has('flash_message_success'))
        <div class="alert alert-success">
            <div class="alert-icon">✓</div>
            <div>
                <strong>Success!</strong> {!! session('flash_message_success') !!}
            </div>
        </div>
    @endif

    <div class="settings-container">
        <div class="settings-header">
            <h1 class="settings-title">Admin Settings</h1>
            <p class="settings-subtitle">Manage your account security and preferences</p>
        </div>

        <div class="settings-content">
            <div class="settings-tabs">
                <button class="tab-button active" onclick="showTab('password')">
                    🔒 Password & Security
                </button>
                <button class="tab-button" onclick="showTab('profile')">
                    👤 Profile Settings
                </button>
                <button class="tab-button" onclick="showTab('system')">
                    ⚙️ System Settings
                </button>
            </div>

            <!-- Password Tab -->
            <div id="password-tab" class="tab-content active">
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">🔑</div>
                        Change Password
                    </div>

                    <form method="post" action="{{ url('/admin/update-pwd') }}" id="passwordForm">
                        {{ csrf_field() }}
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" name="current_pwd" id="current_pwd" class="form-input" placeholder="Enter your current password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('current_pwd')">👁️</button>
                                </div>
                                <div id="chkPwd" class="check-password" style="display: none;"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" name="new_pwd" id="new_pwd" class="form-input" placeholder="Enter new password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('new_pwd')">👁️</button>
                                </div>
                                <div class="password-strength" id="passwordStrength" style="display: none;">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <div class="strength-text" id="strengthText">Password strength: Weak</div>
                                </div>
                                <div class="form-help">Password should be at least 8 characters with uppercase, lowercase, number and special character</div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <div class="password-input-wrapper">
                                    <input type="password" name="confirm_pwd" id="confirm_pwd" class="form-input" placeholder="Confirm new password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('confirm_pwd')">👁️</button>
                                </div>
                                <div id="passwordMatch" class="check-password" style="display: none;"></div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Profile Tab -->
            <div id="profile-tab" class="tab-content">
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">👤</div>
                        Profile Information
                    </div>

                    <form method="post" action="{{ url('/admin/update-profile') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-input" value="{{ Auth::guard('admin')->user()->name ?? 'Admin User' }}" placeholder="Enter your full name">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-input" value="{{ Auth::guard('admin')->user()->email ?? 'dev.amanverma@gmail.com' }}" placeholder="Enter your email">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-input" placeholder="Enter your phone number">
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- System Tab -->
            <div id="system-tab" class="tab-content">
                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">⚙️</div>
                        System Preferences
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Site Maintenance Mode</label>
                            <select class="form-input">
                                <option value="0">Disabled</option>
                                <option value="1">Enabled</option>
                            </select>
                            <div class="form-help">Enable maintenance mode to show a maintenance page to visitors</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Admin Session Timeout (minutes)</label>
                            <input type="number" class="form-input" value="120" min="5" max="480">
                            <div class="form-help">Set session timeout for admin users</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Debug Mode</label>
                            <select class="form-input">
                                <option value="true">Enabled</option>
                                <option value="false">Disabled</option>
                            </select>
                            <div class="form-help">Enable debug mode for development (should be disabled in production)</div>
                        </div>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Reset to Defaults</button>
                        <button type="button" class="btn btn-primary">Save Settings</button>
                    </div>
                </div>

                <div class="form-section">
                    <div class="section-title">
                        <div class="section-icon">🗃️</div>
                        Database & Cache
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Clear Application Cache</label>
                            <button type="button" class="btn btn-secondary" style="margin-top: 8px;">Clear Cache</button>
                            <div class="form-help">Clear all cached data to improve performance</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Backup Database</label>
                            <button type="button" class="btn btn-secondary" style="margin-top: 8px;">Create Backup</button>
                            <div class="form-help">Create a backup of your database</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            
            const button = input.nextElementSibling;
            button.textContent = type === 'password' ? '👁️' : '🙈';
        }

        function resetForm() {
            document.getElementById('passwordForm').reset();
            document.getElementById('chkPwd').style.display = 'none';
            document.getElementById('passwordStrength').style.display = 'none';
            document.getElementById('passwordMatch').style.display = 'none';
        }

        // Password strength checker
        document.getElementById('new_pwd').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthDiv.style.display = 'none';
                return;
            }
            
            strengthDiv.style.display = 'block';
            
            let strength = 0;
            let strengthClass = '';
            let strengthLabel = '';
            
            // Check password criteria
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Set strength class and label
            switch (strength) {
                case 0:
                case 1:
                    strengthClass = 'strength-weak';
                    strengthLabel = 'Very Weak';
                    break;
                case 2:
                    strengthClass = 'strength-weak';
                    strengthLabel = 'Weak';
                    break;
                case 3:
                    strengthClass = 'strength-medium';
                    strengthLabel = 'Medium';
                    break;
                case 4:
                    strengthClass = 'strength-strong';
                    strengthLabel = 'Strong';
                    break;
                case 5:
                    strengthClass = 'strength-very-strong';
                    strengthLabel = 'Very Strong';
                    break;
            }
            
            strengthFill.className = 'strength-fill ' + strengthClass;
            strengthText.textContent = 'Password strength: ' + strengthLabel;
        });

        // Password confirmation checker
        document.getElementById('confirm_pwd').addEventListener('input', function() {
            const password = document.getElementById('new_pwd').value;
            const confirmPassword = this.value;
            const matchDiv = document.getElementById('passwordMatch');
            
            if (confirmPassword.length === 0) {
                matchDiv.style.display = 'none';
                return;
            }
            
            matchDiv.style.display = 'block';
            
            if (password === confirmPassword) {
                matchDiv.textContent = '✓ Passwords match';
                matchDiv.className = 'check-password check-correct';
            } else {
                matchDiv.textContent = '✕ Passwords do not match';
                matchDiv.className = 'check-password check-incorrect';
            }
        });

        // Current password checker (if you have an AJAX endpoint)
        document.getElementById('current_pwd').addEventListener('blur', function() {
            const currentPassword = this.value;
            const checkDiv = document.getElementById('chkPwd');
            
            if (currentPassword.length === 0) {
                checkDiv.style.display = 'none';
                return;
            }
            
            // You can implement AJAX check here
            checkDiv.style.display = 'block';
            checkDiv.textContent = 'Checking...';
            checkDiv.className = 'check-password';
        });
    </script>
</x-admin.layout-simple>