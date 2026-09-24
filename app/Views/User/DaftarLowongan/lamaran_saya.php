<style>
    .page-header {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 30px;
        text-align: center;
    }

    .page-header h2 {
        color: var(--gold-light);
        font-size: 28px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .page-header p {
        color: #b8ae9a;
        font-size: 15px;
    }

    .lamaran-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 20px;
    }

    .lamaran-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        transition: all 0.3s;
    }

    .lamaran-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.2);
        border-color: var(--gold);
    }

    .lamaran-header {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .lamaran-icon {
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

    .lamaran-title {
        flex: 1;
    }

    .lamaran-title h3 {
        color: #f0ece4;
        font-size: 18px;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .lamaran-title p {
        color: #9c927e;
        font-size: 13px;
    }

    .lamaran-info {
        margin-bottom: 15px;
    }

    .info-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        color: #b8ae9a;
        font-size: 14px;
    }

    .info-row i {
        color: var(--gold);
        width: 16px;
        text-align: center;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-pending {
        background: rgba(255, 152, 0, 0.15);
        color: #ffb74d;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .status-inreview {
        background: rgba(33, 150, 243, 0.15);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .status-diterima {
        background: rgba(76, 175, 80, 0.15);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .status-ditolak {
        background: rgba(183, 28, 28, 0.15);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

    .lamaran-actions {
        display: flex;
        gap: 10px;
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
        flex: 1;
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

    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 15px;
        border: 1px dashed rgba(212, 175, 55, 0.3);
    }

    .empty-state i {
        font-size: 48px;
        color: var(--gold-dark);
        opacity: 0.5;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        color: var(--gold-light);
        margin-bottom: 12px;
        font-size: 1.3rem;
    }

    .empty-state p {
        color: #9c927e;
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .lamaran-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <h2><i class="fas fa-file-alt"></i> Lamaran Saya</h2>
    <p>Daftar lamaran yang sudah Anda kirimkan</p>
</div>

<div class="lamaran-grid">
    <?php if (!empty($lamaranList)): ?>
        <?php foreach ($lamaranList as $lamaran): ?>
            <div class="lamaran-card">
                <div class="lamaran-header">
                    <div class="lamaran-icon">
                        <i class="fas <?= $lamaran['icon'] ? esc($lamaran['icon']) : 'fa-briefcase' ?>"></i>
                    </div>
                    <div class="lamaran-title">
                        <h3><?= esc($lamaran['judul_loker']) ?></h3>
                        <?php if ($lamaran['divisi']): ?>
                            <p><?= esc($lamaran['divisi']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="lamaran-info">
                    <?php if ($lamaran['sistem_kerja']): ?>
                        <div class="info-row">
                            <i class="fas fa-clock"></i>
                            <span><?= esc($lamaran['sistem_kerja']) ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="info-row">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Dilamar: <?= date('d M Y, H:i', strtotime($lamaran['created_at'])) ?></span>
                    </div>
                    
                    <div class="info-row">
                        <i class="fas fa-info-circle"></i>
                        <span>Status: 
                            <?php
                                $statusClass = 'status-' . $lamaran['status_lamaran'];
                                $statusText = [
                                    'pending' => 'Menunggu',
                                    'inreview' => 'Dalam Review',
                                    'diterima' => 'Diterima',
                                    'ditolak' => 'Ditolak'
                                ];
                            ?>
                            <span class="status-badge <?= $statusClass ?>">
                                <?= $statusText[$lamaran['status_lamaran']] ?? 'Unknown' ?>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="lamaran-actions">
                    <a href="<?= base_url('user/lamaran/detail/' . $lamaran['idkirim_lamaran']) ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h3>Belum Ada Lamaran</h3>
            <p>Anda belum mengirim lamaran ke lowongan manapun.</p>
            <a href="<?= base_url('user/lowongan') ?>" class="btn btn-primary" style="display: inline-flex;">
                <i class="fas fa-briefcase"></i> Lihat Lowongan
            </a>
        </div>
    <?php endif; ?>
</div>
