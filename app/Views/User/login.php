<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User - 88 Group</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <style>
        body {
            min-height: 100vh;
            padding: 20px;
            background: linear-gradient(135deg, #2d1208 0%, #1a1008 50%, #3a0c0c 100%);
            background-attachment: fixed;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            animation: rotateSlow 20s linear infinite;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes rotateSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
            margin: 40px auto;
        }

        .login-container {
            background: linear-gradient(145deg, #251508, #1a1008);
            border-radius: 30px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 45px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 0.8s ease forwards;
        }

        /* Custom Scrollbar for body */
        body::-webkit-scrollbar {
            width: 10px;
        }

        body::-webkit-scrollbar-track {
            background: rgba(26, 16, 8, 0.8);
        }

        body::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 5px;
        }

        body::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.5);
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

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo {
            width: 90px;
            height: 90px;
            background: rgba(212, 175, 55, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 2px solid rgba(212, 175, 55, 0.3);
        }

        .logo i {
            font-size: 42px;
            color: var(--gold);
            animation: pulseGlow 2.5s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .login-header h1 {
            color: var(--gold-light);
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .login-header p {
            color: #b8ae9a;
            font-size: 14px;
        }

        .tab-container {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.03);
            padding: 6px;
            border-radius: 15px;
        }

        .tab-button {
            flex: 1;
            padding: 12px;
            background: transparent;
            border: none;
            color: #b8ae9a;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .tab-button:hover {
            color: var(--gold-light);
        }

        .tab-button.active {
            background: var(--gold);
            color: #1a1008;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
        }

        .tab-content {
            display: none;
            animation: fadeInUp 0.5s ease;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            color: #f0ece4;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .form-group label i {
            color: var(--gold);
            margin-right: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9c927e;
            font-size: 16px;
            transition: 0.3s;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid #3d2410;
            border-radius: 12px;
            font-size: 14px;
            color: #f0ece4;
            transition: all 0.3s;
        }

        .form-group input::placeholder {
            color: #6b6050;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--gold-dark);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
        }

        .form-group input:focus ~ i {
            color: var(--gold);
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: var(--gold);
            color: #1a1008;
            border: none;
            border-radius: 60px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 8px 18px rgba(212, 175, 55, 0.25);
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(212, 175, 55, 0.4);
        }

        .alert {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: fadeInUp 0.5s ease;
        }

        .alert i {
            font-size: 18px;
        }

        .alert-error {
            background: rgba(183, 28, 28, 0.15);
            color: var(--red-bright);
            border: 1px solid rgba(183, 28, 28, 0.3);
        }

        .alert-success {
            background: rgba(76, 175, 80, 0.15);
            color: #81c784;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }

        .divider {
            text-align: center;
            margin: 30px 0 0;
            padding-top: 25px;
            border-top: 1px solid rgba(212, 175, 55, 0.15);
            color: #9c927e;
            font-size: 13px;
        }

        .divider i {
            margin: 0 8px;
            animation: pulseGlow 2.5s ease-in-out infinite;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: var(--gold);
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-link a:hover {
            color: var(--gold-light);
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h1>Portal Pelamar</h1>
                <p>88 Group - Portal Karir</p>
            </div>

            <div class="tab-container">
                <button type="button" class="tab-button active" onclick="switchTab('login')">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
                <button type="button" class="tab-button" onclick="switchTab('register')">
                    <i class="fas fa-user-plus"></i> Daftar
                </button>
            </div>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <div id="login-tab" class="tab-content active">
                <form action="<?= base_url('user/login') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" 
                                   value="<?= old('email') ?>" 
                                   placeholder="Masukkan email anda" 
                                   required>
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" 
                                   placeholder="Masukkan password anda" 
                                   required>
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Register Form -->
            <div id="register-tab" class="tab-content">
                <form action="<?= base_url('user/register') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="form-group">
                        <label for="reg_nama"><i class="fas fa-user"></i> Nama Lengkap</label>
                        <div class="input-wrapper">
                            <input type="text" id="reg_nama" name="nama_user" 
                                   value="<?= old('nama_user') ?>" 
                                   placeholder="Masukkan nama lengkap" 
                                   required>
                            <i class="fas fa-user"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_email"><i class="fas fa-envelope"></i> Email</label>
                        <div class="input-wrapper">
                            <input type="email" id="reg_email" name="email" 
                                   value="<?= old('email') ?>" 
                                   placeholder="Masukkan email anda" 
                                   required>
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_password"><i class="fas fa-lock"></i> Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="reg_password" name="password" 
                                   placeholder="Minimal 6 karakter" 
                                   required>
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_password_confirm"><i class="fas fa-lock"></i> Konfirmasi Password</label>
                        <div class="input-wrapper">
                            <input type="password" id="reg_password_confirm" name="password_confirm" 
                                   placeholder="Ulangi password" 
                                   required>
                            <i class="fas fa-lock"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="fas fa-user-plus"></i> Daftar Akun Baru
                    </button>
                </form>
            </div>

            <div class="back-link">
                <a href="<?= base_url('karir') ?>"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Karir</a>
            </div>

            <div class="divider">
                <i class="fas fa-leaf" style="color: #d4af37;"></i> 88 Group <i class="fas fa-leaf" style="color: #b71c1c;"></i>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Add active class to clicked button
            event.target.closest('.tab-button').classList.add('active');
        }
    </script>
</body>
</html>
