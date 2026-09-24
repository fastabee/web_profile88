<style>
    .detail-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .back-nav {
        margin-bottom: 20px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--gold);
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    .back-link:hover {
        color: var(--gold-light);
        gap: 12px;
    }

    .status-banner {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .status-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .status-icon.pending {
        background: rgba(255, 152, 0, 0.2);
        color: #ffb74d;
    }

    .status-icon.inreview {
        background: rgba(33, 150, 243, 0.2);
        color: #64b5f6;
    }

    .status-icon.diterima {
        background: rgba(76, 175, 80, 0.2);
        color: #81c784;
    }

    .status-icon.ditolak {
        background: rgba(183, 28, 28, 0.2);
        color: var(--red-bright);
    }

    .status-content h2 {
        color: var(--gold-light);
        font-size: 22px;
        margin-bottom: 5px;
    }

    .status-content p {
        color: #9c927e;
        font-size: 14px;
    }

    .detail-section {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 25px;
    }

    .detail-section h3 {
        color: var(--gold-light);
        font-size: 18px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .detail-section h3 i {
        color: var(--gold);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .info-item {
        padding: 15px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 10px;
    }

    .info-item .label {
        color: #9c927e;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .info-item .value {
        color: #f0ece4;
        font-size: 15px;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .status-banner {
            flex-direction: column;
            text-align: center;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="detail-container">
    <div class="back-nav">
        <a href="<?= base_url('user/lamaran') ?>" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Lamaran Saya
        </a>
    </div>

    <?php
        $statusInfo = [
            'pending' => [
                'icon' => 'fa-clock',
                'title' => 'Lamaran Menunggu',
                'desc' => 'Lamaran Anda sedang menunggu untuk ditinjau oleh tim rekrutmen.'
            ],
            'inreview' => [
                'icon' => 'fa-search',
                'title' => 'Sedang Ditinjau',
                'desc' => 'Lamaran Anda sedang dalam proses peninjauan oleh tim rekrutmen.'
            ],
            'diterima' => [
                'icon' => 'fa-check-circle',
                'title' => 'Lamaran Diterima',
                'desc' => 'Selamat! Lamaran Anda telah diterima. Tim kami akan menghubungi Anda segera.'
            ],
            'ditolak' => [
                'icon' => 'fa-times-circle',
                'title' => 'Lamaran Ditolak',
                'desc' => 'Mohon maaf, lamaran Anda belum dapat kami terima untuk saat ini.'
            ]
        ];

        $currentStatus = $statusInfo[$lamaran['status_lamaran']] ?? $statusInfo['pending'];
    ?>

    <div class="status-banner">
        <div class="status-icon <?= $lamaran['status_lamaran'] ?>">
            <i class="fas <?= $currentStatus['icon'] ?>"></i>
        </div>
        <div class="status-content">
            <h2><?= $currentStatus['title'] ?></h2>
            <p><?= $currentStatus['desc'] ?></p>
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-briefcase"></i> Informasi Lowongan</h3>
        <div class="info-grid">
            <div class="info-item">
                <div class="label">Posisi</div>
                <div class="value"><?= esc($lamaran['judul_loker']) ?></div>
            </div>
            <?php if ($lamaran['divisi']): ?>
                <div class="info-item">
                    <div class="label">Divisi</div>
                    <div class="value"><?= esc($lamaran['divisi']) ?></div>
                </div>
            <?php endif; ?>
            <?php if ($lamaran['sistem_kerja']): ?>
                <div class="info-item">
                    <div class="label">Sistem Kerja</div>
                    <div class="value"><?= esc($lamaran['sistem_kerja']) ?></div>
                </div>
            <?php endif; ?>
            <?php if ($lamaran['Penempatan']): ?>
                <div class="info-item">
                    <div class="label">Penempatan</div>
                    <div class="value"><?= esc($lamaran['Penempatan']) ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-history"></i> Riwayat Lamaran</h3>
        <div class="info-grid">
            <div class="info-item">
                <div class="label">Tanggal Melamar</div>
                <div class="value"><?= date('d F Y, H:i', strtotime($lamaran['created_at'])) ?> WIB</div>
            </div>
            <?php if ($lamaran['updated_at'] && $lamaran['updated_at'] != $lamaran['created_at']): ?>
                <div class="info-item">
                    <div class="label">Terakhir Diupdate</div>
                    <div class="value"><?= date('d F Y, H:i', strtotime($lamaran['updated_at'])) ?> WIB</div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="detail-section">
        <h3><i class="fas fa-user"></i> Data Pelamar</h3>
        <div class="info-grid">
            <div class="info-item">
                <div class="label">Nama Lengkap</div>
                <div class="value"><?= esc($lamaran['nama_user']) ?></div>
            </div>
            <div class="info-item">
                <div class="label">Email</div>
                <div class="value"><?= esc($lamaran['email']) ?></div>
            </div>
            <?php if ($lamaran['nomor_hp']): ?>
                <div class="info-item">
                    <div class="label">Nomor HP</div>
                    <div class="value"><?= esc($lamaran['nomor_hp']) ?></div>
                </div>
            <?php endif; ?>
            <?php if ($lamaran['pendidikan_terakhir']): ?>
                <div class="info-item">
                    <div class="label">Pendidikan</div>
                    <div class="value"><?= esc($lamaran['pendidikan_terakhir']) ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
