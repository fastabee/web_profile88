<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.2);
    }

    .page-header h2 {
        color: var(--gold-light);
        font-size: 24px;
        margin: 0;
    }

    .loker-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
    }

    .loker-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        transition: all 0.3s;
        cursor: pointer;
    }

    .loker-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.2);
        border-color: var(--gold);
    }

    .loker-header {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .loker-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: rgba(212, 175, 55, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--gold);
        flex-shrink: 0;
    }

    .loker-title h3 {
        color: #f0ece4;
        font-size: 18px;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .loker-title p {
        color: #9c927e;
        font-size: 13px;
    }

    .loker-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin-bottom: 15px;
    }

    .stat-item {
        padding: 12px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .stat-item i {
        color: var(--gold);
        font-size: 18px;
    }

    .stat-info {
        flex: 1;
    }

    .stat-info .label {
        color: #9c927e;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .stat-info .value {
        color: #f0ece4;
        font-size: 20px;
        font-weight: 700;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        border: none;
        width: 100%;
    }

    .btn-primary {
        background: var(--gold);
        color: #1a1008;
        box-shadow: 0 4px 10px rgba(212, 175, 55, 0.3);
    }

    .btn-primary:hover {
        background: var(--gold-light);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(212, 175, 55, 0.4);
    }

    @media (max-width: 768px) {
        .loker-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h2><i class="fas fa-users"></i> Daftar Pelamar per Lowongan</h2>
</div>

<div class="loker-grid">
    <?php if (!empty($lokerList)): ?>
        <?php foreach ($lokerList as $loker): ?>
            <div class="loker-card" onclick="window.location='<?= base_url('admin/pelamar/detail/' . $loker['idloker']) ?>'">
                <div class="loker-header">
                    <div class="loker-icon">
                        <i class="fas <?= $loker['icon'] ? esc($loker['icon']) : 'fa-briefcase' ?>"></i>
                    </div>
                    <div class="loker-title">
                        <h3><?= esc($loker['judul_loker']) ?></h3>
                        <?php if ($loker['divisi']): ?>
                            <p><?= esc($loker['divisi']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="loker-stats">
                    <div class="stat-item">
                        <i class="fas fa-users"></i>
                        <div class="stat-info">
                            <div class="label">Pelamar</div>
                            <div class="value"><?= $loker['jumlah_pelamar'] ?></div>
                        </div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-calendar-alt"></i>
                        <div class="stat-info">
                            <div class="label">Dibuat</div>
                            <div class="value" style="font-size: 14px;"><?= date('d M Y', strtotime($loker['created_at'])) ?></div>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('admin/pelamar/detail/' . $loker['idloker']) ?>" class="btn btn-primary" onclick="event.stopPropagation()">
                    <i class="fas fa-eye"></i> Lihat Pelamar
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px; background: rgba(212, 175, 55, 0.05); border-radius: 15px;">
            <i class="fas fa-inbox" style="font-size: 48px; color: var(--gold-dark); opacity: 0.5; margin-bottom: 20px;"></i>
            <h3 style="color: var(--gold-light); margin-bottom: 12px;">Belum Ada Lowongan</h3>
            <p style="color: #9c927e;">Silakan buat lowongan terlebih dahulu.</p>
        </div>
    <?php endif; ?>
</div>
