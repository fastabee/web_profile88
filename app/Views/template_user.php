<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>User Dashboard · 88 Group</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1008;
            color: #f0ece4;
            overflow-x: hidden;
        }

        .user-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #251508, #1a1008);
            border-right: 1px solid rgba(212, 175, 55, 0.2);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 45px;
            height: 45px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(212, 175, 55, 0.3);
        }

        .sidebar-logo i {
            color: var(--gold);
            font-size: 22px;
            animation: pulseGlow 2.5s ease-in-out infinite;
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .sidebar-title {
            color: var(--gold-light);
            font-size: 18px;
            font-weight: 700;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-section {
            margin-bottom: 24px;
        }

        .menu-section-title {
            color: #9c927e;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 20px 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #b8ae9a;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item i {
            width: 20px;
            font-size: 16px;
        }

        .menu-item:hover {
            background: rgba(212, 175, 55, 0.08);
            color: var(--gold-light);
            border-left-color: var(--gold);
        }

        .menu-item.active {
            background: rgba(212, 175, 55, 0.12);
            color: var(--gold-light);
            border-left-color: var(--gold);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar-user {
            background: linear-gradient(145deg, #251508, #1a1008);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 90;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu-toggle {
            display: none;
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.3);
            color: var(--gold);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: 0.3s;
        }

        .menu-toggle:hover {
            background: rgba(212, 175, 55, 0.2);
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--gold-light);
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: rgba(212, 175, 55, 0.08);
            border-radius: 30px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1a1008;
            font-weight: 700;
            font-size: 14px;
        }

        .user-name {
            color: #f0ece4;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-logout {
            padding: 8px 18px;
            background: rgba(183, 28, 28, 0.15);
            color: var(--red-bright);
            border: 1px solid rgba(183, 28, 28, 0.3);
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-logout:hover {
            background: rgba(183, 28, 28, 0.25);
            border-color: var(--red-bright);
            transform: translateY(-2px);
        }

        /* Content Area */
        .content-area {
            flex: 1;
            padding: 30px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
            }

            .user-name {
                display: none;
            }

            .content-area {
                padding: 20px;
            }
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(212, 175, 55, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(212, 175, 55, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(212, 175, 55, 0.5);
        }
    </style>
</head>
<body>
    <div class="user-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="sidebar-title">Portal Karir</div>
            </div>
            
            <nav class="sidebar-menu">
                <div class="menu-section">
                    <div class="menu-section-title">Menu Utama</div>
                    <a href="<?= base_url('user/dashboard') ?>" class="menu-item <?= (current_url() == base_url('user/dashboard')) ? 'active' : '' ?>">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="<?= base_url('user/lowongan') ?>" class="menu-item <?= (strpos(current_url(), 'lowongan') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-briefcase"></i>
                        <span>Lowongan Kerja</span>
                    </a>
                    <a href="<?= base_url('user/profile') ?>" class="menu-item <?= (strpos(current_url(), 'profile') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-user"></i>
                        <span>Profil Saya</span>
                    </a>
                    <a href="<?= base_url('user/lamaran') ?>" class="menu-item <?= (strpos(current_url(), 'lamaran') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-file-alt"></i>
                        <span>Lamaran Saya</span>
                    </a>
                </div>

                <div class="menu-section">
                    <div class="menu-section-title">Lainnya</div>
                    <a href="<?= base_url('karir') ?>" class="menu-item" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Website Karir</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Navbar -->
            <nav class="navbar-user">
                <div class="navbar-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title"><?= isset($pageTitle) ? $pageTitle : 'Dashboard' ?></h1>
                </div>
                
                <div class="navbar-right">
                    <div class="user-info">
                        <div class="user-avatar">
                            <?= strtoupper(substr(session()->get('nama_user'), 0, 1)) ?>
                        </div>
                        <span class="user-name"><?= session()->get('nama_user') ?></span>
                    </div>
                    <a href="<?= base_url('user/logout') ?>" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="content-area">
                <?= $this->include($body) ?>
            </div>
        </main>
    </div>

    <script>
        // Toggle Sidebar Mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>
