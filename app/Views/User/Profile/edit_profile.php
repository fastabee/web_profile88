<style>
    .profile-container {
        max-width: 900px;
        margin: 0 auto;
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

    .profile-header {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        margin-bottom: 30px;
        text-align: center;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 20px;
        border: 3px solid var(--gold);
        overflow: hidden;
        background: linear-gradient(135deg, var(--gold), var(--gold-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        color: #1a1008;
        font-weight: 700;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-header h2 {
        color: var(--gold-light);
        font-size: 24px;
        margin-bottom: 5px;
    }

    .profile-header p {
        color: #9c927e;
        font-size: 14px;
    }

    .profile-form {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
    }

    .form-section {
        margin-bottom: 30px;
        padding-bottom: 30px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .form-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .form-section h3 {
        color: var(--gold-light);
        font-size: 18px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section h3 i {
        color: var(--gold);
    }

    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-row.full {
        grid-template-columns: 1fr;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        color: #f0ece4;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 14px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid #3d2410;
        border-radius: 8px;
        color: #f0ece4;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-group select {
        background: rgba(255, 255, 255, 0.05);
        color: #f0ece4;
    }

    .form-group select option {
        background: #1a1008;
        color: #f0ece4;
        padding: 10px;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--gold-dark);
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #6b6050;
    }

    .form-group small {
        display: block;
        color: #9c927e;
        font-size: 12px;
        margin-top: 5px;
    }

    .file-upload-info {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 8px;
        padding: 8px 12px;
        background: rgba(212, 175, 55, 0.05);
        border-radius: 6px;
        font-size: 13px;
        color: #b8ae9a;
    }

    .file-upload-info i {
        color: var(--gold);
    }

    .file-upload-info a {
        color: var(--gold);
        text-decoration: none;
    }

    .file-upload-info a:hover {
        text-decoration: underline;
    }

    .btn {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        border: none;
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

    .btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: #b8ae9a;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.08);
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid rgba(212, 175, 55, 0.1);
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
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

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <?php if (!empty($user['foto_profile'])): ?>
                <img src="<?= base_url('uploads/profile/' . $user['foto_profile']) ?>" alt="Profile">
            <?php else: ?>
                <?= strtoupper(substr($user['nama_user'], 0, 1)) ?>
            <?php endif; ?>
        </div>
        <h2><?= esc($user['nama_user']) ?></h2>
        <p><?= esc($user['email']) ?></p>
    </div>

    <div class="profile-form">
        <form action="<?= base_url('user/profile/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Informasi Pribadi -->
            <div class="form-section">
                <h3><i class="fas fa-user"></i> Informasi Pribadi</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_user">Nama Lengkap <span style="color: var(--red-bright);">*</span></label>
                        <input type="text" id="nama_user" name="nama_user" 
                               value="<?= esc($user['nama_user']) ?>" 
                               placeholder="Nama lengkap Anda" required>
                    </div>

                    <div class="form-group">
                        <label for="nomor_hp">Nomor HP / WhatsApp</label>
                        <input type="tel" id="nomor_hp" name="nomor_hp" 
                               value="<?= esc($user['nomor_hp'] ?? '') ?>" 
                               placeholder="08xxxxxxxxxx">
                        <small>Nomor HP akan digunakan untuk komunikasi terkait lamaran.</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email <span style="color: var(--red-bright);">*</span></label>
                        <input type="email" id="email" name="email" 
                               value="<?= esc($user['email']) ?>" 
                               placeholder="email@contoh.com" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" 
                               value="<?= esc($user['tempat_lahir'] ?? '') ?>" 
                               placeholder="Contoh: Jakarta">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                               value="<?= esc($user['tanggal_lahir'] ?? '') ?>">
                        <small>Tanggal lahir digunakan untuk data profil.</small>
                    </div>

                    <div class="form-group">
                        <label for="domisili">Domisili / Alamat Tinggal</label>
                        <input type="text" id="domisili" name="domisili" 
                               value="<?= esc($user['domisili'] ?? '') ?>" 
                               placeholder="Contoh: Bondowoso, Jawa Timur">
                        <small>Alamat tempat tinggal saat ini.</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" name="password" 
                               placeholder="Kosongkan jika tidak ingin mengubah password">
                        <small>Minimal 6 karakter. Kosongkan jika tidak ingin mengubah.</small>
                    </div>

                    <div class="form-group">
                        <label for="foto_profile">Foto Profile</label>
                        <input type="file" id="foto_profile" name="foto_profile" accept="image/*">
                        <small>Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                        <?php if (!empty($user['foto_profile'])): ?>
                            <div class="file-upload-info">
                                <i class="fas fa-check-circle"></i>
                                <span>File saat ini: <a href="<?= base_url('uploads/profile/' . $user['foto_profile']) ?>" target="_blank"><?= esc($user['foto_profile']) ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Pendidikan -->
            <div class="form-section">
                <h3><i class="fas fa-graduation-cap"></i> Pendidikan</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                        <select id="pendidikan_terakhir" name="pendidikan_terakhir">
                            <option value="">Pilih Pendidikan</option>
                            <option value="SD" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'SD' ? 'selected' : '' ?>>SD</option>
                            <option value="SMP" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
                            <option value="SMA/SMK" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
                            <option value="D3" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'D3' ? 'selected' : '' ?>>D3</option>
                            <option value="S1" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'S1' ? 'selected' : '' ?>>S1</option>
                            <option value="S2" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'S2' ? 'selected' : '' ?>>S2</option>
                            <option value="S3" <?= isset($user['pendidikan_terakhir']) && $user['pendidikan_terakhir'] == 'S3' ? 'selected' : '' ?>>S3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="instansi_pendidikan_terakhir">Nama Instansi Pendidikan</label>
                        <input type="text" id="instansi_pendidikan_terakhir" name="instansi_pendidikan_terakhir" 
                               value="<?= esc($user['instansi_pendidikan_terakhir'] ?? '') ?>" 
                               placeholder="Contoh: SMA Negeri 1 Bondowoso">
                    </div>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="form-section">
                <h3><i class="fas fa-file-upload"></i> Dokumen Pendukung</h3>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="scan_cv">Upload CV</label>
                        <input type="file" id="scan_cv" name="scan_cv" accept=".pdf,.doc,.docx">
                        <small>Format: PDF, DOC, DOCX. Maksimal 2MB</small>
                        <?php if (!empty($user['scan_cv'])): ?>
                            <div class="file-upload-info">
                                <i class="fas fa-check-circle"></i>
                                <span>File saat ini: <a href="<?= base_url('uploads/documents/' . $user['scan_cv']) ?>" target="_blank"><?= esc($user['scan_cv']) ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="scan_ktp">Upload KTP</label>
                        <input type="file" id="scan_ktp" name="scan_ktp" accept="image/*">
                        <small>Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                        <?php if (!empty($user['scan_ktp'])): ?>
                            <div class="file-upload-info">
                                <i class="fas fa-check-circle"></i>
                                <span>File saat ini: <a href="<?= base_url('uploads/documents/' . $user['scan_ktp']) ?>" target="_blank"><?= esc($user['scan_ktp']) ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="scan_ijazah">Upload Ijazah</label>
                        <input type="file" id="scan_ijazah" name="scan_ijazah" accept="image/*,.pdf">
                        <small>Format: JPG, PNG, PDF. Maksimal 2MB</small>
                        <?php if (!empty($user['scan_ijazah'])): ?>
                            <div class="file-upload-info">
                                <i class="fas fa-check-circle"></i>
                                <span>File saat ini: <a href="<?= base_url('uploads/documents/' . $user['scan_ijazah']) ?>" target="_blank"><?= esc($user['scan_ijazah']) ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="scan_transkrip">Upload Transkrip Nilai</label>
                        <input type="file" id="scan_transkrip" name="scan_transkrip" accept="image/*,.pdf">
                        <small>Format: JPG, PNG, PDF. Maksimal 2MB</small>
                        <?php if (!empty($user['scan_transkrip'])): ?>
                            <div class="file-upload-info">
                                <i class="fas fa-check-circle"></i>
                                <span>File saat ini: <a href="<?= base_url('uploads/documents/' . $user['scan_transkrip']) ?>" target="_blank"><?= esc($user['scan_transkrip']) ?></a></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="<?= base_url('user/dashboard') ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
