<!DOCTYPE html>
<html lang="id">
<head>
  <?= $this->include('templates/head') ?>
  <title>Produk · 88 Group</title>
</head>
<body>
  <div class="container">
    <?= $this->include('templates/navbar') ?>

    <!-- HERO -->
    <div class="produk-hero animate-on-load delay-2">
      <div class="badge" style="display:inline-block;margin-bottom:20px;">
        <i class="fas fa-box-open" style="margin-right:6px;"></i> Lini Produk
      </div>
      <h1>Produk <span style="background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">88 Group</span></h1>
      <p>Rangkaian produk tembakau olahan pilihan — dari Sigaret Kretek Tangan tradisional hingga Sigaret Kretek Mesin modern, semua hadir dengan standar kualitas terbaik.</p>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <button class="filter-btn active" data-filter="semua">Semua Produk</button>
      <button class="filter-btn" data-filter="skm">SKM</button>
      <button class="filter-btn" data-filter="skt">SKT</button>
    </div>

    <!-- CSS untuk halaman produk -->
    <style><?= $this->include('styles/produk_style') ?></style>

    <!-- GRID PRODUK -->
    <div class="produk-grid" id="produkGrid">
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $i => $p): ?>
      <div class="produk-item" data-cat="<?= strtolower($p['tipe']) ?>" style="animation-delay:<?= ($i * 0.05) ?>s">
        <div class="produk-img">
          <img src="<?= base_url('foto_produk/' . ($p['foto'] ?: 'default.png')) ?>" alt="<?= esc($p['nama_produk']) ?>" />
        </div>
        <div class="produk-body">
          <div class="produk-tags">
            <span class="p-tag p-tag-<?= strtolower($p['tipe']) ?>"><?= esc($p['tipe']) ?></span>
          </div>
          <h3><?= esc($p['nama_produk']) ?></h3>
          <p><?= esc($p['keterangan'] ?: $p['slogan']) ?></p>
          <div class="produk-specs">
            <div class="produk-spec-row">
              <span class="spec-key">Tipe</span>
              <span class="spec-val"><?= $p['tipe'] == 'SKM' ? 'Sigaret Kretek Mesin' : 'Sigaret Kretek Tangan' ?></span>
            </div>
            <?php if ($p['karakter']): ?>
            <div class="produk-spec-row">
              <span class="spec-key">Karakter Rasa</span>
              <span class="spec-val"><?= esc($p['karakter']) ?></span>
            </div>
            <?php endif; ?>
            <?php if ($p['aroma']): ?>
            <div class="produk-spec-row">
              <span class="spec-key">Aroma</span>
              <span class="spec-val"><?= esc($p['aroma']) ?></span>
            </div>
            <?php endif; ?>
          </div>
          <a href="#" class="btn-secondary"><i class="fas fa-info-circle"></i> Detail Produk</a>
        </div>
      </div>
        <?php endforeach; ?>
      <?php else: ?>
      <div class="produk-item" style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
        <i class="fas fa-box-open" style="font-size: 60px; color: var(--gold-dark); opacity: 0.5; margin-bottom: 20px;"></i>
        <h3 style="color: var(--gold-light); margin-bottom: 10px;">Belum Ada Produk</h3>
        <p style="color: #9c927e;">Produk akan ditampilkan di sini setelah ditambahkan oleh admin</p>
      </div>
      <?php endif; ?>
    </div>

    <!-- HIGHLIGHT STRIP -->
    <div class="highlight-strip animate-on-load delay-2">
      <div class="hs-item"><i class="fas fa-leaf"></i><div class="hs-val"><?= count($products) ?></div><div class="hs-lbl">Varian Produk</div></div>
      <div class="hs-item"><i class="fas fa-hands"></i><div class="hs-val">SKT</div><div class="hs-lbl">Sigaret Kretek Tangan</div></div>
      <div class="hs-item"><i class="fas fa-cogs"></i><div class="hs-val">SKM</div><div class="hs-lbl">Sigaret Kretek Mesin</div></div>
      <div class="hs-item"><i class="fas fa-medal"></i><div class="hs-val">65+</div><div class="hs-lbl">Tahun Kualitas</div></div>
    </div>

    <!-- PROSES PRODUKSI -->
    <section>
      <h2 class="section-title animate-on-load delay-1">Proses <span>Produksi</span></h2>
      <p class="section-sub animate-on-load delay-2">Setiap produk 88 Group melewati tahapan ketat untuk menjamin kualitas yang konsisten.</p>
      <div class="services-grid">
        <div class="service-card">
          <i class="fas fa-seedling"></i>
          <h3>Seleksi <span class="highlight">Bahan Baku</span></h3>
          <p>Tembakau dipilih dari perkebunan terbaik di Jawa Timur dengan standar kematangan dan kualitas yang ketat sebelum masuk proses produksi.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-industry"></i>
          <h3>Pengolahan <span style="color:#d4af37;">Terstandar</span></h3>
          <p>Proses blending dan pengolahan dilakukan menggunakan teknologi modern dan resep warisan untuk menghasilkan cita rasa yang khas dan konsisten.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-check-double"></i>
          <h3>Quality <span style="color:#b71c1c;">Control</span></h3>
          <p>Setiap batch produksi melewati uji kualitas berlapis — dari kadar air, ketebalan, hingga aroma — sebelum dikemas dan didistribusikan.</p>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <div class="cta-banner">
      <h2><i class="fas fa-handshake"></i> Tertarik mendistribusikan produk kami?</h2>
      <a href="#" class="btn-primary"><i class="fas fa-arrow-right"></i> Hubungi Kami</a>
    </div>

    <?= $this->include('templates/footer') ?>
  </div>

  <script>
    /* Filter produk */
    (function () {
      var btns = document.querySelectorAll('.filter-btn');
      var items = document.querySelectorAll('.produk-item');
      btns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          btns.forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');
          var filter = btn.dataset.filter;
          items.forEach(function (item) {
            var cat = item.dataset.cat || '';
            if (filter === 'semua' || cat.indexOf(filter) !== -1) {
              item.style.display = '';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
    })();
  </script>
</body>
</html>
