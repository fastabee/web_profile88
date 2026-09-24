<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Pelamar</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 24px;
            background: #fff;
        }
        .header {
            margin-bottom: 24px;
            border-bottom: 2px solid #d4af37;
            padding-bottom: 12px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #1d1d1d;
        }
        .meta {
            margin-top: 10px;
            font-size: 12px;
            color: #4b5563;
        }
        .section {
            margin-top: 22px;
        }
        .section h3 {
            margin: 0 0 12px;
            font-size: 16px;
            color: #111827;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 6px;
        }
        .grid {
            display: block;
        }
        .item {
            margin-bottom: 10px;
            font-size: 12px;
            line-height: 1.5;
        }
        .label {
            display: inline-block;
            width: 180px;
            font-weight: bold;
            color: #374151;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            background: #ecfdf5;
            color: #047857;
            font-size: 11px;
            font-weight: bold;
        }
        .document-box {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px;
            margin-top: 10px;
            background: #fafafa;
        }
        .document-box a {
            color: #1d4ed8;
            text-decoration: none;
        }
        .small {
            font-size: 11px;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Dokumen Pelamar</h1>
        <div class="meta">
            Lowongan: <?= esc($lamaran['judul_loker'] ?? '-') ?> · Divisi: <?= esc($lamaran['divisi'] ?? '-') ?>
        </div>
    </div>

    <div class="section">
        <h3>Data Pribadi</h3>
        <div class="grid">
            <div class="item"><span class="label">Nama</span>: <?= esc($lamaran['nama_user'] ?? '-') ?></div>
            <div class="item"><span class="label">Email</span>: <?= esc($lamaran['email'] ?? '-') ?></div>
            <div class="item"><span class="label">Nomor HP</span>: <?= esc($lamaran['nomor_hp'] ?? '-') ?></div>
            <div class="item"><span class="label">Pendidikan Terakhir</span>: <?= esc($lamaran['pendidikan_terakhir'] ?? '-') ?></div>
            <div class="item"><span class="label">Instansi Pendidikan</span>: <?= esc($lamaran['instansi_pendidikan_terakhir'] ?? '-') ?></div>
            <div class="item"><span class="label">Status Lamaran</span>: <span class="badge"><?= esc($lamaran['status_lamaran'] ?? 'pending') ?></span></div>
            <div class="item"><span class="label">Tanggal Lamar</span>: <?= esc(date('d M Y', strtotime($lamaran['created_at'] ?? 'now'))) ?></div>
        </div>
    </div>

    <div class="section">
        <h3>Dokumen Pendukung</h3>
        <div class="document-box">
            <?php
                $docs = [
                    ['label' => 'Foto Profil', 'path' => $lamaran['foto_profile'] ?? null, 'folder' => 'profile'],
                    ['label' => 'CV', 'path' => $lamaran['scan_cv'] ?? null, 'folder' => 'documents'],
                    ['label' => 'KTP', 'path' => $lamaran['scan_ktp'] ?? null, 'folder' => 'documents'],
                    ['label' => 'Ijazah', 'path' => $lamaran['scan_ijazah'] ?? null, 'folder' => 'documents'],
                    ['label' => 'Transkrip', 'path' => $lamaran['scan_transkrip'] ?? null, 'folder' => 'documents'],
                ];
            ?>

            <?php foreach ($docs as $doc): ?>
                <div class="item">
                    <span class="label"><?= esc($doc['label']) ?></span>:
                    <?php if (!empty($doc['path'])): ?>
                        <a href="<?= esc(base_url('uploads/' . $doc['folder'] . '/' . $doc['path'])) ?>" target="_blank">
                            <?= esc($doc['path']) ?>
                        </a>
                    <?php else: ?>
                        <span class="small">Tidak ada</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
