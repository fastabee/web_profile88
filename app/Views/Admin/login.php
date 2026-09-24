<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - 88 Group</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background: linear-gradient(135deg, #2d1208 0%, #1a1008 50%, #3a0c0c 100%);
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            animation: rotateSlow 20s linear infinite;
        }

        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 440px;
        }

        .login-container {
            background: linear-gradient(145deg, #251508, #1a1008);
            border-radius: 30px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 45px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.7);
            animation: fadeInUp 0.8s ease forwards;
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
            position: relative;
        }

        .logo i {
            font-size: 42px;
            color: var(--gold);
            animation: pulseGlow 2.5s ease-in-out infinite;
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

        .form-group input:focus + i {
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
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-leaf"></i>
                </div>
                <h1>Admin Login</h1>
                <p>88 Group Management System</p>
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

            <form action="<?= base_url('admin/login') ?>" method="post">
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

            <div class="divider">
                <i class="fas fa-leaf" style="color: #d4af37;"></i> 88 Group <i class="fas fa-leaf" style="color: #b71c1c;"></i>
            </div>
        </div>
    </div>
</body>
</html>
