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

    .btn {
        padding: 10px 20px;
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

    .btn-sm {
        padding: 6px 12px;
        font-size: 12px;
    }

    .btn-warning {
        background: rgba(255, 193, 7, 0.2);
        color: #ffc107;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }

    .btn-warning:hover {
        background: rgba(255, 193, 7, 0.3);
    }

    .btn-danger {
        background: rgba(183, 28, 28, 0.2);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

    .btn-danger:hover {
        background: rgba(183, 28, 28, 0.3);
    }

    .btn-success {
        background: rgba(76, 175, 80, 0.2);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .btn-success:hover {
        background: rgba(76, 175, 80, 0.3);
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

    .table-container {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        padding: 20px;
    }

    .dataTables_wrapper {
        color: #b8ae9a;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 20px;
        display: inline-block;
    }

    .dataTables_wrapper .dataTables_length {
        float: left;
    }

    .dataTables_wrapper .dataTables_filter {
        float: right;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        color: #f0ece4;
        font-size: 14px;
        font-weight: normal;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid #3d2410;
        border-radius: 6px;
        color: #f0ece4;
        padding: 6px 10px;
        margin: 0 8px;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        outline: none;
        border-color: var(--gold-dark);
        box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1);
    }

    .dataTables_wrapper .dataTables_info {
        color: #9c927e;
        font-size: 13px;
        padding-top: 15px;
        float: left;
        clear: both;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: right;
        padding-top: 15px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(212, 175, 55, 0.2);
        color: #b8ae9a !important;
        padding: 6px 12px;
        margin: 0 3px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: rgba(212, 175, 55, 0.1) !important;
        border-color: var(--gold-dark) !important;
        color: var(--gold-light) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--gold) !important;
        border-color: var(--gold) !important;
        color: #1a1008 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(212, 175, 55, 0.2) !important;
        color: #b8ae9a !important;
    }

    .dataTables_wrapper::after {
        content: "";
        display: table;
        clear: both;
    }

    table.dataTable {
        width: 100% !important;
        border-collapse: collapse;
        margin-top: 20px !important;
    }

    table.dataTable thead {
        background: rgba(212, 175, 55, 0.1);
    }

    table.dataTable thead th {
        padding: 16px !important;
        text-align: left;
        font-weight: 600;
        color: var(--gold-light) !important;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.2) !important;
        cursor: pointer;
        position: relative;
    }

    table.dataTable thead th.sorting,
    table.dataTable thead th.sorting_asc,
    table.dataTable thead th.sorting_desc {
        background-image: none !important;
        padding-right: 30px !important;
    }

    table.dataTable thead th.sorting:after,
    table.dataTable thead th.sorting_asc:after,
    table.dataTable thead th.sorting_desc:after {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--gold);
        opacity: 0.6;
    }

    table.dataTable thead th.sorting:after {
        content: "\f0dc";
    }

    table.dataTable thead th.sorting_asc:after {
        content: "\f0de";
    }

    table.dataTable thead th.sorting_desc:after {
        content: "\f0dd";
    }

    table.dataTable tbody td {
        padding: 14px 16px !important;
        color: #b8ae9a;
        font-size: 14px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1) !important;
        vertical-align: middle;
    }

    table.dataTable tbody tr {
        transition: background 0.3s;
        background: transparent !important;
    }

    table.dataTable tbody tr:hover {
        background: rgba(212, 175, 55, 0.05) !important;
    }

    table.dataTable tbody tr.odd {
        background: transparent !important;
    }

    table.dataTable tbody tr.even {
        background: transparent !important;
    }

    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-fulltime {
        background: rgba(33, 150, 243, 0.2);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .badge-contract {
        background: rgba(156, 39, 176, 0.2);
        color: #ba68c8;
        border: 1px solid rgba(156, 39, 176, 0.3);
    }

    .badge-freelance {
        background: rgba(255, 152, 0, 0.2);
        color: #ffb74d;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .badge-parttime {
        background: rgba(0, 150, 136, 0.2);
        color: #4db6ac;
        border: 1px solid rgba(0, 150, 136, 0.3);
    }

    .badge-active {
        background: rgba(76, 175, 80, 0.2);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .badge-expired {
        background: rgba(158, 158, 158, 0.2);
        color: #bdbdbd;
        border: 1px solid rgba(158, 158, 158, 0.3);
    }

    .badge-deleted {
        background: rgba(183, 28, 28, 0.2);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

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
        max-width: 700px;
        width: 90%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease;
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
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

    .form-group {
        margin-bottom: 20px;
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

    .form-group select option:hover,
    .form-group select option:checked {
        background: rgba(212, 175, 55, 0.2);
        color: var(--gold-light);
    }

    .form-group textarea {
        min-height: 100px;
        resize: vertical;
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

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid rgba(212, 175, 55, 0.1);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: #b8ae9a;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.08);
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

<div class="page-header">
    <h2><i class="fas fa-briefcase"></i> Kelola Lowongan Kerja</h2>
    <button class="btn btn-primary" onclick="openModal('tambah')">
        <i class="fas fa-plus"></i> Tambah Lowongan
    </button>
</div>

<div class="table-container">
    <table class="table" id="lokerTable">
        <thead>
            <tr>
                <th>Judul Lowongan</th>
                <th>Divisi</th>
                <th>Sistem Kerja</th>
                <th>Penempatan</th>
                <th>Aktif Sampai</th>
                <th>Status</th>
                <th style="width: 220px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($lokerList)): ?>
                <?php foreach ($lokerList as $loker): ?>
                    <?php
                        $today = date('Y-m-d');
                        $isActive = $loker['deleted'] == 0 && (!$loker['active_until'] || $loker['active_until'] >= $today);
                        $isExpired = $loker['deleted'] == 0 && $loker['active_until'] && $loker['active_until'] < $today;
                        $isDeleted = $loker['deleted'] == 1;
                        
                        $sistemaClass = [
                            'Full-Time' => 'fulltime',
                            'Contract' => 'contract',
                            'Freelance' => 'freelance',
                            'Part-Time' => 'parttime'
                        ];
                    ?>
                    <tr>
                        <td>
                            <?php if ($loker['icon']): ?>
                                <i class="fas <?= esc($loker['icon']) ?>" style="color: var(--gold); margin-right: 8px;"></i>
                            <?php endif; ?>
                            <strong style="color: #f0ece4;"><?= esc($loker['judul_loker']) ?></strong>
                            <?php if ($loker['keterangan_singkat']): ?>
                                <br>
                                <small style="color: #9c927e; margin-left: <?= $loker['icon'] ? '28px' : '0' ?>;"><?= esc(substr($loker['keterangan_singkat'], 0, 100)) ?><?= strlen($loker['keterangan_singkat']) > 100 ? '...' : '' ?></small>
                            <?php endif; ?>
                        </td>
                        <td><?= $loker['divisi'] ? esc($loker['divisi']) : '<span style="color: #6b6050;">-</span>' ?></td>
                        <td>
                            <?php if ($loker['sistem_kerja']): ?>
                                <span class="badge badge-<?= strtolower(str_replace('-', '', $sistemaClass[$loker['sistem_kerja']] ?? '')) ?>">
                                    <?= $loker['sistem_kerja'] ?>
                                </span>
                            <?php else: ?>
                                <span style="color: #6b6050;">-</span>
                            <?php endif; ?>
                        </td>
                        <td><?= $loker['Penempatan'] ? esc($loker['Penempatan']) : '<span style="color: #6b6050;">-</span>' ?></td>
                        <td><?= $loker['active_until'] ? date('d/m/Y', strtotime($loker['active_until'])) : '<span style="color: #6b6050;">Tidak terbatas</span>' ?></td>
                        <td>
                            <?php if ($isDeleted): ?>
                                <span class="badge badge-deleted">Terhapus</span>
                            <?php elseif ($isExpired): ?>
                                <span class="badge badge-expired">Kadaluarsa</span>
                            <?php else: ?>
                                <span class="badge badge-active">Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td style="text-align: center;">
                            <?php if ($isDeleted): ?>
                                <button class="btn btn-sm btn-success" onclick="confirmRestore(<?= $loker['idloker'] ?>, '<?= addslashes($loker['judul_loker']) ?>')">
                                    <i class="fas fa-undo"></i> Pulihkan
                                </button>
                            <?php else: ?>
                                <button class="btn btn-sm btn-warning" onclick='openModal("edit", <?= json_encode($loker, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $loker['idloker'] ?>, '<?= addslashes($loker['judul_loker']) ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal" id="lokerModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Tambah Lowongan Kerja</h3>
            <button class="close-modal" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="lokerForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="judul_loker">Judul Lowongan <span style="color: var(--red-bright);">*</span></label>
                <input type="text" id="judul_loker" name="judul_loker" placeholder="Contoh: Web Developer" required>
            </div>

            <div class="form-group">
                <label for="divisi">Divisi</label>
                <input type="text" id="divisi" name="divisi" placeholder="Contoh: IT & Development">
            </div>

            <div class="form-group">
                <label for="sistem_kerja">Sistem Kerja</label>
                <select id="sistem_kerja" name="sistem_kerja">
                    <option value="">Pilih Sistem Kerja</option>
                    <option value="Full-Time">Full-Time</option>
                    <option value="Contract">Contract</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Part-Time">Part-Time</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Penempatan">Penempatan</label>
                <input type="text" id="Penempatan" name="Penempatan" placeholder="Contoh: Kudus, Jawa Tengah">
            </div>

            <div class="form-group">
                <label for="active_until">Aktif Sampai</label>
                <input type="date" id="active_until" name="active_until">
                <small style="color: #9c927e; display: block; margin-top: 5px;">
                    Kosongkan jika lowongan tidak memiliki batas waktu
                </small>
            </div>

            <div class="form-group">
                <label for="keterangan_singkat">Keterangan Singkat</label>
                <textarea id="keterangan_singkat" name="keterangan_singkat" placeholder="Deskripsi singkat lowongan kerja"></textarea>
            </div>

            <div class="form-group">
                <label for="keterangan_lengkap">Keterangan Lengkap</label>
                <textarea id="keterangan_lengkap" name="keterangan_lengkap" placeholder="Deskripsi lengkap, persyaratan, dan benefit" style="min-height: 150px;"></textarea>
            </div>

            <div class="form-group">
                <label for="icon">Icon <span style="color: #9c927e;">(Font Awesome)</span></label>
                <select id="icon" name="icon">
                    <option value="">Pilih Icon</option>
                    <option value="fa-briefcase">💼 Briefcase (fa-briefcase)</option>
                    <option value="fa-cogs">⚙️ Cogs/Settings (fa-cogs)</option>
                    <option value="fa-hands">👐 Hands (fa-hands)</option>
                    <option value="fa-flask">🧪 Flask/Lab (fa-flask)</option>
                    <option value="fa-truck">🚚 Truck/Logistics (fa-truck)</option>
                    <option value="fa-users-cog">👥 Users Cog/HRD (fa-users-cog)</option>
                    <option value="fa-laptop-code">💻 Laptop Code/IT (fa-laptop-code)</option>
                    <option value="fa-chart-line">📈 Chart Line/Marketing (fa-chart-line)</option>
                    <option value="fa-calculator">🧮 Calculator/Finance (fa-calculator)</option>
                    <option value="fa-pencil-ruler">📐 Pencil Ruler/Design (fa-pencil-ruler)</option>
                    <option value="fa-headset">🎧 Headset/CS (fa-headset)</option>
                    <option value="fa-wrench">🔧 Wrench/Technician (fa-wrench)</option>
                    <option value="fa-boxes">📦 Boxes/Warehouse (fa-boxes)</option>
                    <option value="fa-clipboard-check">📋 Clipboard Check/Admin (fa-clipboard-check)</option>
                    <option value="fa-bullhorn">📣 Bullhorn/Sales (fa-bullhorn)</option>
                    <option value="fa-shield-alt">🛡️ Shield/Security (fa-shield-alt)</option>
                    <option value="fa-user-tie">👔 User Tie/Manager (fa-user-tie)</option>
                    <option value="fa-industry">🏭 Industry/Factory (fa-industry)</option>
                    <option value="fa-hammer">🔨 Hammer/Maintenance (fa-hammer)</option>
                    <option value="fa-leaf">🍃 Leaf/Agriculture (fa-leaf)</option>
                </select>
                <small style="color: #9c927e; display: block; margin-top: 5px;">
                    Pilih icon yang sesuai dengan posisi lowongan
                </small>
            </div>

            <div class="form-group">
                <label for="persyaratan">Persyaratan Khusus</label>
                <div id="persyaratanContainer">
                    <div class="persyaratan-item" style="display: flex; gap: 10px; margin-bottom: 10px;">
                        <input type="text" name="persyaratan[]" placeholder="Contoh: Minimal S1 Teknik Informatika" style="flex: 1;">
                        <button type="button" class="btn btn-sm btn-danger" onclick="removePersyaratan(this)" style="width: auto;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-secondary" onclick="addPersyaratan()" style="margin-top: 10px;">
                    <i class="fas fa-plus"></i> Tambah Persyaratan
                </button>
                <small style="color: #9c927e; display: block; margin-top: 8px;">
                    Tambahkan persyaratan khusus untuk posisi ini (selain persyaratan umum)
                </small>
            </div>

            <div class="form-group">
                <label for="foto_pamflet">Foto Pamflet</label>
                <input type="file" id="foto_pamflet" name="foto_pamflet" accept="image/*">
                <small style="color: #9c927e; display: block; margin-top: 5px;">
                    Format: JPG, JPEG, PNG. Maksimal 2MB
                </small>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">
                    <i class="fas fa-times"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lokerTable').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            },
            "pageLength": 10,
            "ordering": true,
            "order": [[4, 'desc']],
            "columnDefs": [
                { "orderable": false, "targets": [6] }
            ]
        });
    });

    function openModal(mode, data = null) {
        const modal = document.getElementById('lokerModal');
        const form = document.getElementById('lokerForm');
        const title = document.getElementById('modalTitle');

        if (mode === 'tambah') {
            title.textContent = 'Tambah Lowongan Kerja';
            form.action = '<?= base_url('admin/loker/create') ?>';
            form.reset();
            resetPersyaratan();
        } else if (mode === 'edit' && data) {
            title.textContent = 'Edit Lowongan Kerja';
            form.action = '<?= base_url('admin/loker/update/') ?>' + data.idloker;
            
            document.getElementById('judul_loker').value = data.judul_loker || '';
            document.getElementById('divisi').value = data.divisi || '';
            document.getElementById('sistem_kerja').value = data.sistem_kerja || '';
            document.getElementById('Penempatan').value = data.Penempatan || '';
            document.getElementById('active_until').value = data.active_until || '';
            document.getElementById('keterangan_singkat').value = data.keterangan_singkat || '';
            document.getElementById('keterangan_lengkap').value = data.keterangan_lengkap || '';
            document.getElementById('icon').value = data.icon || '';
            
            // Load persyaratan
            loadPersyaratan(data.idloker);
        }

        modal.classList.add('active');
    }

    function closeModal() {
        const modal = document.getElementById('lokerModal');
        modal.classList.remove('active');
    }

    function confirmDelete(id, judul) {
        if (confirm(`Apakah Anda yakin ingin menghapus lowongan "${judul}"?\n\nLowongan akan di-soft delete dan dapat dipulihkan kembali.`)) {
            window.location.href = '<?= base_url('admin/loker/delete/') ?>' + id;
        }
    }

    function confirmRestore(id, judul) {
        if (confirm(`Pulihkan lowongan "${judul}"?`)) {
            window.location.href = '<?= base_url('admin/loker/restore/') ?>' + id;
        }
    }

    document.getElementById('lokerModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    function addPersyaratan() {
        const container = document.getElementById('persyaratanContainer');
        const newItem = document.createElement('div');
        newItem.className = 'persyaratan-item';
        newItem.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px;';
        newItem.innerHTML = `
            <input type="text" name="persyaratan[]" placeholder="Contoh: Minimal S1 Teknik Informatika" style="flex: 1;">
            <button type="button" class="btn btn-sm btn-danger" onclick="removePersyaratan(this)" style="width: auto;">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(newItem);
    }

    function removePersyaratan(btn) {
        const container = document.getElementById('persyaratanContainer');
        if (container.children.length > 1) {
            btn.closest('.persyaratan-item').remove();
        } else {
            alert('Minimal harus ada 1 field persyaratan');
        }
    }

    function resetPersyaratan() {
        const container = document.getElementById('persyaratanContainer');
        container.innerHTML = `
            <div class="persyaratan-item" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" name="persyaratan[]" placeholder="Contoh: Minimal S1 Teknik Informatika" style="flex: 1;">
                <button type="button" class="btn btn-sm btn-danger" onclick="removePersyaratan(this)" style="width: auto;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
    }

    function loadPersyaratan(idloker) {
        fetch('<?= base_url('admin/loker/get-persyaratan/') ?>' + idloker)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('persyaratanContainer');
                container.innerHTML = '';
                
                if (data.length > 0) {
                    data.forEach(item => {
                        const newItem = document.createElement('div');
                        newItem.className = 'persyaratan-item';
                        newItem.style.cssText = 'display: flex; gap: 10px; margin-bottom: 10px;';
                        newItem.innerHTML = `
                            <input type="text" name="persyaratan[]" value="${item.persyaratan}" placeholder="Contoh: Minimal S1 Teknik Informatika" style="flex: 1;">
                            <button type="button" class="btn btn-sm btn-danger" onclick="removePersyaratan(this)" style="width: auto;">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        container.appendChild(newItem);
                    });
                } else {
                    resetPersyaratan();
                }
            })
            .catch(error => {
                console.error('Error loading persyaratan:', error);
                resetPersyaratan();
            });
    }
</script>
