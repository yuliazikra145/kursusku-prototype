<?php
// ============================================================
//  index.php — Beranda Utama KursusKu
// ============================================================
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar',           'fee' => 200000, 'quota' => 30, 'registered' => 12],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar',           'fee' => 250000, 'quota' => 30, 'registered' => 18],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan',        'fee' => 300000, 'quota' => 25, 'registered' => 24],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25],
    ['code' => 'DB-01',  'name' => 'MySQL Dasar',         'fee' => 275000, 'quota' => 20, 'registered' => 0],
    ['code' => 'UI-01',  'name' => 'UI Web Dasar',        'fee' => 225000, 'quota' => 35, 'registered' => 9],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?> - Platform Belajar Kursus Online</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
    /* ============================================================
       CSS BERANDA — TEMA DONGKER
    ============================================================ */
    :root {
        --navy-900: #0c1e3d;
        --navy-800: #142b52;
        --navy-700: #1e3a6e;
        --navy-600: #2d4a86;
        --navy-500: #3d5a9c;
        --navy-100: #dbe4f5;
        --navy-50:  #eef3fb;

        --slate-950: #0f172a;
        --slate-800: #1e293b;
        --slate-700: #334155;
        --slate-600: #475569;
        --slate-400: #94a3b8;
        --slate-300: #cbd5e1;
        --slate-200: #e2e8f0;
        --slate-100: #f1f5f9;
        --slate-50:  #f8fafc;
        --white: #ffffff;

        --radius-sm: 10px;
        --radius: 16px;
        --radius-lg: 22px;

        --shadow: 0 12px 32px rgba(30,58,110,.08);
        --shadow-lg: 0 24px 60px rgba(30,58,110,.15);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
        font-size: 16px;
        line-height: 1.65;
        color: var(--slate-800);
        background: var(--slate-50);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    main { flex: 1; }
    a { color: var(--navy-700); text-decoration: none; transition: all .2s ease; }
    a:hover { color: var(--navy-900); }
    img { max-width: 100%; height: auto; display: block; }

    .container { width: min(1120px, 90%); margin: 0 auto; }

    /* ============================================================
       HEADER — DONGKER
    ============================================================ */
    .site-header {
        background: var(--navy-900);
        color: var(--white);
        padding: 14px 0;
        box-shadow: 0 2px 12px rgba(12,30,61,.15);
    }
    .nav-wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        flex-wrap: wrap;
    }
    .brand {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: var(--white);
        font-weight: 800;
        font-size: 20px;
        letter-spacing: -.3px;
    }
    .brand:hover { color: var(--navy-100); }
    .brand-logo {
        width: 32px; height: 32px;
        display: grid; place-items: center;
        background: rgba(255,255,255,.1);
        border-radius: 8px;
        font-size: 18px;
    }
    .site-header nav {
        display: flex;
        align-items: center;
        gap: 22px;
        flex-wrap: wrap;
    }
    .site-header nav a {
        color: rgba(255,255,255,.85);
        font-size: 14px;
        font-weight: 600;
        padding: 6px 0;
        position: relative;
        transition: color .2s ease;
    }
    .site-header nav a:hover,
    .site-header nav a.active { color: var(--white); }

    /* ============================================================
       HERO — PUTIH BESAR DENGAN GAMBAR DI KANAN
    ============================================================ */
    .hero {
        background: var(--white);
        padding: 80px 0;
    }
    .hero-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .hero-content h1 {
        font-size: clamp(36px, 5vw, 56px);
        font-weight: 800;
        color: var(--navy-700);
        letter-spacing: -.03em;
        margin-bottom: 14px;
        line-height: 1.1;
    }
    .hero-content p {
        font-size: 16px;
        color: var(--slate-600);
        margin-bottom: 28px;
        max-width: 480px;
    }
    .hero-content .btn-hero {
        display: inline-block;
        background: var(--navy-700);
        color: var(--white);
        padding: 14px 28px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 15px;
        box-shadow: 0 6px 20px rgba(30,58,110,.25);
        transition: all .25s ease;
    }
    .hero-content .btn-hero:hover {
        background: var(--navy-900);
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(30,58,110,.35);
        color: var(--white);
    }
    .hero-image {
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
    }
    .hero-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
    }

    /* ============================================================
       VIDEO SECTION
    ============================================================ */
    .video-section {
        background: var(--slate-50);
        padding: 60px 0 80px;
        text-align: center;
    }
    .video-section h2 {
        font-size: clamp(24px, 3vw, 32px);
        font-weight: 800;
        color: var(--navy-700);
        margin-bottom: 30px;
    }
    .video-wrapper {
        max-width: 800px;
        margin: 0 auto;
        background: var(--slate-950);
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
    }
    .video-wrapper video {
        width: 100%;
        display: block;
    }

    /* ============================================================
       FOOTER — DONGKER
    ============================================================ */
    .site-footer {
        background: var(--navy-900);
        color: rgba(255,255,255,.7);
        padding: 24px 0;
        text-align: center;
        font-size: 14px;
    }
    .site-footer strong { color: var(--white); }

    /* ============================================================
       RESPONSIVE
    ============================================================ */
    @media (max-width: 900px) {
        .hero-inner { grid-template-columns: 1fr; gap: 40px; }
        .hero-image img { height: 300px; }
    }
    @media (max-width: 680px) {
        .site-header { padding: 12px 0; }
        .nav-wrap { flex-direction: column; align-items: flex-start; gap: 12px; }
        .site-header nav { gap: 14px; }
        .site-header nav a { font-size: 13px; }
        .hero { padding: 50px 0; }
        .hero-content h1 { font-size: 32px; }
        .hero-image img { height: 220px; }
        .video-section { padding: 40px 0 60px; }
    }
    </style>
</head>
<body>

<!-- ============================================================
     HEADER
============================================================ -->
<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <span class="brand-logo">🎓</span>
            <span><?= htmlspecialchars($siteName) ?></span>
        </a>
        <nav>
            <a href="index.php" class="active">Beranda</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#alur">Cara Daftar</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
            <a href="fee-calculator.php">Estimasi Biaya</a>
            <a href="registration.php">Daftar Kursus</a>
        </nav>
    </div>
</header>

<main>

    <!-- ============================================================
         HERO — PUTIH, TEXT KIRI, GAMBAR KANAN
    ============================================================ -->
    <section class="hero">
        <div class="container hero-inner">
            <div class="hero-content">
                <h1><?= htmlspecialchars($siteName) ?></h1>
                <p><?= htmlspecialchars($tagline) ?></p>
                <a href="#katalog" class="btn-hero">Lihat Katalog Kursus</a>
            </div>
            <div class="hero-image">
                <img src="assets/images/hero-kursus.jpg"
                     alt="Ilustrasi Kursus"
                     onerror="this.src='https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80';">
            </div>
        </div>
    </section>

    <!-- ============================================================
         KATALOG SINGKAT
    ============================================================ -->
    <section id="katalog" style="padding:70px 0; background:var(--white);">
        <div class="container">
            <h2 style="text-align:center; font-size:clamp(24px,3vw,32px); font-weight:800; color:var(--navy-700); margin-bottom:30px;">
                Katalog Kursus
            </h2>
            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:20px;">
                <?php foreach ($courses as $course): ?>
                    <?php
                        $status = statusKursus($course['quota'], $course['registered']);
                        $sisa   = sisaKursi($course['quota'], $course['registered']);
                    ?>
                    <div style="background:var(--white); border:1px solid var(--slate-200); border-radius:var(--radius); padding:24px; box-shadow:0 4px 12px rgba(15,23,42,.04);">
                        <h3 style="font-size:18px; font-weight:700; color:var(--navy-800); margin-bottom:8px;">
                            <?= htmlspecialchars($course['name']) ?>
                        </h3>
                        <p style="font-size:13px; color:var(--slate-500); margin-bottom:12px;">
                            Kode: <strong><?= htmlspecialchars($course['code']) ?></strong>
                        </p>
                        <p style="font-size:20px; font-weight:800; color:var(--navy-700); margin-bottom:12px;">
                            <?= formatRupiah($course['fee']) ?>
                        </p>
                        <p style="font-size:13px; color:var(--slate-600); margin-bottom:16px;">
                            Sisa kursi: <strong><?= $sisa ?></strong> ·
                            Status:
                            <span style="color:<?= ($status === 'Penuh') ? 'var(--red-700)' : 'var(--green-700)' ?>;">
                                <?= $status ?>
                            </span>
                        </p>
                        <?php if ($status !== 'Penuh'): ?>
                            <a href="registration.php?course=<?= urlencode($course['code']) ?>"
                               style="display:inline-block; background:var(--navy-700); color:var(--white); padding:10px 20px; border-radius:8px; font-weight:700; font-size:14px;">
                                Daftar
                            </a>
                        <?php else: ?>
                            <span style="color:var(--slate-400); font-style:italic; font-size:14px;">Kuota penuh</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ============================================================
         VIDEO PERKENALAN
    ============================================================ -->
    <section class="video-section">
        <div class="container">
            <h2>Video Perkenalan <?= htmlspecialchars($siteName) ?></h2>
            <div class="video-wrapper">
                <video controls poster="assets/images/hero-kursus.jpg">
                    <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video HTML5.
                </video>
            </div>
        </div>
    </section>

</main>

<!-- ============================================================
     FOOTER
============================================================ -->
<footer class="site-footer">
    <div class="container">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> · Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>