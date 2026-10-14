<?php
// ============================================================
//  index.php — Beranda Utama KursusKu (FINAL GABUNGAN)
// ============================================================
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

// Array Data 6 Kursus
$courses = [
    [
        'code'       => 'WEB-01',
        'name'       => 'Web Dasar',
        'fee'        => 200000,
        'quota'      => 30,
        'registered' => 12,
        'start_date' => '2026-09-21'
    ],
    [
        'code'       => 'PHP-01',
        'name'       => 'PHP Dasar',
        'fee'        => 250000,
        'quota'      => 30,
        'registered' => 18,
        'start_date' => '2026-09-22'
    ],
    [
        'code'       => 'PHP-02',
        'name'       => 'PHP Lanjutan',
        'fee'        => 300000,
        'quota'      => 25,
        'registered' => 24,
        'start_date' => '2026-09-24'
    ],
    [
        'code'       => 'LAR-01',
        'name'       => 'Laravel Fundamental',
        'fee'        => 350000,
        'quota'      => 25,
        'registered' => 25,
        'start_date' => '2026-09-28'
    ],
    [
        'code'       => 'DB-01',
        'name'       => 'MySQL Dasar',
        'fee'        => 275000,
        'quota'      => 20,
        'registered' => 0,
        'start_date' => '2026-10-01'
    ],
    [
        'code'       => 'UI-01',
        'name'       => 'UI Web Dasar',
        'fee'        => 225000,
        'quota'      => 35,
        'registered' => 9,
        'start_date' => '2026-10-03'
    ]
];

// Hitung statistik untuk hero
$totalCourses  = count($courses);
$totalTersedia = 0;
$totalPeserta  = 0;
foreach ($courses as $c) {
    if (statusKursus($c['quota'], $c['registered']) === 'Tersedia') {
        $totalTersedia++;
    }
    $totalPeserta += $c['registered'];
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?> - Platform Belajar Kursus Online</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Utama -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ============================================================
     HEADER & NAVIGASI
============================================================ -->
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <div class="brand-logo-wrapper">
                <img src="assets/images/logo.svg" alt="Logo <?= htmlspecialchars($siteName) ?>" class="brand-logo"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <span class="logo-fallback-icon" style="display:none;">🎓</span>
            </div>
            <span class="brand-title"><?= htmlspecialchars($siteName) ?></span>
        </a>

        <nav aria-label="Navigasi utama">
            <a href="index.php" class="active">Beranda</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#alur">Cara Daftar</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
            <a href="fee-calculator.php">Estimasi Biaya</a>
            <a href="registration.php" class="btn-nav-action">Daftar Kursus</a>
        </nav>
    </div>
</header>

<main class="container">

    <!-- ============================================================
         HERO SECTION
    ============================================================ -->
    <section id="hero" class="hero-section">
        <div class="hero-content">
            <span class="eyebrow">Selamat Datang di <?= htmlspecialchars($siteName) ?></span>
            <h1><?= htmlspecialchars($tagline) ?></h1>
            <p>
                Temukan kursus teknologi yang relevan dan terstruktur untuk meningkatkan keterampilan
                pemrograman Anda dari dasar hingga mahir.
            </p>

            <div class="hero-buttons">
                <a href="registration.php" class="btn-primary">Daftar Kursus Sekarang</a>
                <a href="#katalog" class="btn-secondary">Lihat Katalog</a>
                <a href="fee-calculator.php" class="btn-outline">Hitung Biaya</a>
            </div>

            <div class="hero-meta">
                <span>📚 <?= $totalCourses ?> Kursus Tersedia</span>
                <span>✅ <?= $totalTersedia ?> Kelas Masih Terbuka</span>
                <span>👥 <?= $totalPeserta ?> Peserta Terdaftar</span>
            </div>
        </div>
    </section>

    <!-- ============================================================
         KEUNGGULAN
    ============================================================ -->
    <section id="keunggulan" class="section-block">
        <div class="section-header">
            <h2>Mengapa Memilih <?= htmlspecialchars($siteName) ?>?</h2>
            <p>Fasilitas dan metode pembelajaran terarah untuk menunjang karier Anda.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3>Materi Terarah</h3>
                <p>Materi disusun secara bertahap dan terstruktur dari tingkat dasar hingga penerapan praktis.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💻</div>
                <h3>Belajar dengan Proyek</h3>
                <p>Setiap modul pembelajaran dilengkapi dengan studi kasus nyata untuk portofolio Anda.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">👨‍🏫</div>
                <h3>Pendampingan Praktik</h3>
                <p>Proses belajar dibimbing melalui demonstrasi, latihan terpandu, dan evaluasi berkala.</p>
            </div>
        </div>
    </section>

    <!-- ============================================================
         MEDIA — GAMBAR & VIDEO
    ============================================================ -->
    <section id="media" class="section-block">
        <div class="section-header">
            <h2>Kenali Program Kami</h2>
            <p>Lihat suasana belajar dan video pengenalan singkat mengenai kurikulum kami.</p>
        </div>

        <div class="media-grid">
            <!-- Kartu Foto Aktivitas -->
            <div class="media-card">
                <div class="media-preview-container">
                    <img src="assets/images/hero-kursus.jpg"
                         alt="Kegiatan Kursus Komputer <?= htmlspecialchars($siteName) ?>"
                         class="media-image"
                         onerror="this.src='https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80';">
                </div>
                <div class="media-body">
                    <span class="media-badge">Fasilitas Belajar</span>
                    <h3>Suasana Kelas Interaktif</h3>
                    <p>Mahasiswa dan peserta umum dapat mengikuti sesi praktikum dengan fasilitas komputer modern dan nyaman.</p>
                </div>
            </div>

            <!-- Kartu Video Pengenalan -->
            <div class="media-card">
                <div class="media-preview-container">
                    <video controls class="media-video" poster="assets/images/hero-kursus.jpg">
                        <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                        Browser Anda tidak mendukung pemutar video HTML5.
                    </video>
                </div>
                <div class="media-body">
                    <span class="media-badge">Video Profil</span>
                    <h3>Video Singkat Kursus</h3>
                    <p>Saksikan gambaran singkat mengenai alur praktikum, kurikulum, dan testimoni para peserta <?= htmlspecialchars($siteName) ?>.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         KATALOG KURSUS
    ============================================================ -->
    <section id="katalog" class="section-block">
        <div class="section-header">
            <h2>Katalog Kursus & Status Kuota</h2>
            <p>Pemeriksaan status ketersediaan kursi dan jadwal kelas terupdate:</p>
        </div>

        <div class="table-container">
            <table class="cost-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kursus</th>
                        <th>Biaya</th>
                        <th>Kuota</th>
                        <th>Terdaftar</th>
                        <th>Sisa Kursi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <?php
                            $status      = statusKursus($course['quota'], $course['registered']);
                            $statusClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
                            $sisa        = sisaKursi($course['quota'], $course['registered']);
                        ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($course['code']) ?></strong></td>
                            <td><?= htmlspecialchars($course['name']) ?></td>
                            <td><?= formatRupiah($course['fee']) ?></td>
                            <td><?= $course['quota'] ?></td>
                            <td><?= $course['registered'] ?></td>
                            <td><?= $sisa ?> kursi</td>
                            <td><span class="<?= $statusClass ?>"><?= htmlspecialchars($status) ?></span></td>
                            <td>
                                <?php if ($status !== 'Penuh'): ?>
                                    <a href="registration.php?course=<?= urlencode($course['code']) ?>"
                                       class="btn-table-action">Daftar</a>
                                <?php else: ?>
                                    <span class="text-muted">Penuh</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- KALKULATOR BIAYA BANNER -->
        <div class="cta-banner">
            <div class="cta-text">
                <h3>Estimasi Biaya Kursus</h3>
                <p>Hitung estimasi total biaya kursus berdasarkan jumlah peserta, diskon khusus, dan biaya administrasi.</p>
            </div>
            <a href="fee-calculator.php" class="btn-primary">Hitung Estimasi Biaya</a>
        </div>
    </section>

    <!-- ============================================================
         ALUR PENDAFTARAN
    ============================================================ -->
    <section id="alur" class="section-block">
        <div class="section-header">
            <h2>Cara Mendaftar</h2>
            <p>5 langkah mudah untuk memulai kelas pertama Anda di <?= htmlspecialchars($siteName) ?>:</p>
        </div>

        <ol class="steps-list">
            <li>
                <span class="step-num">1</span>
                <div class="step-content">
                    <strong>Pilih Kursus</strong>
                    <p>Pilih kelas yang diminati pada katalog kursus di atas.</p>
                </div>
            </li>
            <li>
                <span class="step-num">2</span>
                <div class="step-content">
                    <strong>Buka Form Pendaftaran</strong>
                    <p>Klik tombol <strong>Daftar Kursus</strong> pada menu atau daftar katalog.</p>
                </div>
            </li>
            <li>
                <span class="step-num">3</span>
                <div class="step-content">
                    <strong>Isi Data Diri</strong>
                    <p>Lengkapi formulir dengan data diri latihan Anda yang valid.</p>
                </div>
            </li>
            <li>
                <span class="step-num">4</span>
                <div class="step-content">
                    <strong>Konfirmasi Data</strong>
                    <p>Periksa kembali ringkasan data dan program pilihan Anda.</p>
                </div>
            </li>
            <li>
                <span class="step-num">5</span>
                <div class="step-content">
                    <strong>Selesai & Simpan Bukti</strong>
                    <p>Kirimkan pendaftaran dan simpan konfirmasi bukti pendaftaran Anda.</p>
                </div>
            </li>
        </ol>
    </section>

    <!-- ============================================================
         LATIHAN PRAKTIKUM PHP
    ============================================================ -->
    <section id="latihan" class="section-block">
        <div class="section-header">
            <h2>🧪 Latihan Praktikum PHP</h2>
            <p>Kumpulan file latihan untuk memperdalam materi PHP.</p>
        </div>

        <div class="feature-grid">
            <a href="loop-lab.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🔁</div>
                <h3>Loop Lab</h3>
                <p>Latihan for, while, do-while, foreach, break, continue.</p>
            </a>

            <a href="history.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">📜</div>
                <h3>History</h3>
                <p>Riwayat pendaftaran peserta kursus.</p>
            </a>

            <a href="operator-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">➕</div>
                <h3>Operator Test</h3>
                <p>Latihan operator aritmatika PHP.</p>
            </a>

            <a href="string-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🔤</div>
                <h3>String Test</h3>
                <p>Latihan manipulasi string di PHP.</p>
            </a>

            <a href="logic-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🧠</div>
                <h3>Logic Test</h3>
                <p>Latihan operator logika (AND, OR, NOT, XOR).</p>
            </a>

            <a href="data-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">📦</div>
                <h3>Data Test</h3>
                <p>Latihan tipe data PHP.</p>
            </a>

            <a href="bitwise-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🔢</div>
                <h3>Bitwise Test</h3>
                <p>Latihan operator bitwise PHP.</p>
            </a>

            <a href="procedure-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">⚙️</div>
                <h3>Procedure Test</h3>
                <p>Latihan fungsi dan prosedur di PHP.</p>
            </a>

            <a href="test-functions.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🧰</div>
                <h3>Test Functions</h3>
                <p>Uji fungsi helper (formatRupiah, dll).</p>
            </a>

            <a href="text-matrix.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">📊</div>
                <h3>Text Matrix</h3>
                <p>Latihan array multidimensi.</p>
            </a>

            <a href="type-data-test.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🧬</div>
                <h3>Type Data Test</h3>
                <p>Uji tipe data lanjutan (gettype, var_export).</p>
            </a>

            <a href="server-time.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🕒</div>
                <h3>Server Time</h3>
                <p>Menampilkan waktu server (Asia/Jakarta).</p>
            </a>

            <a href="hello.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">👋</div>
                <h3>Hello World</h3>
                <p>Latihan dasar PHP pertama.</p>
            </a>

            <a href="get-demo.php?nama=Peserta&umur=20" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">🔗</div>
                <h3>GET Demo</h3>
                <p>Demo pengiriman data via URL (metode GET).</p>
            </a>

            <a href="process.php" class="feature-card" style="text-decoration:none;">
                <div class="feature-icon">📨</div>
                <h3>Process Demo</h3>
                <p>Demo pemrosesan form sederhana.</p>
            </a>
        </div>
    </section>

</main>

<!-- ============================================================
     FOOTER
============================================================ -->
<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>