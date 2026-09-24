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

    .back-btn {
        padding: 10px 20px;
        background: rgba(255, 255, 255, 0.05);
        color: #b8ae9a;
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 8px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--gold);
    }

    .table-container {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: rgba(212, 175, 55, 0.1);
    }

    thead th {
        padding: 16px !important;
        text-align: left;
        font-weight: 600;
        color: var(--gold-light) !important;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.2) !important;
    }

    tbody td {
        padding: 14px 16px !important;
        color: #b8ae9a;
        font-size: 14px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1) !important;
        vertical-align: middle;
    }

    tbody tr {
        transition: background 0.3s;
    }

    tbody tr:hover {
        background: rgba(212, 175, 55, 0.05);
    }

    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
    }

    .badge-complete {
        background: rgba(76, 175, 80, 0.2);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .badge-incomplete {
        background: rgba(255, 152, 0, 0.2);
        color: #ffb74d;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .status-badge {
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

    .btn {
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        border: none;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 11px;
    }

    .btn-primary {
        background: var(--gold);
        color: #1a1008;
    }

    .btn-primary:hover {
        background: var(--gold-light);
        transform: translateY(-2px);
    }

    .btn-info {
        background: rgba(33, 150, 243, 0.2);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .btn-info:hover {
        background: rgba(33, 150, 243, 0.3);
    }

    .btn-success {
        background: rgba(76, 175, 80, 0.2);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .btn-success:hover {
        background: rgba(76, 175, 80, 0.3);
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.3);
        padding: 30px;
        max-width: 800px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.2);
    }

    .modal-header h3 {
        color: var(--gold-light);
        font-size: 20px;
        margin: 0;
    }

    .close-modal {
        background: rgba(183, 28, 28, 0.2);
        color: var(--red-bright);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .close-modal:hover {
        background: rgba(183, 28, 28, 0.3);
        transform: rotate(90deg);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
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

    .dokumen-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 12px;
    }

    .dokumen-item {
        padding: 12px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 8px;
        text-align: center;
    }

    .dokumen-item i {
        font-size: 24px;
        color: var(--gold);
        margin-bottom: 8px;
    }

    .dokumen-item .label {
        color: #9c927e;
        font-size: 11px;
        margin-bottom: 8px;
    }
</style>

<div class="page-header">
    <div>
        <a href="<?= base_url('admin/pelamar') ?>" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <h2><?= esc($loker['judul_loker']) ?> - <?= count($pelamarList) ?> Pelamar</h2>
</div>

<div class="table-container">
    <?php if (!empty($pelamarList)): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelamar</th>
                    <th>Email / HP</th>
                    <th>Pendidikan</th>
                    <th>Kelengkapan</th>
                    <th>Status</th>
                    <th>Tanggal Lamar</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pelamarList as $index => $pelamar): ?>
                    <?php
                        // Calculate completeness
                        $requiredFields = ['nomor_hp', 'pendidikan_terakhir', 'instansi_pendidikan_terakhir', 'scan_cv', 'scan_ijazah', 'scan_transkrip', 'scan_ktp', 'foto_profile'];
                        $completedCount = 0;
                        foreach ($requiredFields as $field) {
                            if (!empty($pelamar[$field])) $completedCount++;
                        }
                        $percentage = round(($completedCount / count($requiredFields)) * 100);
                        $isComplete = $percentage == 100;
                    ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td>
                            <strong style="color: #f0ece4;"><?= esc($pelamar['nama_user']) ?></strong>
                        </td>
                        <td>
                            <?= esc($pelamar['email']) ?><br>
                            <small><?= $pelamar['nomor_hp'] ? esc($pelamar['nomor_hp']) : '<span style="color: #6b6050;">-</span>' ?></small>
                        </td>
                        <td>
                            <?= $pelamar['pendidikan_terakhir'] ? esc($pelamar['pendidikan_terakhir']) : '<span style="color: #6b6050;">-</span>' ?>
                            <?php if ($pelamar['instansi_pendidikan_terakhir']): ?>
                                <br><small style="color: #9c927e;"><?= esc(substr($pelamar['instansi_pendidikan_terakhir'], 0, 30)) ?></small>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="badge <?= $isComplete ? 'badge-complete' : 'badge-incomplete' ?>">
                                <?= $percentage ?>% (<?= $completedCount ?>/<?= count($requiredFields) ?>)
                            </span>
                        </td>
                        <td>
                            <select class="status-badge status-<?= $pelamar['status_lamaran'] ?>" 
                                    onchange="updateStatus(<?= $pelamar['idkirim_lamaran'] ?>, this.value)"
                                    style="border: none; background: transparent; cursor: pointer; font-weight: 600;">
                                <option value="pending" <?= $pelamar['status_lamaran'] == 'pending' ? 'selected' : '' ?>>Menunggu</option>
                                <option value="inreview" <?= $pelamar['status_lamaran'] == 'inreview' ? 'selected' : '' ?>>Review</option>
                                <option value="diterima" <?= $pelamar['status_lamaran'] == 'diterima' ? 'selected' : '' ?>>Diterima</option>
                                <option value="ditolak" <?= $pelamar['status_lamaran'] == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            </select>
                        </td>
                        <td><?= date('d M Y', strtotime($pelamar['created_at'])) ?></td>
                        <td style="text-align: center;">
                            <div class="action-buttons">
                                <button class="btn btn-sm btn-info" onclick='openModal(<?= json_encode($pelamar, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>
                                    <i class="fas fa-eye"></i> Lihat
                                </button>
                                <a href="<?= base_url('admin/pelamar/cetak/' . $pelamar['idkirim_lamaran']) ?>" class="btn btn-sm btn-success" target="_blank">
                                    <i class="fas fa-print"></i> Cetak
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div style="text-align: center; padding: 60px 20px;">
            <i class="fas fa-inbox" style="font-size: 48px; color: var(--gold-dark); opacity: 0.5; margin-bottom: 20px;"></i>
            <h3 style="color: var(--gold-light); margin-bottom: 12px;">Belum Ada Pelamar</h3>
            <p style="color: #9c927e;">Lowongan ini belum memiliki pelamar.</p>
        </div>
    <?php endif; ?>
</div>

<!-- Modal Detail Pelamar -->
<div class="modal" id="pelamarModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Detail Pelamar</h3>
            <button class="close-modal" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div id="modalBody"></div>
    </div>
</div>

<script>
    function calculateAge(birthDate) {
        const today = new Date();
        const birth = new Date(birthDate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        
        return age;
    }

    function openModal(pelamar) {
        const modal = document.getElementById('pelamarModal');
        const modalBody = document.getElementById('modalBody');
        
        const requiredFields = ['nomor_hp', 'pendidikan_terakhir', 'instansi_pendidikan_terakhir', 'scan_cv', 'scan_ijazah', 'scan_transkrip', 'scan_ktp', 'foto_profile'];
        let completedCount = 0;
        requiredFields.forEach(field => {
            if (pelamar[field]) completedCount++;
        });
        const percentage = Math.round((completedCount / requiredFields.length) * 100);
        
        modalBody.innerHTML = `
            <h4 style="color: var(--gold-light); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-user"></i> Informasi Pribadi
            </h4>
            <div class="info-grid">
                <div class="info-item">
                    <div class="label">Nama Lengkap</div>
                    <div class="value">${pelamar.nama_user || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Email</div>
                    <div class="value">${pelamar.email || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Nomor HP</div>
                    <div class="value">${pelamar.nomor_hp || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Tempat Lahir</div>
                    <div class="value">${pelamar.tempat_lahir || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Tanggal Lahir</div>
                    <div class="value">${pelamar.tanggal_lahir ? new Date(pelamar.tanggal_lahir).toLocaleDateString('id-ID', {day: '2-digit', month: 'long', year: 'numeric'}) : '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Umur</div>
                    <div class="value">${pelamar.tanggal_lahir ? calculateAge(pelamar.tanggal_lahir) + ' Tahun' : '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Domisili</div>
                    <div class="value">${pelamar.domisili || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Kelengkapan Data</div>
                    <div class="value">${percentage}%</div>
                </div>
            </div>

            <h4 style="color: var(--gold-light); margin: 25px 0 15px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-graduation-cap"></i> Pendidikan
            </h4>
            <div class="info-grid">
                <div class="info-item">
                    <div class="label">Pendidikan Terakhir</div>
                    <div class="value">${pelamar.pendidikan_terakhir || '-'}</div>
                </div>
                <div class="info-item">
                    <div class="label">Instansi</div>
                    <div class="value">${pelamar.instansi_pendidikan_terakhir || '-'}</div>
                </div>
            </div>

            <h4 style="color: var(--gold-light); margin: 25px 0 15px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-clipboard-check"></i> Status Lamaran
            </h4>
            <div style="padding: 20px; background: rgba(212, 175, 55, 0.05); border-radius: 10px; margin-bottom: 25px;">
                <div style="margin-bottom: 12px;">
                    <label style="display: block; color: #9c927e; font-size: 13px; font-weight: 600; margin-bottom: 8px;">Update Status Lamaran:</label>
                    <select id="statusSelect_${pelamar.idkirim_lamaran}" class="status-badge status-${pelamar.status_lamaran}" 
                            style="width: 100%; padding: 10px 14px; border: 1px solid rgba(212, 175, 55, 0.3); border-radius: 8px; background: rgba(26, 16, 8, 0.8); cursor: pointer; font-weight: 600; font-size: 14px;">
                        <option value="pending" ${pelamar.status_lamaran === 'pending' ? 'selected' : ''}>Menunggu</option>
                        <option value="inreview" ${pelamar.status_lamaran === 'inreview' ? 'selected' : ''}>Review</option>
                        <option value="diterima" ${pelamar.status_lamaran === 'diterima' ? 'selected' : ''}>Diterima</option>
                        <option value="ditolak" ${pelamar.status_lamaran === 'ditolak' ? 'selected' : ''}>Ditolak</option>
                    </select>
                </div>
                <button onclick="updateStatusFromModal(${pelamar.idkirim_lamaran})" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    <i class="fas fa-save"></i> Simpan Status
                </button>
            </div>

            <h4 style="color: var(--gold-light); margin: 25px 0 15px; display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-file"></i> Dokumen
            </h4>
            <div class="dokumen-grid">
                ${pelamar.foto_profile ? `
                    <div class="dokumen-item">
                        <i class="fas fa-user-circle"></i>
                        <div class="label">Foto Profil</div>
                        <a href="<?= base_url('uploads/profile/') ?>${pelamar.foto_profile}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                ` : '<div class="dokumen-item"><i class="fas fa-user-circle" style="opacity: 0.3;"></i><div class="label">Foto Profil</div><small style="color: #6b6050;">Tidak Ada</small></div>'}
                
                ${pelamar.scan_cv ? `
                    <div class="dokumen-item">
                        <i class="fas fa-file-alt"></i>
                        <div class="label">CV</div>
                        <a href="<?= base_url('uploads/documents/') ?>${pelamar.scan_cv}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                ` : '<div class="dokumen-item"><i class="fas fa-file-alt" style="opacity: 0.3;"></i><div class="label">CV</div><small style="color: #6b6050;">Tidak Ada</small></div>'}
                
                ${pelamar.scan_ktp ? `
                    <div class="dokumen-item">
                        <i class="fas fa-id-card"></i>
                        <div class="label">KTP</div>
                        <a href="<?= base_url('uploads/documents/') ?>${pelamar.scan_ktp}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                ` : '<div class="dokumen-item"><i class="fas fa-id-card" style="opacity: 0.3;"></i><div class="label">KTP</div><small style="color: #6b6050;">Tidak Ada</small></div>'}
                
                ${pelamar.scan_ijazah ? `
                    <div class="dokumen-item">
                        <i class="fas fa-certificate"></i>
                        <div class="label">Ijazah</div>
                        <a href="<?= base_url('uploads/documents/') ?>${pelamar.scan_ijazah}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                ` : '<div class="dokumen-item"><i class="fas fa-certificate" style="opacity: 0.3;"></i><div class="label">Ijazah</div><small style="color: #6b6050;">Tidak Ada</small></div>'}
                
                ${pelamar.scan_transkrip ? `
                    <div class="dokumen-item">
                        <i class="fas fa-file-text"></i>
                        <div class="label">Transkrip</div>
                        <a href="<?= base_url('uploads/documents/') ?>${pelamar.scan_transkrip}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                ` : '<div class="dokumen-item"><i class="fas fa-file-text" style="opacity: 0.3;"></i><div class="label">Transkrip</div><small style="color: #6b6050;">Tidak Ada</small></div>'}
            </div>
        `;
        
        modal.classList.add('active');
    }

    function closeModal() {
        document.getElementById('pelamarModal').classList.remove('active');
    }

    function updateStatusFromModal(idlamaran) {
        const selectElement = document.getElementById('statusSelect_' + idlamaran);
        const status = selectElement.value;
        
        if (!confirm('Apakah Anda yakin ingin mengubah status lamaran ini?')) {
            return;
        }
        
        fetch('<?= base_url('admin/pelamar/update-status') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `idlamaran=${idlamaran}&status=${status}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Status berhasil diupdate');
                location.reload();
            } else {
                alert('Gagal update status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengupdate status');
        });
    }

    function updateStatus(idlamaran, status) {
        fetch('<?= base_url('admin/pelamar/update-status') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `idlamaran=${idlamaran}&status=${status}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Status berhasil diupdate');
                location.reload();
            } else {
                alert('Gagal update status');
            }
        });
    }

    document.getElementById('pelamarModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
