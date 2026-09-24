<!DOCTYPE html>
<html lang="id">
<head>
  <?= $this->include('templates/head') ?>
  <title>Karir · 88 Group</title>
  <style><?= $this->include('styles/karir_style') ?></style>
</head>
<body>
  <div class="container">

    <?= $this->include('templates/navbar') ?>

    <!-- HERO -->
    <div class="karir-hero animate-on-load delay-2">
      <div class="badge" style="display:inline-block;margin-bottom:20px;">
        <i class="fas fa-briefcase" style="margin-right:6px;"></i> Karir & SDM
      </div>
      <h1>Bergabung Bersama <br/><span style="background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">88 Group</span></h1>
      <p>Kami percaya bahwa karyawan adalah aset terbesar perusahaan. Bangun karir Anda bersama kami dan tumbuh bersama industri tembakau lokal yang telah berdiri sejak 1959.</p>
      <a href="#lowongan" class="btn-primary"><i class="fas fa-search"></i> Lihat Lowongan</a>
    </div>

    <!-- STATS -->
    <div class="karir-stats">
      <div class="karir-stat"><div class="num">500+</div><div class="lbl">Karyawan Aktif</div></div>
      <div class="karir-stat"><div class="num">65+</div><div class="lbl">Tahun Berdiri</div></div>
      <div class="karir-stat"><div class="num">10+</div><div class="lbl">Program Pelatihan</div></div>
      <div class="karir-stat"><div class="num">95%</div><div class="lbl">Karyawan Lokal</div></div>
    </div>

    <!-- LOWONGAN KERJA -->
    <section id="lowongan">
      <h2 class="section-title animate-on-load delay-1">Lowongan <span>Tersedia</span></h2>
      <p class="section-sub animate-on-load delay-2">Temukan posisi yang sesuai dengan kemampuan dan passion Anda.</p>

      <div class="loker-grid">
        <?php if (!empty($lokerList)): ?>
          <?php foreach ($lokerList as $loker): ?>
          <div class="loker-card">
            <div class="loker-icon">
              <i class="fas <?= $loker['icon'] ? esc($loker['icon']) : 'fa-briefcase' ?>"></i>
            </div>
            <div class="loker-info">
              <h3><?= esc($loker['judul_loker']) ?></h3>
              <p style="font-size:0.88rem;color:#9c927e;margin-top:4px;">
                <?= $loker['keterangan_singkat'] ? esc($loker['keterangan_singkat']) : 'Deskripsi lowongan kerja' ?>
              </p>
              <div class="loker-meta">
                <?php if ($loker['divisi']): ?>
                  <span class="loker-tag tag-dept"><?= esc($loker['divisi']) ?></span>
                <?php endif; ?>
                <?php if ($loker['sistem_kerja']): ?>
                  <span class="loker-tag tag-type"><?= esc($loker['sistem_kerja']) ?></span>
                <?php endif; ?>
                <?php if ($loker['Penempatan']): ?>
                  <span class="loker-tag tag-loc"><i class="fas fa-map-marker-alt" style="margin-right:4px;"></i><?= esc($loker['Penempatan']) ?></span>
                <?php endif; ?>
              </div>
            </div>
            <a href="#lamar" class="btn-primary" onclick="setPosisiLamar('<?= addslashes($loker['judul_loker']) ?>')">
              <i class="fas fa-paper-plane"></i> Lamar
            </a>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: rgba(212, 175, 55, 0.05); border-radius: 15px; border: 1px dashed rgba(212, 175, 55, 0.3);">
            <i class="fas fa-inbox" style="font-size: 48px; color: var(--gold-dark); opacity: 0.5; margin-bottom: 20px;"></i>
            <h3 style="color: var(--gold-light); margin-bottom: 12px; font-size: 1.3rem;">Belum Ada Lowongan Tersedia</h3>
            <p style="color: #9c927e; font-size: 0.95rem; max-width: 500px; margin: 0 auto;">
              Saat ini belum ada lowongan kerja yang aktif. Silakan cek kembali secara berkala atau hubungi HRD kami untuk informasi lebih lanjut.
            </p>
            <a href="#" class="btn-primary" style="margin-top: 24px; display: inline-flex;">
              <i class="fas fa-whatsapp"></i> Hubungi HRD
            </a>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <!-- BENEFIT -->
    <section>
      <h2 class="section-title animate-on-load delay-1">Benefit <span>Karyawan</span></h2>
      <p class="section-sub animate-on-load delay-2">Kami berkomitmen memberikan kesejahteraan terbaik bagi setiap karyawan.</p>
      <div class="benefit-grid">
        <div class="benefit-card"><i class="fas fa-money-bill-wave"></i><h4>Gaji Kompetitif</h4><p>Remunerasi sesuai standar upah minimum regional dan kompetensi individu.</p></div>
        <div class="benefit-card"><i class="fas fa-heartbeat"></i><h4>BPJS Kesehatan & TK</h4><p>Perlindungan kesehatan dan ketenagakerjaan untuk seluruh karyawan tetap.</p></div>
        <div class="benefit-card"><i class="fas fa-graduation-cap"></i><h4>Pelatihan Berkala</h4><p>Program training rutin untuk meningkatkan skill teknis dan non-teknis.</p></div>
        <div class="benefit-card"><i class="fas fa-chart-line"></i><h4>Jenjang Karir Jelas</h4><p>Sistem promosi transparan berdasarkan kinerja dan pengembangan diri.</p></div>
        <div class="benefit-card"><i class="fas fa-umbrella"></i><h4>THR & Bonus</h4><p>Tunjangan Hari Raya dan bonus kinerja sesuai pencapaian perusahaan.</p></div>
        <div class="benefit-card"><i class="fas fa-users"></i><h4>Lingkungan Kerja Positif</h4><p>Budaya kerja kekeluargaan yang inklusif dan saling mendukung.</p></div>
      </div>
    </section>

    <!-- PROGRAM PENINGKATAN SDM -->
    <section>
      <h2 class="section-title animate-on-load delay-1">Program <span>Peningkatan SDM</span></h2>
      <p class="section-sub animate-on-load delay-2">88 Group berinvestasi pada sumber daya manusia melalui program pengembangan yang terstruktur.</p>
      <div class="sdm-grid">
        <div class="sdm-card">
          <div class="sdm-num">01</div>
          <h3>Pelatihan Teknis Produksi</h3>
          <p>Program orientasi dan pelatihan teknis bagi karyawan baru maupun lama untuk memastikan standar produksi yang konsisten.</p>
          <ul><li>On-the-job training terstruktur</li><li>Sertifikasi keahlian internal</li><li>Evaluasi kinerja berkala</li></ul>
        </div>
        <div class="sdm-card">
          <div class="sdm-num">02</div>
          <h3>Pengembangan Soft Skills</h3>
          <p>Pelatihan kepemimpinan, komunikasi, dan teamwork untuk membentuk karyawan yang profesional dan berdaya saing tinggi.</p>
          <ul><li>Workshop kepemimpinan</li><li>Pelatihan komunikasi efektif</li><li>Team building rutin</li></ul>
        </div>
        <div class="sdm-card">
          <div class="sdm-num">03</div>
          <h3>Program Beasiswa & Studi</h3>
          <p>Dukungan pendidikan bagi karyawan berprestasi yang ingin meningkatkan jenjang pendidikan formal maupun informal.</p>
          <ul><li>Bantuan biaya pendidikan</li><li>Izin belajar bagi karyawan aktif</li><li>Kemitraan dengan lembaga pendidikan</li></ul>
        </div>
      </div>
    </section>

    <!-- FORM LAMAR -->
    <section id="lamar">
      <h2 class="section-title animate-on-load delay-1">Kirim <span>Lamaran</span></h2>
      <p class="section-sub animate-on-load delay-2">Isi formulir di bawah dan kami akan menghubungi Anda segera.</p>

      <div class="form-lamar">
        <h3><i class="fas fa-paper-plane" style="color:var(--gold);margin-right:10px;"></i> Formulir Lamaran Kerja</h3>
        <p>Pastikan data yang Anda isi sudah benar dan lengkap.</p>
        <form action="<?= base_url('karir/submit') ?>" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group"><label>Nama Lengkap *</label><input type="text" name="nama" placeholder="Nama lengkap Anda" required /></div>
            <div class="form-group"><label>Nomor HP / WhatsApp *</label><input type="tel" name="hp" placeholder="08xxxxxxxxxx" required /></div>
          </div>
          <div class="form-row">
            <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="email@contoh.com" /></div>
            <div class="form-group">
              <label>Posisi yang Dilamar *</label>
              <select name="posisi" id="posisi_lamar" required>
                <option value="" disabled selected>— Pilih Posisi —</option>
                <?php if (!empty($lokerList)): ?>
                  <?php foreach ($lokerList as $loker): ?>
                    <option value="<?= esc($loker['judul_loker']) ?>"><?= esc($loker['judul_loker']) ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option disabled>Belum ada lowongan tersedia</option>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Pendidikan Terakhir</label>
              <select name="pendidikan">
                <option value="" disabled selected>— Pilih —</option>
                <option>SD</option><option>SMP</option><option>SMA / SMK</option><option>D3</option><option>S1</option><option>S2</option>
              </select>
            </div>
            <div class="form-group">
              <label>Pengalaman Kerja</label>
              <select name="pengalaman">
                <option value="" disabled selected>— Pilih —</option>
                <option>Fresh Graduate / Belum ada pengalaman</option>
                <option>Kurang dari 1 tahun</option>
                <option>1 – 3 tahun</option>
                <option>3 – 5 tahun</option>
                <option>Lebih dari 5 tahun</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group full"><label>Pesan / Motivasi</label><textarea name="pesan" placeholder="Ceritakan motivasi Anda bergabung dengan 88 Group..."></textarea></div>
          </div>
          <div class="form-row">
            <div class="form-group full"><label>Upload CV (PDF / DOC, maks 2MB)</label><input type="file" name="cv" accept=".pdf,.doc,.docx" /></div>
          </div>
          <div style="margin-top:8px;">
            <button type="submit" class="btn-primary" style="width:100%;justify-content:center;font-size:1rem;padding:16px;">
              <i class="fas fa-paper-plane"></i> Kirim Lamaran
            </button>
          </div>
        </form>
      </div>
    </section>

    <!-- QUOTE -->
    <div class="testimoni">
      <i class="fas fa-quote-right"></i>
      <blockquote>"Karyawan kami bukan sekadar tenaga kerja — mereka adalah <strong>keluarga</strong> dan bagian dari <strong>warisan 88 Group</strong> yang terus tumbuh bersama."</blockquote>
      <div class="author">— <span>Manajemen 88 Group</span> · Bondowoso, Jawa Timur</div>
    </div>

    <!-- CTA -->
    <div class="cta-banner">
      <h2><i class="fas fa-briefcase"></i> Ada pertanyaan seputar karir?</h2>
      <a href="#" class="btn-primary"><i class="fas fa-whatsapp"></i> Hubungi HRD</a>
    </div>

    <?= $this->include('templates/footer') ?>

  </div>

  <script>
    function setPosisiLamar(posisi) {
      // Set posisi yang dipilih ke dropdown form
      const selectPosisi = document.getElementById('posisi_lamar');
      if (selectPosisi) {
        selectPosisi.value = posisi;
        // Scroll to form and highlight
        setTimeout(() => {
          const formElement = document.querySelector('#lamar');
          if (formElement) {
            formElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Add subtle highlight effect
            const formLamar = document.querySelector('.form-lamar');
            if (formLamar) {
              formLamar.style.transition = 'all 0.3s ease';
              formLamar.style.boxShadow = '0 0 30px rgba(212, 175, 55, 0.4)';
              setTimeout(() => {
                formLamar.style.boxShadow = '';
              }, 2000);
            }
          }
        }, 100);
      }
    }
  </script>
</body>
</html>
