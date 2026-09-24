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

    .alert {
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fadeInUp 0.5s ease;
    }

    .alert-success {
        background: rgba(76, 175, 80, 0.15);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .alert-error {
        background: rgba(183, 28, 28, 0.15);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

    .loker-detail-header {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 35px;
        margin-bottom: 25px;
    }

    .header-top {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 20px;
    }

    .detail-icon {
        width: 70px;
        height: 70px;
        border-radius: 15px;
        background: rgba(212, 175, 55, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: var(--gold);
        flex-shrink: 0;
        border: 2px solid rgba(212, 175, 55, 0.3);
    }

    .header-content {
        flex: 1;
    }

    .header-content h1 {
        color: var(--gold-light);
        font-size: 28px;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .header-content p {
        color: #9c927e;
        font-size: 15px;
    }

    .meta-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .meta-item {
        padding: 15px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 10px;
        border: 1px solid rgba(212, 175, 55, 0.1);
    }

    .meta-item .label {
        color: #9c927e;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .meta-item .value {
        color: #f0ece4;
        font-size: 16px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .meta-item .value i {
        color: var(--gold);
        font-size: 18px;
    }

    .detail-section {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 25px;
    }

    .detail-section h2 {
        color: var(--gold-light);
        font-size: 20px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .detail-section h2 i {
        color: var(--gold);
    }

    .detail-section p,
    .detail-section ul {
        color: #b8ae9a;
        font-size: 15px;
        line-height: 1.8;
    }

    .detail-section ul {
        list-style: none;
        padding-left: 0;
    }

    .detail-section ul li {
        padding-left: 25px;
        position: relative;
        margin-bottom: 10px;
    }

    .detail-section ul li:before {
        content: "✓";
        position: absolute;
        left: 0;
        color: var(--gold);
        font-weight: bold;
    }

    .action-bar {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        display: flex;
        gap: 15px;
        align-items: center;
        position: sticky;
        bottom: 20px;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.5);
    }

    .action-bar-text {
        flex: 1;
    }

    .action-bar-text h3 {
        color: #f0ece4;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .action-bar-text p {
        color: #9c927e;
        font-size: 13px;
    }

    .btn {
        padding: 12px 28px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        border: none;
        white-space: nowrap;
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

    .btn-primary:disabled {
        background: rgba(255, 255, 255, 0.1);
        color: #6b6050;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .btn-primary:disabled:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: none;
    }

    .info-box {
        background: rgba(33, 150, 243, 0.1);
        border: 1px solid rgba(33, 150, 243, 0.3);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-top: 20px;
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

    @media (max-width: 768px) {
        .header-top {
            flex-direction: column;
            text-align: center;
        }

        .detail-icon {
            margin: 0 auto;
        }

        .meta-grid {
            grid-template-columns: 1fr;
        }

        .action-bar {
            flex-direction: column;
            text-align: center;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <span><?= session()->getFlashdata('success') ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i>
        <span><?= session()->getFlashdata('error') ?></span>
    </div>
<?php endif; ?>

<div class="detail-container">
    <div class="back-nav">
        <a href="<?= base_url('user/lowongan') ?>" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Lowongan
        </a>
    </div>

    <div class="loker-detail-header">
        <div class="header-top">
            <div class="detail-icon">
                <i class="fas <?= $loker['icon'] ? esc($loker['icon']) : 'fa-briefcase' ?>"></i>
            </div>
            <div class="header-content">
                <h1><?= esc($loker['judul_loker']) ?></h1>
                <p><?= $loker['keterangan_singkat'] ? esc($loker['keterangan_singkat']) : 'Lowongan Kerja di 88 Group' ?></p>
            </div>
        </div>

        <div class="meta-grid">
            <?php if ($loker['divisi']): ?>
                <div class="meta-item">
                    <div class="label">Divisi</div>
                    <div class="value">
                        <i class="fas fa-building"></i>
                        <?= esc($loker['divisi']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($loker['sistem_kerja']): ?>
                <div class="meta-item">
                    <div class="label">Sistem Kerja</div>
                    <div class="value">
                        <i class="fas fa-clock"></i>
                        <?= esc($loker['sistem_kerja']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($loker['Penempatan']): ?>
                <div class="meta-item">
                    <div class="label">Penempatan</div>
                    <div class="value">
                        <i class="fas fa-map-marker-alt"></i>
                        <?= esc($loker['Penempatan']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($loker['active_until']): ?>
                <div class="meta-item">
                    <div class="label">Deadline Lamaran</div>
                    <div class="value">
                        <i class="fas fa-calendar-alt"></i>
                        <?= date('d M Y', strtotime($loker['active_until'])) ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($loker['keterangan_lengkap']): ?>
        <div class="detail-section">
            <h2><i class="fas fa-file-alt"></i> Deskripsi Pekerjaan</h2>
            <div style="color: #b8ae9a; line-height: 1.8;">
                <?= nl2br(esc($loker['keterangan_lengkap'])) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($persyaratanList)): ?>
        <div class="detail-section">
            <h2><i class="fas fa-clipboard-check"></i> Persyaratan</h2>
            <ul>
                <?php foreach ($persyaratanList as $persyaratan): ?>
                    <li><?= esc($persyaratan['persyaratan']) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="detail-section">
        <h2><i class="fas fa-user-check"></i> Status Kelengkapan Data Anda</h2>
        <p style="margin-bottom: 15px;">Pastikan data Anda sudah lengkap sebelum melamar:</p>
        
        <?php
            $userModel = new \App\Models\WebProfile\UserUmumModel();
            $userData = $userModel->find(session()->get('iduser_umum'));
            
            $requiredFields = [
                'nomor_hp' => ['label' => 'Nomor HP', 'icon' => 'fa-phone'],
                'pendidikan_terakhir' => ['label' => 'Pendidikan Terakhir', 'icon' => 'fa-graduation-cap'],
                'instansi_pendidikan_terakhir' => ['label' => 'Instansi Pendidikan', 'icon' => 'fa-university'],
                'scan_cv' => ['label' => 'CV', 'icon' => 'fa-file-alt'],
                'scan_ijazah' => ['label' => 'Ijazah', 'icon' => 'fa-certificate'],
                'scan_transkrip' => ['label' => 'Transkrip Nilai', 'icon' => 'fa-file-text'],
                'scan_ktp' => ['label' => 'KTP', 'icon' => 'fa-id-card'],
                'foto_profile' => ['label' => 'Foto Profil', 'icon' => 'fa-user-circle']
            ];
            
            $completedCount = 0;
            $totalCount = count($requiredFields);
        ?>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 12px; margin-bottom: 20px;">
            <?php foreach ($requiredFields as $field => $info): ?>
                <?php 
                    $isCompleted = !empty($userData[$field]);
                    if ($isCompleted) $completedCount++;
                ?>
                <div style="display: flex; align-items: center; gap: 10px; padding: 12px; background: rgba(212, 175, 55, 0.05); border-radius: 8px; border: 1px solid rgba(212, 175, 55, 0.1);">
                    <i class="fas <?= $info['icon'] ?>" style="color: <?= $isCompleted ? '#81c784' : '#9c927e' ?>; font-size: 18px; width: 20px; text-align: center;"></i>
                    <div style="flex: 1;">
                        <div style="color: #f0ece4; font-size: 13px; font-weight: 600; margin-bottom: 2px;"><?= $info['label'] ?></div>
                        <div style="font-size: 11px; color: <?= $isCompleted ? '#81c784' : '#ef5350' ?>; font-weight: 600;">
                            <?= $isCompleted ? '✓ Sudah Dilengkapi' : '✗ Belum Dilengkapi' ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <?php 
            $percentage = ($completedCount / $totalCount) * 100;
            $isComplete = $completedCount === $totalCount;
        ?>
        
        <div style="margin-bottom: 15px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                <span style="color: #f0ece4; font-size: 14px; font-weight: 600;">Kelengkapan Data</span>
                <span style="color: var(--gold); font-size: 14px; font-weight: 700;"><?= $completedCount ?>/<?= $totalCount ?> (<?= round($percentage) ?>%)</span>
            </div>
            <div style="width: 100%; height: 10px; background: rgba(255, 255, 255, 0.05); border-radius: 10px; overflow: hidden;">
                <div style="width: <?= $percentage ?>%; height: 100%; background: <?= $isComplete ? 'linear-gradient(90deg, #81c784, #66bb6a)' : 'linear-gradient(90deg, var(--gold-dark), var(--gold))' ?>; transition: width 0.3s;"></div>
            </div>
        </div>

        <?php if (!$isComplete): ?>
            <div class="info-box" style="margin-top: 15px;">
                <i class="fas fa-exclamation-circle" style="color: #ffb74d;"></i>
                <div class="info-box-content">
                    <h4 style="color: #ffb74d;">Data Anda Belum Lengkap</h4>
                    <p>Lengkapi data Anda terlebih dahulu di menu <strong>Profil Saya</strong> sebelum melamar lowongan ini. Data yang lengkap akan meningkatkan peluang lamaran Anda diterima.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="info-box" style="background: rgba(76, 175, 80, 0.1); border: 1px solid rgba(76, 175, 80, 0.3);">
                <i class="fas fa-check-circle" style="color: #81c784;"></i>
                <div class="info-box-content">
                    <h4 style="color: #81c784;">Data Anda Sudah Lengkap</h4>
                    <p>Selamat! Semua data yang diperlukan sudah lengkap. Anda dapat langsung melamar lowongan ini dengan klik tombol <strong>Lamar Sekarang</strong> di bawah.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="action-bar">
        <div class="action-bar-text">
            <h3>Tertarik dengan posisi ini?</h3>
            <p><?= $hasApplied ? 'Anda sudah melamar lowongan ini' : 'Klik tombol di samping untuk mengirim lamaran Anda' ?></p>
        </div>
        <?php if ($hasApplied): ?>
            <button class="btn btn-primary" disabled>
                <i class="fas fa-check-circle"></i> Sudah Melamar
            </button>
        <?php else: ?>
            <?php if (empty($userData['nomor_hp'])): ?>
                <a href="<?= base_url('user/profile') ?>" class="btn btn-primary" style="background: rgba(255, 152, 0, 0.3); color: #ffb74d;">
                    <i class="fas fa-exclamation-triangle"></i> Lengkapi Profil
                </a>
            <?php else: ?>
                <form action="<?= base_url('user/lamaran/submit/' . $loker['idloker']) ?>" method="post" style="margin: 0;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin melamar lowongan ini?')">
                        <i class="fas fa-paper-plane"></i> Lamar Sekarang
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
