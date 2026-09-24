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

    /* DataTables Custom Styling */
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

    .badge-skm {
        background: rgba(33, 150, 243, 0.2);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .badge-skt {
        background: rgba(156, 39, 176, 0.2);
        color: #ba68c8;
        border: 1px solid rgba(156, 39, 176, 0.3);
    }

    .produk-img {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid rgba(212, 175, 55, 0.3);
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
        max-width: 600px;
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

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #9c927e;
    }

    .empty-state i {
        font-size: 60px;
        color: var(--gold-dark);
        margin-bottom: 20px;
        opacity: 0.5;
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
    <h2><i class="fas fa-box-open"></i> Kelola Produk</h2>
    <button class="btn btn-primary" onclick="openModal('tambah')">
        <i class="fas fa-plus"></i> Tambah Produk
    </button>
</div>

<div class="table-container">
    <table class="table" id="produkTable">
        <thead>
            <tr>
                <th style="width: 80px;">Foto</th>
                <th>Nama Produk</th>
                <th>Tipe</th>
                <th>Karakter</th>
                <th>Aroma</th>
                <th style="width: 180px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($produkList)): ?>
                <?php foreach ($produkList as $produk): ?>
                    <tr>
                        <td>
                            <?php if ($produk['foto']): ?>
                                <img src="<?= base_url('foto_produk/' . $produk['foto']) ?>" alt="<?= $produk['nama_produk'] ?>" class="produk-img">
                            <?php else: ?>
                                <img src="<?= base_url('foto_produk/default.png') ?>" alt="No Image" class="produk-img">
                            <?php endif; ?>
                        </td>
                        <td>
                            <strong style="color: #f0ece4;"><?= esc($produk['nama_produk']) ?></strong>
                            <br>
                            <small style="color: #9c927e;"><?= esc($produk['slogan']) ?></small>
                        </td>
                        <td>
                            <span class="badge badge-<?= strtolower($produk['tipe']) ?>">
                                <?= $produk['tipe'] ?>
                            </span>
                        </td>
                        <td><?= esc($produk['karakter']) ?></td>
                        <td><?= esc($produk['aroma']) ?></td>
                        <td style="text-align: center;">
                            <button class="btn btn-sm btn-warning" onclick='openModal("edit", <?= json_encode($produk, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $produk['idproduk'] ?>, '<?= addslashes($produk['nama_produk']) ?>')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal" id="produkModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalTitle">Tambah Produk</h3>
            <button class="close-modal" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="produkForm" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="nama_produk">Nama Produk <span style="color: var(--red-bright);">*</span></label>
                <input type="text" id="nama_produk" name="nama_produk" placeholder="Contoh: Deluxe Bold" required>
            </div>

            <div class="form-group">
                <label for="tipe">Tipe <span style="color: var(--red-bright);">*</span></label>
                <select id="tipe" name="tipe" required>
                    <option value="">Pilih Tipe</option>
                    <option value="SKM">SKM - Sigaret Kretek Mesin</option>
                    <option value="SKT">SKT - Sigaret Kretek Tangan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input type="text" id="slogan" name="slogan" placeholder="Slogan singkat produk">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" placeholder="Deskripsi lengkap produk"></textarea>
            </div>

            <div class="form-group">
                <label for="karakter">Karakter Rasa</label>
                <input type="text" id="karakter" name="karakter" placeholder="Contoh: Kuat & Penuh">
            </div>

            <div class="form-group">
                <label for="aroma">Aroma</label>
                <input type="text" id="aroma" name="aroma" placeholder="Contoh: Tembakau Pekat">
            </div>

            <div class="form-group">
                <label for="foto">Foto Produk <span id="fotoRequired" style="color: var(--red-bright);">*</span></label>
                <input type="file" id="foto" name="foto" accept="image/*">
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
        // Initialize DataTable
        $('#produkTable').DataTable({
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
            "order": [[1, 'asc']],
            "columnDefs": [
                { "orderable": false, "targets": [0, 5] } // Disable sorting on Foto and Aksi columns
            ]
        });
    });

    function openModal(mode, data = null) {
        const modal = document.getElementById('produkModal');
        const form = document.getElementById('produkForm');
        const title = document.getElementById('modalTitle');
        const fotoInput = document.getElementById('foto');
        const fotoRequired = document.getElementById('fotoRequired');

        if (mode === 'tambah') {
            title.textContent = 'Tambah Produk';
            form.action = '<?= base_url('admin/produk/create') ?>';
            form.reset();
            fotoInput.required = true;
            fotoRequired.style.display = 'inline';
        } else if (mode === 'edit' && data) {
            title.textContent = 'Edit Produk';
            form.action = '<?= base_url('admin/produk/update/') ?>' + data.idproduk;
            
            document.getElementById('nama_produk').value = data.nama_produk || '';
            document.getElementById('tipe').value = data.tipe || '';
            document.getElementById('slogan').value = data.slogan || '';
            document.getElementById('keterangan').value = data.keterangan || '';
            document.getElementById('karakter').value = data.karakter || '';
            document.getElementById('aroma').value = data.aroma || '';
            
            fotoInput.required = false;
            fotoRequired.style.display = 'none';
        }

        modal.classList.add('active');
    }

    function closeModal() {
        const modal = document.getElementById('produkModal');
        modal.classList.remove('active');
    }

    function confirmDelete(id, nama) {
        if (confirm(`Apakah Anda yakin ingin menghapus produk "${nama}"?\n\nData yang dihapus tidak dapat dikembalikan.`)) {
            window.location.href = '<?= base_url('admin/produk/delete/') ?>' + id;
        }
    }

    // Close modal when clicking outside
    document.getElementById('produkModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
