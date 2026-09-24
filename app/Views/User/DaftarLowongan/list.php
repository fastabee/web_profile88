<style>
    .alert {
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        animation: fadeInUp 0.5s ease;
    }

    .alert-error {
        background: rgba(183, 28, 28, 0.15);
        color: var(--red-bright);
        border: 1px solid rgba(183, 28, 28, 0.3);
    }

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

    .filter-bar {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 12px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 20px;
        margin-bottom: 25px;
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    .filter-bar input {
        flex: 1;
        min-width: 250px;
        padding: 10px 15px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid #3d2410;
        border-radius: 8px;
        color: #f0ece4;
        font-size: 14px;
    }

    .filter-bar input::placeholder {
        color: #6b6050;
    }

    .loker-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 20px;
    }

    .loker-card {
        background: linear-gradient(145deg, #251508, #1a1008);
        border-radius: 15px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 25px;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
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

    .loker-title {
        flex: 1;
    }

    .loker-title h3 {
        color: #f0ece4;
        font-size: 18px;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .loker-desc {
        color: #9c927e;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 15px;
        flex: 1;
    }

    .loker-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 15px;
    }

    .loker-tag {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .tag-dept {
        background: rgba(33, 150, 243, 0.15);
        color: #64b5f6;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .tag-type {
        background: rgba(76, 175, 80, 0.15);
        color: #81c784;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .tag-loc {
        background: rgba(255, 152, 0, 0.15);
        color: #ffb74d;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .tag-deadline {
        background: rgba(156, 39, 176, 0.15);
        color: #ba68c8;
        border: 1px solid rgba(156, 39, 176, 0.3);
    }

    .loker-actions {
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

    .btn-secondary {
        background: rgba(255, 255, 255, 0.05);
        color: #b8ae9a;
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: var(--gold);
        color: var(--gold-light);
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
    }

    @media (max-width: 768px) {
        .loker-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i>
        <span><?= session()->getFlashdata('error') ?></span>
    </div>
<?php endif; ?>

<div class="page-header">
    <h2><i class="fas fa-briefcase"></i> Lowongan Kerja Tersedia</h2>
    <p>Temukan posisi yang sesuai dengan keahlian dan minat Anda di 88 Group</p>
</div>

<div class="filter-bar">
    <input type="text" id="searchInput" placeholder="🔍 Cari lowongan berdasarkan judul, divisi, atau lokasi...">
</div>

<div class="loker-grid" id="lokerGrid">
    <?php if (!empty($lokerList)): ?>
        <?php foreach ($lokerList as $loker): ?>
            <div class="loker-card" data-title="<?= strtolower(esc($loker['judul_loker'])) ?>" 
                 data-divisi="<?= strtolower(esc($loker['divisi'] ?? '')) ?>" 
                 data-lokasi="<?= strtolower(esc($loker['Penempatan'] ?? '')) ?>">
                <div class="loker-header">
                    <div class="loker-icon">
                        <i class="fas <?= $loker['icon'] ? esc($loker['icon']) : 'fa-briefcase' ?>"></i>
                    </div>
                    <div class="loker-title">
                        <h3><?= esc($loker['judul_loker']) ?></h3>
                    </div>
                </div>

                <p class="loker-desc">
                    <?= $loker['keterangan_singkat'] ? esc(substr($loker['keterangan_singkat'], 0, 120)) . '...' : 'Deskripsi lowongan kerja' ?>
                </p>

                <div class="loker-meta">
                    <?php if ($loker['divisi']): ?>
                        <span class="loker-tag tag-dept">
                            <i class="fas fa-building"></i> <?= esc($loker['divisi']) ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($loker['sistem_kerja']): ?>
                        <span class="loker-tag tag-type">
                            <i class="fas fa-clock"></i> <?= esc($loker['sistem_kerja']) ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($loker['Penempatan']): ?>
                        <span class="loker-tag tag-loc">
                            <i class="fas fa-map-marker-alt"></i> <?= esc($loker['Penempatan']) ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($loker['active_until']): ?>
                        <span class="loker-tag tag-deadline">
                            <i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($loker['active_until'])) ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="loker-actions">
                    <a href="<?= base_url('user/lowongan/' . $loker['idloker']) ?>" class="btn btn-primary">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h3>Belum Ada Lowongan Tersedia</h3>
            <p>Saat ini belum ada lowongan kerja yang aktif. Silakan cek kembali nanti.</p>
        </div>
    <?php endif; ?>
</div>

<script>
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const lokerCards = document.querySelectorAll('.loker-card');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        lokerCards.forEach(card => {
            const title = card.getAttribute('data-title');
            const divisi = card.getAttribute('data-divisi');
            const lokasi = card.getAttribute('data-lokasi');

            if (title.includes(searchTerm) || divisi.includes(searchTerm) || lokasi.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
