<style>
    .welcome-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .welcome-card h2 {
        color: var(--gold-light);
        font-size: 28px;
        margin-bottom: 10px;
    }

    .welcome-card p {
        color: #b8ae9a;
        font-size: 15px;
        line-height: 1.6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.2);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .stat-icon.blue {
        background: rgba(33, 150, 243, 0.15);
        color: #64b5f6;
    }

    .stat-icon.green {
        background: rgba(76, 175, 80, 0.15);
        color: #81c784;
    }

    .stat-icon.orange {
        background: rgba(255, 152, 0, 0.15);
        color: #ffb74d;
    }

    .stat-icon.purple {
        background: rgba(156, 39, 176, 0.15);
        color: #ba68c8;
    }

    .stat-info h3 {
        color: #f0ece4;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: #9c927e;
        font-size: 14px;
    }

    .quick-actions {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 30px;
    }

    .quick-actions h3 {
        color: var(--gold-light);
        font-size: 20px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .action-btn {
        padding: 20px;
        background: rgba(212, 175, 55, 0.08);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 12px;
        text-decoration: none;
        color: #f0ece4;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        transition: all 0.3s;
        text-align: center;
    }

    .action-btn i {
        font-size: 32px;
        color: var(--gold);
    }

    .action-btn span {
        font-size: 14px;
        font-weight: 600;
    }

    .action-btn:hover {
        background: rgba(212, 175, 55, 0.15);
        border-color: var(--gold);
        transform: translateY(-3px);
    }

    .info-box {
        background: rgba(33, 150, 243, 0.1);
        border: 1px solid rgba(33, 150, 243, 0.3);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .info-box i {
        font-size: 24px;
        color: #64b5f6;
        flex-shrink: 0;
    }

    .info-box-content h4 {
        color: #64b5f6;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .info-box-content p {
        color: #b8ae9a;
        font-size: 14px;
        line-height: 1.6;
    }
</style>

<div class="welcome-card">
    <h2><i class="fas fa-hand-wave" style="color: var(--gold);"></i> Selamat Datang, <?= esc(session()->get('nama_user')) ?>!</h2>
    <p>Terima kasih telah bergabung dengan Portal Karir 88 Group. Kelola profil Anda, lihat lowongan tersedia, dan kirim lamaran dengan mudah.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="stat-info">
            <h3><?= $totalLoker ?></h3>
            <p>Lowongan Tersedia</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon green">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="stat-info">
            <h3><?= $totalLamaran ?></h3>
            <p>Lamaran Terkirim</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon orange">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <h3><?= $lamaranPending ?></h3>
            <p>Menunggu Review</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon purple">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-info">
            <h3><?= !empty($userData['pendidikan_terakhir']) ? esc($userData['pendidikan_terakhir']) : '-' ?></h3>
            <p>Pendidikan Terakhir</p>
        </div>
    </div>
</div>

<div class="quick-actions">
    <h3><i class="fas fa-bolt"></i> Aksi Cepat</h3>
    <div class="action-grid">
        <a href="<?= base_url('user/lowongan') ?>" class="action-btn">
            <i class="fas fa-search"></i>
            <span>Lihat Lowongan</span>
        </a>
        <a href="<?= base_url('user/profile') ?>" class="action-btn">
            <i class="fas fa-user-edit"></i>
            <span>Edit Profil</span>
        </a>
        <a href="<?= base_url('user/lamaran') ?>" class="action-btn">
            <i class="fas fa-list-alt"></i>
            <span>Riwayat Lamaran</span>
        </a>
        <a href="<?= base_url('user/profile') ?>" class="action-btn">
            <i class="fas fa-file-upload"></i>
            <span>Upload Dokumen</span>
        </a>
    </div>
</div>

<div class="info-box">
    <i class="fas fa-info-circle"></i>
    <div class="info-box-content">
        <h4>Tips Melamar Kerja</h4>
        <p>Pastikan profil Anda lengkap dan dokumen-dokumen yang dibutuhkan sudah terupload. CV yang baik dan lengkap akan meningkatkan peluang Anda untuk diterima.</p>
    </div>
</div>
