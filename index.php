<?php
// =========================================================================
// BAGIAN 1: LOGIKA & FUNGSI (Menggabungkan helpers.php, data.php, dll)
// =========================================================================

// --- Fungsi Helper (dari helpers.php) ---
function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function formatTanggal($tanggal) {
    return date('d M Y', strtotime($tanggal));
}

function sisaKursi($quota, $registered) {
    return $quota - $registered;
}

function statusKursus($quota, $registered) {
    if ($registered >= $quota) return 'Penuh';
    if ($registered >= ($quota * 0.8)) return 'Hampir Penuh';
    return 'Tersedia';
}

// --- Data Kursus (dari data.php / data-test.php) ---
$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar', 'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan', 'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01', 'name' => 'MySQL Dasar', 'fee' => 275000, 'quota' => 20, 'registered' => 0, 'start_date' => '2026-10-01'],
    ['code' => 'UI-01', 'name' => 'UI Web Dasar', 'fee' => 225000, 'quota' => 35, 'registered' => 9, 'start_date' => '2026-10-03'],
];

$siteName = "KursusKu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";
$tahun = date("Y");

// --- Logika Form Pendaftaran (dari process-registration.php) ---
$pesan_sukses = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['daftar_kursus'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $kodeKursus = htmlspecialchars($_POST['kursus']);
    
    $kursusTerpilih = null;
    foreach ($courses as $c) {
        if ($c['code'] === $kodeKursus) { $kursusTerpilih = $c; break; }
    }
    
    if ($kursusTerpilih) {
        $pesan_sukses = "Terima kasih <strong>$nama</strong>! Anda berhasil mendaftar kursus <strong>{$kursusTerpilih['name']}</strong>. Konfirmasi dikirim ke <strong>$email</strong>.";
    }
}

// --- Logika Kalkulator Biaya (dari fee-calculator.php) ---
$total_biaya = 0;
$rincian_biaya = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hitung_biaya'])) {
    if (!empty($_POST['courses'])) {
        foreach ($_POST['courses'] as $kode) {
            foreach ($courses as $c) {
                if ($c['code'] === $kode) {
                    $rincian_biaya[] = $c;
                    $total_biaya += $c['fee'];
                }
            }
        }
    }
}

// --- Logika Uji Coba (dari logic-test.php, loop-lab.php, operator-test.php, dll) ---
$log_test = [];
$log_test[] = "Tipe Data String: " . $siteName;
$log_test[] = "Tipe Data Integer: " . $tahun;
$log_test[] = "Operator Aritmatika (5 + 3): " . (5 + 3);
$log_test[] = "Operator Perbandingan (10 > 5): " . (10 > 5 ? 'True' : 'False');
$log_test[] = "Looping (For 1-5): " . implode(", ", range(1, 5));
$log_test[] = "Procedure/Function (Rupiah): " . rupiah(150000);
$log_test[] = "Bitwise AND (5 & 3): " . (5 & 3);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $siteName; ?> - Prototype</title>
  
  <style>
    /* ================= CSS (Menggabungkan style.css) ================= */
    :root {
      --primary: #2563eb;
      --primary-dark: #1d4ed8;
      --secondary: #f3f4f6;
      --text: #1f2937;
      --text-light: #6b7280;
      --white: #ffffff;
      --border: #e5e7eb;
      --success-bg: #d1fae5; --success-text: #065f46;
      --danger-bg: #fee2e2; --danger-text: #991b1b;
      --warning-bg: #fef3c7; --warning-text: #92400e;
      --font: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      --radius: 8px;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: var(--font); line-height: 1.6; color: var(--text); background: var(--white); }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
    
    /* Header & Nav */
    .header { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: var(--white); padding: 40px 0; text-align: center; }
    .header h1 { font-size: 2.5rem; margin-bottom: 10px; }
    .navbar { background: var(--white); border-bottom: 1px solid var(--border); position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
    .navbar .container { display: flex; justify-content: center; gap: 20px; padding: 15px 20px; flex-wrap: wrap; }
    .navbar a { text-decoration: none; color: var(--text); font-weight: 600; transition: color 0.3s; }
    .navbar a:hover { color: var(--primary); }
    
    /* Hero */
    .hero { padding: 60px 0; background: var(--secondary); }
    .hero-content { display: flex; align-items: center; justify-content: space-between; gap: 40px; }
    .hero-content > div { flex: 1; }
    .hero h2 { font-size: 2rem; margin-bottom: 20px; }
    .hero p { font-size: 1.1rem; color: var(--text-light); margin-bottom: 30px; }
    .button { display: inline-block; background: var(--primary); color: var(--white); padding: 12px 24px; text-decoration: none; border-radius: var(--radius); font-weight: 600; transition: background 0.3s, transform 0.2s; margin-right: 10px; margin-bottom: 10px; border: none; cursor: pointer; }
    .button:hover { background: var(--primary-dark); transform: translateY(-2px); }
    .hero-image { width: 100%; height: auto; border-radius: var(--radius); box-shadow: var(--shadow); background: #ddd; min-height: 300px; display: flex; align-items: center; justify-content: center; color: #666; }
    
    /* Section & Tabel */
    .section { padding: 60px 0; }
    .section-light { background: var(--secondary); }
    .section h2 { font-size: 1.8rem; margin-bottom: 30px; text-align: center; position: relative; padding-bottom: 15px; }
    .section h2::after { content: ''; position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 60px; height: 4px; background: var(--primary); border-radius: 2px; }
    table { width: 100%; border-collapse: collapse; background: var(--white); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); }
    thead { background: var(--primary); color: var(--white); }
    th, td { padding: 15px 20px; text-align: left; border-bottom: 1px solid var(--border); }
    th { font-weight: 600; text-transform: uppercase; font-size: 0.85rem; }
    tbody tr:hover { background: #f8fafc; }
    .badge { padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 600; display: inline-block; }
    .badge-available { background: var(--success-bg); color: var(--success-text); }
    .badge-full { background: var(--danger-bg); color: var(--danger-text); }
    .badge-warning { background: var(--warning-bg); color: var(--warning-text); }
    
    /* Form */
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
    .form-group input, .form-group select { width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: var(--radius); font-family: var(--font); }
    .alert { padding: 15px; border-radius: var(--radius); margin-bottom: 20px; }
    .alert-success { background: var(--success-bg); color: var(--success-text); border: 1px solid #a7f3d0; }
    .alert-info { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
    
    /* Video & Footer */
    .video-placeholder { display: flex; justify-content: center; margin-top: 20px; }
    .video-placeholder iframe { border-radius: var(--radius); box-shadow: var(--shadow); max-width: 100%; }
    .footer { background: #1f2937; color: #9ca3af; text-align: center; padding: 30px 0; font-size: 0.9rem; }
    
    /* Log Test Box */
    .log-box { background: #1e1e1e; color: #d4d4d4; padding: 20px; border-radius: var(--radius); font-family: 'Courier New', monospace; font-size: 0.9rem; overflow-x: auto; }
    .log-box p { margin-bottom: 5px; }
    .log-box .key { color: #9cdcfe; }
    .log-box .val { color: #ce9178; }

    @media (max-width: 768px) {
      .hero-content { flex-direction: column-reverse; text-align: center; }
      .navbar .container { flex-direction: column; gap: 10px; }
      table { display: block; overflow-x: auto; white-space: nowrap; }
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header class="header">
    <div class="container">
      <h1><?php echo $siteName; ?></h1>
      <p><?php echo $tagline; ?></p>
    </div>
  </header>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="container">
      <a href="#beranda">Beranda</a>
      <a href="#kursus">Katalog</a>
      <a href="#pendaftaran">Daftar Kursus</a>
      <a href="#kalkulator">Estimasi Biaya</a>
      <a href="#test-log">Log Test</a>
    </div>
  </nav>

  <main>
    <!-- HERO SECTION -->
    <section id="beranda" class="hero">
      <div class="container">
        <div class="hero-content">
          <div>
            <h2>Selamat Datang di <?php echo $siteName; ?></h2>
            <p>Platform belajar teknologi untuk mahasiswa yang ingin meningkatkan kemampuan pemrograman web.</p>
            <a href="#kursus" class="button">Lihat Kursus</a>
            <a href="#kalkulator" class="button">Lihat Estimasi Biaya</a>
          </div>
          <div>
            <!-- Placeholder Gambar -->
            <img src="https://via.placeholder.com/600x400/2563eb/ffffff?text=Hero+Kursus" alt="Hero" class="hero-image">
          </div>
        </div>
      </div>
    </section>

    <!-- KATALOG KURSUS -->
    <section id="kursus" class="section">
      <div class="container">
        <h2>Katalog Kursus</h2>
        <table>
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama</th>
              <th>Biaya</th>
              <th>Mulai</th>
              <th>Sisa</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($courses as $course): ?>
              <?php
              $status = statusKursus($course['quota'], $course['registered']);
              $statusClass = 'badge-available';
              if ($status === 'Penuh') $statusClass = 'badge-full';
              elseif ($status === 'Hampir Penuh') $statusClass = 'badge-warning';
              ?>
              <tr>
                <td><?= htmlspecialchars($course['code']) ?></td>
                <td><?= htmlspecialchars($course['name']) ?></td>
                <td><?= rupiah($course['fee']) ?></td>
                <td><?= formatTanggal($course['start_date']) ?></td>
                <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                <td><span class="badge <?= $statusClass ?>"><?= $status ?></span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>

    <!-- FORM PENDAFTARAN & KALKULATOR -->
    <section id="pendaftaran" class="section section-light">
      <div class="container">
        <h2>Pendaftaran & Kalkulator Biaya</h2>
        
        <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
            
            <!-- Form Pendaftaran -->
            <div style="flex: 1; min-width: 300px; background: white; padding: 30px; border-radius: var(--radius); box-shadow: var(--shadow);">
                <h3 style="margin-bottom: 20px;">Formulir Pendaftaran</h3>
                
                <?php if ($pesan_sukses): ?>
                    <div class="alert alert-success"><?= $pesan_sukses ?></div>
                <?php endif; ?>

                <form action="#pendaftaran" method="POST">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" required placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required placeholder="contoh@email.com">
                    </div>
                    <div class="form-group">
                        <label>Pilih Kursus</label>
                        <select name="kursus" required>
                            <option value="">-- Pilih Kursus --</option>
                            <?php foreach ($courses as $c): ?>
                                <option value="<?= $c['code'] ?>"><?= $c['name'] ?> - <?= rupiah($c['fee']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" name="daftar_kursus" class="button">Kirim Pendaftaran</button>
                </form>
            </div>

            <!-- Kalkulator Biaya -->
            <div id="kalkulator" style="flex: 1; min-width: 300px; background: white; padding: 30px; border-radius: var(--radius); box-shadow: var(--shadow);">
                <h3 style="margin-bottom: 20px;">Kalkulator Estimasi Biaya</h3>
                <form action="#kalkulator" method="POST">
                    <div class="form-group">
                        <label>Pilih Kursus (Bisa lebih dari satu)</label>
                        <?php foreach ($courses as $c): ?>
                            <div style="margin-bottom: 8px;">
                                <input type="checkbox" name="courses[]" value="<?= $c['code'] ?>" id="c_<?= $c['code'] ?>">
                                <label for="c_<?= $c['code'] ?>" style="display: inline; font-weight: normal;">
                                    <?= $c['name'] ?> (<?= rupiah($c['fee']) ?>)
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="submit" name="hitung_biaya" class="button">Hitung Total</button>
                </form>

                <?php if (!empty($rincian_biaya)): ?>
                    <div class="alert alert-info" style="margin-top: 20px;">
                        <h4>Rincian Biaya:</h4>
                        <ul style="margin: 10px 0 10px 20px;">
                            <?php foreach ($rincian_biaya as $rb): ?>
                                <li><?= $rb['name'] ?>: <?= rupiah($rb['fee']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr style="border: 0; border-top: 1px solid #bae6fd; margin: 10px 0;">
                        <p style="font-size: 1.1rem; font-weight: bold;">Total: <?= rupiah($total_biaya) ?></p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
      </div>
    </section>

    <!-- VIDEO SECTION -->
    <section class="section">
      <div class="container">
        <h2>Video Pembelajaran</h2>
        <div class="video-placeholder">
          <iframe width="342" height="607" src="https://www.youtube.com/embed/nQinn48Bk2g" title="YouTube video" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </section>

    <!-- LOG TEST SECTION (Menggabungkan test-functions, type-data, logic, dll) -->
    <section id="test-log" class="section section-light">
      <div class="container">
        <h2>Log Uji Coba PHP (Debug)</h2>
        <div class="log-box">
            <p><span class="key">// Hasil Penggabungan File Test</span></p>
            <?php foreach ($log_test as $log): ?>
                <p><span class="val">></span> <?= htmlspecialchars($log) ?></p>
            <?php endforeach; ?>
            <br>
            <p><span class="key">// Data Array Kursus (dari data.php)</span></p>
            <p><span class="val">></span> Total Kursus: <?= count($courses) ?> item</p>
            <p><span class="val">></span> Kursus Pertama: <?= $courses[0]['name'] ?></p>
        </div>
      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <p>&copy; <?php echo $tahun; ?> <?php echo $siteName; ?>. Pemrograman Web III.</p>
    </div>
  </footer>

</body>
</html>