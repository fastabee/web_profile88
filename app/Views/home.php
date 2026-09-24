<!DOCTYPE html>
<html lang="id">
<head>
  <?= $this->include('templates/head') ?>
</head>
<body>
  <div class="container">

    <?= $this->include('templates/navbar') ?>

    <!-- HERO CAROUSEL -->
    <div class="carousel-section animate-on-load delay-2">
      <div class="carousel" id="heroCarousel">
        <div class="carousel-track" id="carouselTrack">
          <div class="carousel-slide slide-1" style="background-image: url('<?= base_url('foto/foto_atas1.jpg') ?>');">
            <div class="carousel-content">
              <div class="slide-badge"><i class="fas fa-fire" style="margin-right:6px;"></i> Produk Unggulan</div>
              <h2>Cita Rasa <span class="gold-text">Tembakau</span> <span class="red-text">Premium</span></h2>
              <p>88 Group menghadirkan produk tembakau olahan berkualitas tinggi dengan standar produksi terpercaya.</p>
              <a href="<?= base_url('produk') ?>" class="btn-primary"><i class="fas fa-leaf"></i> Lihat Produk</a>
            </div>
          </div>
          <div class="carousel-slide slide-2" style="background-image: url('<?= base_url('foto/foto_atas2.jpg') ?>');">
            <div class="carousel-content">
              <div class="slide-badge"><i class="fas fa-star" style="margin-right:6px;"></i> Promo Spesial</div>
              <h2>Kualitas <span class="gold-text">Terjamin</span> di Setiap Batang</h2>
              <p>Diproses dengan teknologi modern dan bahan baku tembakau pilihan dari seluruh nusantara.</p>
              <a href="#" class="btn-primary"><i class="fas fa-arrow-right"></i> Hubungi Kami</a>
            </div>
          </div>
          <div class="carousel-slide slide-3" style="background-image: url('<?= base_url('foto/foto_atas3.jpg') ?>');">
            <div class="carousel-content">
              <div class="slide-badge" style="background:rgba(100,80,200,0.2);color:#c4b5fd;border-color:rgba(167,139,250,0.4);"><i class="fas fa-crown" style="margin-right:6px;"></i> Edisi Eksklusif</div>
              <h2>Aroma <span class="gold-text">Tembakau</span> yang <span style="-webkit-text-fill-color:#c4b5fd;background:linear-gradient(145deg,#c4b5fd,#8b5cf6);-webkit-background-clip:text;background-clip:text;">Elegan</span></h2>
              <p>Lini produk eksklusif 88 Group — perpaduan sempurna antara tradisi dan inovasi pengolahan tembakau.</p>
              <a href="#" class="btn-secondary"><i class="fas fa-play-circle"></i> Pelajari Lebih</a>
            </div>
          </div>
        </div>
        <button class="carousel-btn prev" id="carouselPrev"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-btn next" id="carouselNext"><i class="fas fa-chevron-right"></i></button>
        <div class="carousel-dots" id="carouselDots">
          <div class="carousel-dot active" data-index="0"></div>
          <div class="carousel-dot" data-index="1"></div>
          <div class="carousel-dot" data-index="2"></div>
        </div>
        <div class="carousel-progress" id="carouselProgress"></div>
      </div>
    </div>

    <!-- HERO -->
    <section class="hero">
      <div class="hero-text animate-on-load delay-2">
        <div class="badge"><i class="fas fa-leaf" style="margin-right:6px;"></i> Pengolahan Tembakau</div>
        <h1><span>88 Group</span><br/><span class="red-highlight">Tembakau</span> <span>Pilihan</span></h1>
        <p>Perusahaan pengolahan hasil tembakau dengan pengalaman panjang dan komitmen terhadap kualitas terbaik di setiap produk.</p>
        <div class="hero-buttons">
          <a href="<?= base_url('produk') ?>" class="btn-primary"><i class="fas fa-leaf"></i> Produk Kami</a>
          <a href="#" class="btn-secondary"><i class="fas fa-envelope"></i> Hubungi Kami</a>
        </div>
      </div>
      <div class="hero-image animate-on-load delay-3" style="background-image:url('<?= base_url('foto/bibit_tembakau.jpeg') ?>');background-size:cover;background-position:center;"></div>
    </section>

    <!-- PRODUK -->
    <section>
      <h2 class="section-title animate-on-load delay-1">Produk <span>Kami</span></h2>
      <p class="section-sub animate-on-load delay-2">Rangkaian produk tembakau olahan 88 Group yang tersedia untuk berbagai kebutuhan.</p>
      <div class="products-carousel-wrapper">
        <button class="prod-carousel-btn prev" id="prodPrev"><i class="fas fa-chevron-left"></i></button>
        <div class="products-carousel-track" id="prodTrack">
          <?php if (!empty($products)): ?>
            <?php foreach ($products as $p): ?>
          <div class="product-card" style="background-image:url('<?= base_url('foto_produk/' . ($p['foto'] ?: 'default.png')) ?>');">
            <div class="product-info">
              <h3><?= esc($p['nama_produk']) ?></h3>
              <p><?= esc($p['slogan']) ?></p>
            </div>
          </div>
            <?php endforeach; ?>
          <?php else: ?>
          <div class="product-card" style="background: rgba(212, 175, 55, 0.1); display: flex; align-items: center; justify-content: center;">
            <div class="product-info" style="text-align: center;">
              <h3>Belum Ada Produk</h3>
              <p>Produk akan ditampilkan di sini</p>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <button class="prod-carousel-btn next" id="prodNext"><i class="fas fa-chevron-right"></i></button>
        <div class="prod-carousel-dots" id="prodDots"></div>
      </div>
    </section>

    <!-- LAYANAN -->
    <section>
      <h2 class="section-title animate-on-load delay-1">Keunggulan <span>88 Group</span></h2>
      <p class="section-sub animate-on-load delay-2">Komitmen kami dalam menghadirkan produk tembakau olahan terbaik.</p>
      <div class="services-grid">
        <div class="service-card">
          <i class="fas fa-industry"></i>
          <h3>Produksi <span class="highlight">Modern</span></h3>
          <p>Fasilitas pengolahan tembakau dengan teknologi terkini dan standar kebersihan tinggi.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-medal"></i>
          <h3>Kualitas <span style="color:#d4af37;">Terjamin</span></h3>
          <p>Setiap produk melalui proses seleksi ketat untuk memastikan cita rasa yang konsisten.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-handshake"></i>
          <h3>Mitra <span style="color:#b71c1c;">Terpercaya</span></h3>
          <p>Dipercaya oleh ribuan mitra distribusi di seluruh Indonesia sejak puluhan tahun.</p>
        </div>
      </div>
    </section>

    <!-- QUOTE -->
    <div class="testimoni">
      <i class="fas fa-quote-right"></i>
      <blockquote>"Dari bahan baku pilihan hingga produk jadi, <strong>88 Group</strong> selalu mengutamakan kualitas dan <strong>kepercayaan</strong> pelanggan di setiap langkah."</blockquote>
      <div class="author">— <span>88 Group</span> · Pengolahan Hasil Tembakau</div>
    </div>

    <!-- CTA -->
    <div class="cta-banner">
      <h2><i class="fas fa-leaf"></i> Tertarik bermitra dengan kami?</h2>
      <a href="#" class="btn-primary"><i class="fas fa-arrow-right"></i> Hubungi Sekarang</a>
    </div>

    <?= $this->include('templates/footer') ?>

  </div>

  <script src="<?= base_url('js/carousel.js') ?>"></script>
</body>
</html>
