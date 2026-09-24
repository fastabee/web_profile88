<style>
    .welcome-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 20px;
        padding: 30px;
        border: 1px solid rgba(212, 175, 55, 0.3);
        margin-bottom: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .welcome-card h2 {
        color: var(--gold-light);
        margin-bottom: 10px;
        font-size: 24px;
    }

    .welcome-card p {
        color: #b8ae9a;
        font-size: 14px;
        line-height: 1.6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        padding: 24px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.2);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        background: rgba(212, 175, 55, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: var(--gold);
        flex-shrink: 0;
    }

    .stat-info {
        flex: 1;
    }

    .stat-info .label {
        color: #9c927e;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .stat-info .value {
        color: var(--gold-light);
        font-size: 32px;
        font-weight: 700;
        line-height: 1;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
    }

    .dashboard-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 20px;
        padding: 28px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        transition: all 0.3s;
        text-align: center;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        border-color: var(--gold);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    .dashboard-card i {
        font-size: 40px;
        color: var(--gold);
        margin-bottom: 16px;
        background: rgba(212, 175, 55, 0.08);
        padding: 20px;
        border-radius: 50%;
        display: inline-block;
        transition: 0.3s;
    }

    .dashboard-card:hover i {
        transform: scale(1.1);
        background: rgba(212, 175, 55, 0.15);
    }

    .dashboard-card h3 {
        color: var(--gold-light);
        margin-bottom: 10px;
        font-size: 18px;
    }

    .dashboard-card p {
        color: #b8ae9a;
        font-size: 14px;
        line-height: 1.6;
    }

    .dashboard-card .card-link {
        display: inline-block;
        margin-top: 12px;
        padding: 10px 24px;
        background: var(--gold);
        color: #1a1008;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 13px;
        transition: 0.3s;
    }

    .dashboard-card .card-link:hover {
        background: var(--gold-light);
        transform: translateY(-2px);
    }

    .recent-section {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 20px;
        padding: 30px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        margin-top: 30px;
    }

    .recent-section h3 {
        color: var(--gold-light);
        margin-bottom: 20px;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .recent-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .recent-item {
        background: rgba(212, 175, 55, 0.05);
        border: 1px solid rgba(212, 175, 55, 0.1);
        border-radius: 10px;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.3s;
    }

    .recent-item:hover {
        background: rgba(212, 175, 55, 0.1);
        border-color: rgba(212, 175, 55, 0.3);
    }

    .recent-item-info h4 {
        color: #f0ece4;
        font-size: 15px;
        margin-bottom: 4px;
    }

    .recent-item-info p {
        color: #9c927e;
        font-size: 13px;
    }

    .recent-item-badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-pending {
        background: rgba(255, 152, 0, 0.15);
        color: #ffb74d;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .badge-diterima {
        background: rgba(76, 175, 80, 0.15);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .badge-ditolak {
        background: rgba(183, 28, 28, 0.15);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

    .badge-inreview {
        background: rgba(33, 150, 243, 0.15);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #6b6050;
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 15px;
        opacity: 0.3;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="welcome-card animate-on-load delay-1">
    <h2>Selamat Datang, <?= esc(session()->get('nama_pegawai')) ?>!</h2>
    <p>Anda berhasil login ke sistem manajemen 88 Group. Gunakan menu di sidebar untuk mengakses berbagai fitur manajemen lowongan kerja dan pelamar.</p>
</div>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="stat-info">
            <div class="label">Total Lowongan</div>
            <div class="value"><?= $totalLoker ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="stat-info">
            <div class="label">Lowongan Aktif</div>
            <div class="value"><?= $totalLokerAktif ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <div class="label">Total Pelamar</div>
            <div class="value"><?= $totalPelamar ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-clock"></i>
        </div>
        <div class="stat-info">
            <div class="label">Menunggu Review</div>
            <div class="value"><?= $pelamarPending ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-check"></i>
        </div>
        <div class="stat-info">
            <div class="label">Diterima</div>
            <div class="value"><?= $pelamarDiterima ?></div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-box"></i>
        </div>
        <div class="stat-info">
            <div class="label">Total Produk</div>
            <div class="value"><?= $totalProduk ?></div>
        </div>
    </div>
</div>

<!-- Quick Access Cards -->
<div class="dashboard-grid">
    <div class="dashboard-card">
        <i class="fas fa-briefcase"></i>
        <h3>Lowongan Kerja</h3>
        <p>Kelola lowongan kerja, tambah posisi baru, atau edit lowongan yang ada.</p>
        <a href="<?= base_url('admin/loker') ?>" class="card-link">
            <i class="fas fa-arrow-right"></i> Kelola Lowongan
        </a>
    </div>

    <div class="dashboard-card">
        <i class="fas fa-users"></i>
        <h3>Daftar Pelamar</h3>
        <p>Lihat dan kelola pelamar yang masuk untuk setiap lowongan kerja.</p>
        <a href="<?= base_url('admin/pelamar') ?>" class="card-link">
            <i class="fas fa-arrow-right"></i> Lihat Pelamar
        </a>
    </div>

    <div class="dashboard-card">
        <i class="fas fa-box"></i>
        <h3>Produk</h3>
        <p>Kelola produk perusahaan yang ditampilkan di website.</p>
        <a href="<?= base_url('admin/produk') ?>" class="card-link">
            <i class="fas fa-arrow-right"></i> Kelola Produk
        </a>
    </div>
</div>

<!-- Recent Applications -->
<div class="recent-section">
    <h3><i class="fas fa-history"></i> Lamaran Terbaru</h3>
    
    <?php if (!empty($recentApplications)): ?>
        <div class="recent-list">
            <?php foreach ($recentApplications as $app): ?>
                <div class="recent-item">
                    <div class="recent-item-info">
                        <h4><?= esc($app['nama_user']) ?></h4>
                        <p>Melamar untuk: <?= esc($app['judul_loker']) ?> • <?= date('d M Y, H:i', strtotime($app['created_at'])) ?></p>
                    </div>
                    <span class="recent-item-badge badge-<?= $app['status_lamaran'] ?>">
                        <?php
                            $statusText = [
                                'pending' => 'Menunggu',
                                'inreview' => 'Review',
                                'diterima' => 'Diterima',
                                'ditolak' => 'Ditolak'
                            ];
                            echo $statusText[$app['status_lamaran']] ?? $app['status_lamaran'];
                        ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Belum ada lamaran masuk</p>
        </div>
    <?php endif; ?>
</div>
