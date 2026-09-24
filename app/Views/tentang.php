<!DOCTYPE html>
<html lang="id">
<head>
  <?= $this->include('templates/head') ?>
  <title>Tentang Kami · 88 Group</title>
</head>
<body>
  <div class="container">

    <?= $this->include('templates/navbar') ?>

    <!-- HERO TENTANG -->
    <div style="display:flex;align-items:center;justify-content:space-between;gap:50px;padding:60px 0 70px;">
      <div style="flex:1 1 0;min-width:0;">
        <div class="badge"><i class="fas fa-building" style="margin-right:6px;"></i> Tentang Kami</div>
        <h1 style="font-size:3.4rem;font-weight:800;line-height:1.1;margin-bottom:20px;">
          <span style="background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">88 Group</span><br/>
          <span style="color:#f0ece4;">Warisan</span> <span style="color:#e53935;">Tembakau</span>
        </h1>
        <p style="font-size:1.15rem;color:#c9c1b2;max-width:500px;margin-bottom:32px;line-height:1.8;">
          Perusahaan industri pengolahan hasil tembakau lokal yang telah berdiri sejak <strong style="color:#f5e18c;">1959</strong>, berlokasi di Kabupaten Bondowoso, Jawa Timur. Lebih dari enam dekade menghadirkan cita rasa tembakau pilihan untuk masyarakat Indonesia.
        </p>
        <div class="hero-buttons">
          <a href="<?= base_url('produk') ?>" class="btn-primary"><i class="fas fa-leaf"></i> Lihat Produk</a>
          <a href="#" class="btn-secondary"><i class="fas fa-envelope"></i> Hubungi Kami</a>
        </div>
      </div>
      <div style="flex:1 1 0;min-width:0;border-radius:60px 20px 60px 20px;overflow:hidden;border:1px solid rgba(212,175,55,0.3);box-shadow:0 20px 50px rgba(0,0,0,0.6);">
        <img src="<?= base_url('foto/tentang.jpg') ?>" alt="88 Group" style="width:100%;height:400px;object-fit:cover;display:block;" />
      </div>
    </div>

    <!-- INFO SINGKAT -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:24px;margin:50px 0;">
      <div style="background:linear-gradient(145deg,#251508,#1a1008);border:1px solid #3d2410;border-radius:24px;padding:28px 22px;text-align:center;box-shadow:0 8px 0 #120b04;">
        <i class="fas fa-calendar-alt" style="font-size:2.4rem;color:var(--gold);margin-bottom:14px;display:inline-block;background:rgba(212,175,55,0.08);padding:14px;border-radius:50%;"></i>
        <div style="font-size:0.8rem;color:#9c927e;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Berdiri Sejak</div>
        <div style="font-size:1.05rem;font-weight:600;color:#f0ece4;">1959</div>
      </div>
      <div style="background:linear-gradient(145deg,#251508,#1a1008);border:1px solid #3d2410;border-radius:24px;padding:28px 22px;text-align:center;box-shadow:0 8px 0 #120b04;">
        <i class="fas fa-industry" style="font-size:2.4rem;color:var(--gold);margin-bottom:14px;display:inline-block;background:rgba(212,175,55,0.08);padding:14px;border-radius:50%;"></i>
        <div style="font-size:0.8rem;color:#9c927e;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Jenis Usaha</div>
        <div style="font-size:1.05rem;font-weight:600;color:#f0ece4;">Industri Pengolahan Hasil Tembakau</div>
      </div>
      <div style="background:linear-gradient(145deg,#251508,#1a1008);border:1px solid #3d2410;border-radius:24px;padding:28px 22px;text-align:center;box-shadow:0 8px 0 #120b04;">
        <i class="fas fa-map-marker-alt" style="font-size:2.4rem;color:var(--gold);margin-bottom:14px;display:inline-block;background:rgba(212,175,55,0.08);padding:14px;border-radius:50%;"></i>
        <div style="font-size:0.8rem;color:#9c927e;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Lokasi</div>
        <div style="font-size:1.05rem;font-weight:600;color:#f0ece4;">Jl. Husnan Toha, Tamanan, Bondowoso, Jawa Timur</div>
      </div>
      <div style="background:linear-gradient(145deg,#251508,#1a1008);border:1px solid #3d2410;border-radius:24px;padding:28px 22px;text-align:center;box-shadow:0 8px 0 #120b04;">
        <i class="fas fa-box-open" style="font-size:2.4rem;color:var(--gold);margin-bottom:14px;display:inline-block;background:rgba(212,175,55,0.08);padding:14px;border-radius:50%;"></i>
        <div style="font-size:0.8rem;color:#9c927e;text-transform:uppercase;letter-spacing:1.5px;margin-bottom:6px;">Produk</div>
        <div style="font-size:1.05rem;font-weight:600;color:#f0ece4;">SKT &amp; SKM (Sigaret Kretek)</div>
      </div>
    </div>

    <!-- SEJARAH & STATISTIK -->
    <section style="padding:70px 0;border-top:1px solid rgba(212,175,55,0.1);">
      <div style="display:flex;justify-content:space-between;gap:50px;align-items:flex-start;">
        <div style="flex:1 1 0;min-width:0;">
          <div class="badge" style="margin-bottom:20px;"><i class="fas fa-history" style="margin-right:6px;"></i> Sejarah Perusahaan</div>
          <h2 class="section-title" style="text-align:left;margin-bottom:24px;">Enam Dekade <span>Penuh Dedikasi</span></h2>
          <p style="color:#c9c1b2;font-size:1.05rem;line-height:1.85;margin-bottom:18px;">88 Group adalah perusahaan industri pengolahan hasil tembakau yang telah berdiri sejak tahun <strong style="color:#f5e18c;">1959</strong>. Berawal dari komitmen sederhana untuk menghadirkan rokok kretek berkualitas, perusahaan ini terus berkembang menjadi salah satu produsen tembakau lokal terpercaya di Kabupaten Bondowoso, Jawa Timur.</p>
          <p style="color:#c9c1b2;font-size:1.05rem;line-height:1.85;margin-bottom:18px;">Berlokasi di Jalan Husnan Toha, Sumber Kemuning, Kecamatan Tamanan, 88 Group menjalankan proses produksi dengan standar tinggi — mulai dari pemilihan bahan baku tembakau pilihan hingga proses pengolahan menggunakan peralatan modern maupun metode tradisional yang terjaga kualitasnya.</p>
          <div style="background:linear-gradient(145deg,#251508,#1a1008);border-left:4px solid var(--gold);border-radius:0 16px 16px 0;padding:20px 24px;margin:24px 0;color:#f5e18c;font-size:1.1rem;font-style:italic;line-height:1.7;">"Dari Bondowoso untuk Indonesia — kami merawat warisan tembakau lokal dengan semangat inovasi dan kepercayaan yang tak pernah pudar."</div>
          <p style="color:#c9c1b2;font-size:1.05rem;line-height:1.85;margin-bottom:18px;">Selama lebih dari enam dekade, 88 Group tidak hanya fokus pada produksi, tetapi juga aktif berkontribusi pada pemberdayaan tenaga kerja lokal dan program sosial kemasyarakatan. Perusahaan ini menjalin kerja sama erat dengan pemerintah daerah Kabupaten Bondowoso serta mendapat perhatian nasional dalam pengembangan pemasaran produk tembakau lokal.</p>
        </div>
        <div style="flex:0 0 280px;display:flex;flex-direction:column;gap:20px;">
          <div style="background:linear-gradient(145deg,#2d1a0e,#1a1008);border:1px solid #3d2410;border-radius:20px;padding:24px 20px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">65+</div>
            <div style="font-size:0.9rem;color:#9c927e;margin-top:4px;">Tahun Berpengalaman</div>
          </div>
          <div style="background:linear-gradient(145deg,#2d1a0e,#1a1008);border:1px solid #3d2410;border-radius:20px;padding:24px 20px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">6</div>
            <div style="font-size:0.9rem;color:#9c927e;margin-top:4px;">Varian Produk Unggulan</div>
          </div>
          <div style="background:linear-gradient(145deg,#2d1a0e,#1a1008);border:1px solid #3d2410;border-radius:20px;padding:24px 20px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">1959</div>
            <div style="font-size:0.9rem;color:#9c927e;margin-top:4px;">Tahun Berdiri</div>
          </div>
        </div>
      </div>
    </section>

    <!-- JENIS PRODUK -->
    <section>
      <h2 class="section-title">Jenis <span>Produk</span></h2>
      <p class="section-sub">88 Group memproduksi dua kategori rokok kretek utama yang telah dikenal luas di pasar lokal maupun nasional.</p>
      <div class="services-grid">
        <div class="service-card">
          <i class="fas fa-hands"></i>
          <span style="display:inline-block;background:rgba(183,28,28,0.2);color:#f5e18c;border:1px solid rgba(212,175,55,0.3);border-radius:40px;padding:4px 14px;font-size:0.78rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;margin-bottom:14px;">SKT</span>
          <h3>Sigaret Kretek Tangan</h3>
          <p>Diproduksi dengan keterampilan tangan para perajin berpengalaman. SKT 88 Group mewarisi tradisi pembuatan rokok kretek yang autentik, menghasilkan cita rasa khas yang tidak tergantikan oleh mesin.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-cogs"></i>
          <span style="display:inline-block;background:rgba(183,28,28,0.2);color:#f5e18c;border:1px solid rgba(212,175,55,0.3);border-radius:40px;padding:4px 14px;font-size:0.78rem;font-weight:600;letter-spacing:1px;text-transform:uppercase;margin-bottom:14px;">SKM</span>
          <h3>Sigaret Kretek Mesin</h3>
          <p>Diproduksi menggunakan teknologi mesin modern dengan presisi tinggi. SKM 88 Group memastikan konsistensi kualitas dan standar produksi yang merata di setiap batang yang dihasilkan.</p>
        </div>
      </div>
    </section>

    <!-- KONTRIBUSI -->
    <section>
      <h2 class="section-title">Kontribusi <span>Sosial</span></h2>
      <p class="section-sub">88 Group berkomitmen untuk memberikan dampak positif bagi masyarakat dan daerah sekitar.</p>
      <div class="services-grid">
        <div class="service-card">
          <i class="fas fa-users"></i>
          <h3>Tenaga Kerja <span class="highlight">Lokal</span></h3>
          <p>Menyerap ratusan tenaga kerja dari masyarakat Kabupaten Bondowoso dan sekitarnya, mendukung perekonomian daerah secara nyata.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-handshake"></i>
          <h3>Mitra <span style="color:#d4af37;">Pemerintah</span></h3>
          <p>Menjalin kerja sama aktif dengan pemerintah daerah Kabupaten Bondowoso dalam program sosial kemasyarakatan dan pengembangan industri lokal.</p>
        </div>
        <div class="service-card">
          <i class="fas fa-chart-line"></i>
          <h3>Pemasaran <span style="color:#b71c1c;">Nasional</span></h3>
          <p>Mendapat perhatian di tingkat nasional untuk pengembangan pemasaran produk tembakau lokal, membawa nama Bondowoso ke panggung industri yang lebih luas.</p>
        </div>
      </div>
    </section>

    <!-- LOKASI -->
    <div class="testimoni" style="margin:0 0 10px;">
      <i class="fas fa-map-marker-alt"></i>
      <blockquote style="font-size:1.4rem;"><strong>Jl. Husnan Toha</strong>, Sumber Kemuning, Kec. Tamanan,<br/>Kabupaten Bondowoso, Jawa Timur</blockquote>
      <div class="author">— Kantor &amp; Fasilitas Produksi · <span>88 Group</span></div>
    </div>

    <!-- CTA -->
    <div class="cta-banner">
      <h2><i class="fas fa-leaf"></i> Tertarik bermitra dengan kami?</h2>
      <a href="#" class="btn-primary"><i class="fas fa-arrow-right"></i> Hubungi Sekarang</a>
    </div>

    <?= $this->include('templates/footer') ?>

  </div>
</body>
</html>
