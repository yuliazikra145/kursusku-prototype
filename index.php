<?php
// ============================================================
//  index.php — Beranda Utama KursusKu (CSS INLINE)
// ============================================================
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$tagline  = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year     = date('Y');

$courses = [
    ['code' => 'WEB-01', 'name' => 'Web Dasar',           'fee' => 200000, 'quota' => 30, 'registered' => 12, 'start_date' => '2026-09-21'],
    ['code' => 'PHP-01', 'name' => 'PHP Dasar',           'fee' => 250000, 'quota' => 30, 'registered' => 18, 'start_date' => '2026-09-22'],
    ['code' => 'PHP-02', 'name' => 'PHP Lanjutan',        'fee' => 300000, 'quota' => 25, 'registered' => 24, 'start_date' => '2026-09-24'],
    ['code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'fee' => 350000, 'quota' => 25, 'registered' => 25, 'start_date' => '2026-09-28'],
    ['code' => 'DB-01',  'name' => 'MySQL Dasar',         'fee' => 275000, 'quota' => 20, 'registered' => 0,  'start_date' => '2026-10-01'],
    ['code' => 'UI-01',  'name' => 'UI Web Dasar',        'fee' => 225000, 'quota' => 35, 'registered' => 9,  'start_date' => '2026-10-03'],
];

$totalCourses  = count($courses);
$totalTersedia = 0;
$totalPeserta  = 0;
foreach ($courses as $c) {
    if (statusKursus($c['quota'], $c['registered']) === 'Tersedia') $totalTersedia++;
    $totalPeserta += $c['registered'];
}
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

    <!-- ============================================================
         CSS INLINE — langsung di dalam file ini
    ============================================================ -->
    <style>
    :root {
        --teal-900: #134e4a;
        --teal-800: #115e59;
        --teal-700: #0f766e;
        --teal-600: #0d9488;
        --teal-500: #14b8a6;
        --teal-100: #ccfbf1;
        --teal-50:  #f0fdfa;
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
        --red-700: #b91c1c;
        --red-50:  #fef2f2;
        --green-700: #15803d;
        --green-50:  #f0fdf4;
        --shadow-xs: 0 1px 3px rgba(15,23,42,.06);
        --shadow-sm: 0 4px 12px rgba(15,23,42,.05);
        --shadow:    0 12px 32px rgba(15,118,110,.08);
        --shadow-lg: 0 24px 60px rgba(15,118,110,.15);
        --radius-xs: 6px;
        --radius-sm: 10px;
        --radius:    16px;
        --radius-lg: 22px;
        --transition: all .3s cubic-bezier(.4,0,.2,1);
        --gradient-teal: linear-gradient(135deg, var(--teal-700), var(--teal-600));
        --gradient-hero: linear-gradient(180deg, var(--teal-50), #f8fffe);
    }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
        font-family: 'Plus Jakarta Sans', 'Segoe UI', Arial, sans-serif;
        font-size: 16px; line-height: 1.65;
        color: var(--slate-800); background: var(--white);
        min-height: 100vh; display: flex; flex-direction: column;
        -webkit-font-smoothing: antialiased;
    }
    main { flex: 1; }
    a { color: var(--teal-700); text-decoration: none; transition: all .15s ease; }
    a:hover { color: var(--teal-900); }
    img, video { max-width: 100%; height: auto; display: block; }

    .container { width: min(1120px, 90%); margin: 0 auto; }

    /* ===== HEADER ===== */
    .site-header {
        background: linear-gradient(135deg, var(--teal-900), var(--teal-700));
        color: var(--white); padding: 16px 0;
        position: sticky; top: 0; z-index: 100;
        box-shadow: 0 6px 24px rgba(15,23,42,.1);
    }
    .nav-wrap { display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; }
    .brand { display: inline-flex; align-items: center; gap: 12px; color: var(--white); font-weight: 800; }
    .brand:hover { color: var(--teal-100); }
    .brand-logo-wrapper {
        display: grid; place-items: center;
        width: 46px; height: 46px; border-radius: 14px;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.2);
        transition: all .3s ease;
    }
    .brand:hover .brand-logo-wrapper { background: rgba(255,255,255,.25); transform: rotate(-6deg) scale(1.05); }
    .brand-logo { width: 28px; height: 28px; object-fit: contain; }
    .logo-fallback-icon { font-size: 24px; display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; }
    .brand-title { font-size: 22px; font-weight: 800; letter-spacing: -.5px; }

    .site-header nav { display: flex; align-items: center; gap: 20px; flex-wrap: wrap; }
    .site-header nav a {
        color: rgba(255,255,255,.85); font-size: 14px; font-weight: 600;
        padding: 8px 0; position: relative;
    }
    .site-header nav a::after {
        content: ''; position: absolute; bottom: 0; left: 0;
        width: 0; height: 2px; background: var(--teal-100);
        transition: width .3s ease;
    }
    .site-header nav a:hover, .site-header nav a.active { color: var(--white); }
    .site-header nav a:hover::after, .site-header nav a.active::after { width: 100%; }
    .btn-nav-action {
        background: var(--white) !important; color: var(--teal-900) !important;
        padding: 9px 16px !important; border-radius: var(--radius-sm);
        font-weight: 700; box-shadow: 0 4px 12px rgba(0,0,0,.1);
    }
    .btn-nav-action::after { display: none !important; }
    .btn-nav-action:hover { background: var(--teal-100) !important; transform: translateY(-2px); }

    /* ===== HERO ===== */
    .hero-section {
        background:
            radial-gradient(circle at 85% 15%, rgba(204,251,241,.7) 0%, transparent 45%),
            radial-gradient(circle at 10% 90%, rgba(15,118,110,.1) 0%, transparent 40%),
            var(--gradient-hero);
        padding: 90px 0 100px; text-align: center;
        position: relative; overflow: hidden;
    }
    .hero-section::before {
        content: ''; position: absolute; top: -100px; right: -100px;
        width: 400px; height: 400px;
        background: radial-gradient(circle, rgba(204,251,241,.5), transparent 70%);
        border-radius: 50%; pointer-events: none;
    }
    .hero-content { max-width: 780px; margin: 0 auto; position: relative; z-index: 1; }
    .eyebrow {
        display: inline-block; font-size: 12px; font-weight: 800;
        letter-spacing: .15em; text-transform: uppercase;
        color: var(--teal-700); background: var(--white);
        padding: 8px 18px; border-radius: 999px; margin-bottom: 22px;
        box-shadow: var(--shadow-sm); border: 1px solid var(--teal-100);
    }
    .hero-section h1 {
        font-size: clamp(34px, 5vw, 58px); line-height: 1.05;
        font-weight: 800; color: var(--slate-950);
        letter-spacing: -.03em; margin-bottom: 22px;
    }
    .hero-section p { font-size: 18px; color: var(--slate-600); max-width: 620px; margin: 0 auto; }
    .hero-buttons { display: flex; flex-wrap: wrap; gap: 14px; justify-content: center; margin-top: 34px; }
    .hero-meta { display: flex; gap: 12px; margin-top: 32px; justify-content: center; flex-wrap: wrap; }
    .hero-meta span {
        background: var(--white); padding: 10px 16px; border-radius: var(--radius-sm);
        font-size: 13px; font-weight: 700; color: var(--slate-700);
        box-shadow: var(--shadow-xs); border: 1px solid var(--slate-100);
    }

    /* ===== BUTTONS ===== */
    .btn-primary, .btn-secondary, .btn-outline {
        display: inline-block; padding: 13px 24px; border-radius: var(--radius-sm);
        font-weight: 700; font-size: 15px; cursor: pointer;
        transition: var(--transition); border: 2px solid transparent;
        text-align: center; font-family: inherit; line-height: 1.4;
    }
    .btn-primary { background: var(--gradient-teal); color: var(--white); box-shadow: 0 8px 24px rgba(15,118,110,.25); }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 14px 34px rgba(15,118,110,.4); color: var(--white); }
    .btn-secondary { background: var(--white); color: var(--teal-800); border-color: var(--teal-700); }
    .btn-secondary:hover { background: var(--teal-50); transform: translateY(-3px); color: var(--teal-900); }
    .btn-outline { background: transparent; color: var(--slate-700); border-color: var(--slate-300); }
    .btn-outline:hover { border-color: var(--teal-700); color: var(--teal-700); background: var(--white); }

    /* ===== SECTION ===== */
    .section-block { padding: 80px 0; }
    .section-header { text-align: center; margin-bottom: 48px; }
    .section-header h2 {
        font-size: clamp(26px, 4vw, 40px); font-weight: 800;
        color: var(--slate-950); letter-spacing: -.02em; margin-bottom: 12px;
    }
    .section-header p { color: var(--slate-600); font-size: 16px; max-width: 620px; margin: 0 auto; }

    /* ===== FEATURE GRID ===== */
    .feature-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .feature-card {
        background: var(--white); border: 1px solid var(--slate-200);
        border-radius: var(--radius); padding: 32px 26px;
        transition: var(--transition); position: relative;
        overflow: hidden; color: var(--slate-800);
    }
    .feature-card::before {
        content: ''; position: absolute; top: 0; left: 0;
        width: 100%; height: 4px; background: var(--gradient-teal);
        transform: scaleX(0); transform-origin: left;
        transition: transform .4s ease;
    }
    .feature-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); border-color: var(--teal-100); }
    .feature-card:hover::before { transform: scaleX(1); }
    .feature-icon { font-size: 42px; margin-bottom: 18px; display: inline-block; transition: var(--transition); }
    .feature-card:hover .feature-icon { transform: scale(1.15) rotate(-5deg); }
    .feature-card h3 { font-size: 20px; font-weight: 700; color: var(--slate-950); margin-bottom: 10px; }
    .feature-card p { color: var(--slate-600); font-size: 15px; line-height: 1.6; }

    a.feature-card, a.feature-card:link, a.feature-card:visited,
    a.feature-card:hover, a.feature-card:active {
        display: block; color: var(--slate-800); text-decoration: none;
        background: var(--white); border: 1px solid var(--slate-200);
        border-radius: var(--radius); padding: 32px 26px;
        transition: var(--transition); position: relative; overflow: hidden;
    }
    a.feature-card::before {
        content: ''; position: absolute; top: 0; left: 0;
        width: 100%; height: 4px; background: var(--gradient-teal);
        transform: scaleX(0); transform-origin: left;
        transition: transform .4s ease;
    }
    a.feature-card:hover { color: var(--slate-800); transform: translateY(-8px); box-shadow: var(--shadow-lg); border-color: var(--teal-100); }
    a.feature-card:hover::before { transform: scaleX(1); }
    a.feature-card h3 { color: var(--slate-950); font-size: 20px; font-weight: 700; margin-bottom: 10px; }
    a.feature-card p { color: var(--slate-600); font-size: 15px; line-height: 1.6; }
    a.feature-card .feature-icon { font-size: 42px; margin-bottom: 18px; display: inline-block; }
    a.feature-card:hover .feature-icon { transform: scale(1.15) rotate(-5deg); }

    /* ===== MEDIA ===== */
    .media-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 28px; }
    .media-card {
        background: var(--white); border-radius: var(--radius-lg);
        overflow: hidden; border: 1px solid var(--slate-200);
        transition: var(--transition); display: flex; flex-direction: column;
    }
    .media-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); }
    .media-preview-container { position: relative; width: 100%; height: 260px; overflow: hidden; background: var(--slate-100); }
    .media-image, .media-video { width: 100%; height: 100%; object-fit: cover; transition: transform .6s ease; }
    .media-card:hover .media-image { transform: scale(1.08); }
    .media-body { padding: 24px; display: flex; flex-direction: column; gap: 10px; }
    .media-badge {
        display: inline-block; background: var(--teal-50); color: var(--teal-800);
        font-size: 11px; font-weight: 800; letter-spacing: .08em;
        text-transform: uppercase; padding: 6px 12px;
        border-radius: 999px; align-self: flex-start; border: 1px solid var(--teal-100);
    }
    .media-body h3 { font-size: 20px; font-weight: 700; color: var(--slate-950); }
    .media-body p { color: var(--slate-600); font-size: 15px; }

    /* ===== TABLE ===== */
    .table-container {
        overflow-x: auto; border-radius: var(--radius);
        border: 1px solid var(--slate-200); background: var(--white);
        box-shadow: var(--shadow-sm);
    }
    .cost-table { width: 100%; border-collapse: collapse; min-width: 820px; }
    .cost-table th, .cost-table td {
        padding: 16px 18px; text-align: left;
        border-bottom: 1px solid var(--slate-200); font-size: 14px;
    }
    .cost-table th {
        background: linear-gradient(180deg, #ecfdf5, #f0fdfa);
        color: var(--teal-900); font-size: 12px; font-weight: 800;
        text-transform: uppercase; letter-spacing: .06em;
        border-bottom: 2px solid var(--teal-100); white-space: nowrap;
    }
    .cost-table tbody tr:nth-child(even) { background: rgba(240,253,250,.4); }
    .cost-table tbody tr:hover { background: var(--teal-50); }
    .badge-available, .badge-full {
        display: inline-block; padding: 5px 12px; border-radius: 999px;
        font-weight: 800; font-size: 12px;
    }
    .badge-available { background: var(--green-50); color: var(--green-700); }
    .badge-full { background: var(--red-50); color: var(--red-700); }
    .btn-table-action {
        display: inline-block; background: var(--teal-700); color: var(--white);
        padding: 8px 16px; border-radius: var(--radius-xs);
        font-size: 13px; font-weight: 700; transition: var(--transition);
    }
    .btn-table-action:hover { background: var(--teal-900); color: var(--white); transform: translateY(-2px); }
    .text-muted { color: var(--slate-400); font-size: 13px; font-style: italic; }

    /* ===== CTA BANNER ===== */
    .cta-banner {
        margin-top: 40px; padding: 40px 44px; border-radius: var(--radius-lg);
        background: linear-gradient(135deg, var(--teal-900), var(--teal-700));
        color: var(--white); display: flex; align-items: center;
        justify-content: space-between; gap: 24px; flex-wrap: wrap;
        box-shadow: var(--shadow-lg); position: relative; overflow: hidden;
    }
    .cta-banner::after { content: ''; position: absolute; right: -60px; top: -60px; width: 240px; height: 240px; background: rgba(255,255,255,.08); border-radius: 50%; }
    .cta-text h3 { font-size: 24px; font-weight: 800; margin-bottom: 8px; }
    .cta-text p { color: rgba(255,255,255,.85); font-size: 15px; max-width: 520px; }
    .cta-banner .btn-primary { background: var(--white); color: var(--teal-900); position: relative; z-index: 1; }

    /* ===== STEPS ===== */
    .steps-list { list-style: none; padding: 0; display: grid; grid-template-columns: repeat(5, 1fr); gap: 18px; }
    .steps-list li {
        background: var(--white); border: 1px solid var(--slate-200);
        border-top: 4px solid var(--teal-700);
        border-radius: 0 0 var(--radius) var(--radius);
        padding: 26px 20px; transition: var(--transition);
    }
    .steps-list li:hover { transform: translateY(-8px); box-shadow: var(--shadow-lg); border-top-color: var(--teal-600); }
    .step-num {
        display: grid; place-items: center; width: 44px; height: 44px;
        border-radius: 50%; background: var(--gradient-teal); color: var(--white);
        font-weight: 800; font-size: 17px; margin-bottom: 16px;
        box-shadow: 0 6px 18px rgba(15,118,110,.35);
    }
    .step-content strong { display: block; font-size: 16px; color: var(--slate-950); margin-bottom: 6px; font-weight: 700; }
    .step-content p { color: var(--slate-600); font-size: 14px; line-height: 1.55; }

    /* ===== FOOTER ===== */
    .site-footer {
        background: var(--slate-950); color: var(--slate-400);
        padding: 36px 0 32px; margin-top: auto; text-align: center; position: relative;
    }
    .site-footer::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; background: var(--gradient-teal); }
    .footer-content { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 12px; }
    .site-footer p { font-size: 14px; }
    .site-footer strong { color: var(--white); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 900px) {
        .feature-grid { grid-template-columns: repeat(2, 1fr); }
        .steps-list   { grid-template-columns: repeat(2, 1fr); }
        .media-grid   { grid-template-columns: 1fr; }
        .media-preview-container { height: 280px; }
        .section-block { padding: 60px 0; }
        .hero-section { padding: 70px 0 80px; }
    }
    @media (max-width: 680px) {
        body { font-size: 15px; }
        .site-header { padding: 12px 0; position: static; }
        .nav-wrap { flex-direction: column; align-items: flex-start; gap: 12px; }
        .site-header nav { gap: 14px; width: 100%; flex-wrap: wrap; }
        .site-header nav a { font-size: 13px; }
        .btn-nav-action { padding: 8px 14px !important; font-size: 13px !important; }
        .brand-title { font-size: 20px; }
        .brand-logo-wrapper { width: 40px; height: 40px; }
        .hero-section { padding: 50px 0 60px; }
        .hero-section h1 { font-size: 30px; }
        .hero-section p { font-size: 15px; }
        .hero-buttons { flex-direction: column; width: 100%; }
        .hero-buttons a { width: 100%; }
        .section-block { padding: 48px 0; }
        .section-header { margin-bottom: 32px; }
        .feature-grid, .steps-list { grid-template-columns: 1fr; }
        .cta-banner { padding: 28px 24px; flex-direction: column; text-align: center; }
        .cta-banner .btn-primary { width: 100%; }
        .media-preview-container { height: 220px; }
        .cost-table th, .cost-table td { padding: 12px 14px; font-size: 13px; }
    }

    /* ===== ANIMASI ===== */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .section-block, .hero-content { animation: fadeInUp .5s ease-out both; }
    .feature-card, a.feature-card { animation: fadeInUp .5s ease-out both; }
    </style>
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <div class="brand-logo-wrapper">
                <img src="assets/images/logo.svg" alt="Logo" class="brand-logo"
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
            <a href="#latihan">Latihan</a>
            <a href="fee-calculator.php">Estimasi Biaya</a>
            <a href="registration.php" class="btn-nav-action">Daftar Kursus</a>
        </nav>
    </div>
</header>

<main class="container">

    <section id="hero" class="hero-section">
        <div class="hero-content">
            <span class="eyebrow">Selamat Datang di <?= htmlspecialchars($siteName) ?></span>
            <h1><?= htmlspecialchars($tagline) ?></h1>
            <p>Temukan kursus teknologi yang relevan dan terstruktur untuk meningkatkan keterampilan pemrograman Anda dari dasar hingga mahir.</p>
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

    <section id="keunggulan" class="section-block">
        <div class="section-header">
            <h2>Mengapa Memilih <?= htmlspecialchars($siteName) ?>?</h2>
            <p>Fasilitas dan metode pembelajaran terarah untuk menunjang karier Anda.</p>
        </div>
        <div class="feature-grid">
            <div class="feature-card"><div class="feature-icon">📚</div><h3>Materi Terarah</h3><p>Materi disusun secara bertahap dan terstruktur dari tingkat dasar hingga penerapan praktis.</p></div>
            <div class="feature-card"><div class="feature-icon">💻</div><h3>Belajar dengan Proyek</h3><p>Setiap modul pembelajaran dilengkapi dengan studi kasus nyata untuk portofolio Anda.</p></div>
            <div class="feature-card"><div class="feature-icon">👨‍🏫</div><h3>Pendampingan Praktik</h3><p>Proses belajar dibimbing melalui demonstrasi, latihan terpandu, dan evaluasi berkala.</p></div>
        </div>
    </section>

    <section id="media" class="section-block">
        <div class="section-header">
            <h2>Kenali Program Kami</h2>
            <p>Lihat suasana belajar dan video pengenalan singkat mengenai kurikulum kami.</p>
        </div>
        <div class="media-grid">
            <div class="media-card">
                <div class="media-preview-container">
                    <img src="assets/images/hero-kursus.jpg" alt="Kegiatan Kursus" class="media-image"
                         onerror="this.src='https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80';">
                </div>
                <div class="media-body">
                    <span class="media-badge">Fasilitas Belajar</span>
                    <h3>Suasana Kelas Interaktif</h3>
                    <p>Mahasiswa dan peserta umum dapat mengikuti sesi praktikum dengan fasilitas komputer modern dan nyaman.</p>
                </div>
            </div>
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
                    <p>Saksikan gambaran singkat mengenai alur praktikum, kurikulum, dan testimoni para peserta.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="katalog" class="section-block">
        <div class="section-header">
            <h2>Katalog Kursus & Status Kuota</h2>
            <p>Pemeriksaan status ketersediaan kursi dan jadwal kelas terupdate:</p>
        </div>
        <div class="table-container">
            <table class="cost-table">
                <thead>
                    <tr>
                        <th>Kode</th><th>Nama Kursus</th><th>Biaya</th><th>Kuota</th>
                        <th>Terdaftar</th><th>Sisa Kursi</th><th>Status</th><th>Aksi</th>
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
                                    <a href="registration.php?course=<?= urlencode($course['code']) ?>" class="btn-table-action">Daftar</a>
                                <?php else: ?>
                                    <span class="text-muted">Penuh</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="cta-banner">
            <div class="cta-text">
                <h3>Estimasi Biaya Kursus</h3>
                <p>Hitung estimasi total biaya kursus berdasarkan jumlah peserta, diskon khusus, dan biaya administrasi.</p>
            </div>
            <a href="fee-calculator.php" class="btn-primary">Hitung Estimasi Biaya</a>
        </div>
    </section>

    <section id="alur" class="section-block">
        <div class="section-header">
            <h2>Cara Mendaftar</h2>
            <p>5 langkah mudah untuk memulai kelas pertama Anda:</p>
        </div>
        <ol class="steps-list">
            <li><span class="step-num">1</span><div class="step-content"><strong>Pilih Kursus</strong><p>Pilih kelas yang diminati pada katalog kursus di atas.</p></div></li>
            <li><span class="step-num">2</span><div class="step-content"><strong>Buka Form Pendaftaran</strong><p>Klik tombol Daftar Kursus pada menu atau daftar katalog.</p></div></li>
            <li><span class="step-num">3</span><div class="step-content"><strong>Isi Data Diri</strong><p>Lengkapi formulir dengan data diri latihan Anda yang valid.</p></div></li>
            <li><span class="step-num">4</span><div class="step-content"><strong>Konfirmasi Data</strong><p>Periksa kembali ringkasan data dan program pilihan Anda.</p></div></li>
            <li><span class="step-num">5</span><div class="step-content"><strong>Selesai & Simpan Bukti</strong><p>Kirimkan pendaftaran dan simpan konfirmasi bukti pendaftaran Anda.</p></div></li>
        </ol>
    </section>

    <section id="latihan" class="section-block">
        <div class="section-header">
            <h2>🧪 Latihan Praktikum PHP</h2>
            <p>Kumpulan file latihan untuk memperdalam materi PHP.</p>
        </div>
        <div class="feature-grid">
            <a href="loop-lab.php" class="feature-card"><div class="feature-icon">🔁</div><h3>Loop Lab</h3><p>Latihan for, while, do-while, foreach, break, continue.</p></a>
            <a href="history.php" class="feature-card"><div class="feature-icon">📜</div><h3>History</h3><p>Riwayat pendaftaran peserta kursus.</p></a>
            <a href="operator-test.php" class="feature-card"><div class="feature-icon">➕</div><h3>Operator Test</h3><p>Latihan operator aritmatika PHP.</p></a>
            <a href="string-test.php" class="feature-card"><div class="feature-icon">🔤</div><h3>String Test</h3><p>Latihan manipulasi string di PHP.</p></a>
            <a href="logic-test.php" class="feature-card"><div class="feature-icon">🧠</div><h3>Logic Test</h3><p>Latihan operator logika (AND, OR, NOT, XOR).</p></a>
            <a href="data-test.php" class="feature-card"><div class="feature-icon">📦</div><h3>Data Test</h3><p>Latihan tipe data PHP.</p></a>
            <a href="bitwise-test.php" class="feature-card"><div class="feature-icon">🔢</div><h3>Bitwise Test</h3><p>Latihan operator bitwise PHP.</p></a>
            <a href="procedure-test.php" class="feature-card"><div class="feature-icon">⚙️</div><h3>Procedure Test</h3><p>Latihan fungsi dan prosedur di PHP.</p></a>
            <a href="test-functions.php" class="feature-card"><div class="feature-icon">🧰</div><h3>Test Functions</h3><p>Uji fungsi helper (formatRupiah, dll).</p></a>
            <a href="text-matrix.php" class="feature-card"><div class="feature-icon">📊</div><h3>Text Matrix</h3><p>Latihan array multidimensi.</p></a>
            <a href="type-data-test.php" class="feature-card"><div class="feature-icon">🧬</div><h3>Type Data Test</h3><p>Uji tipe data lanjutan.</p></a>
            <a href="server-time.php" class="feature-card"><div class="feature-icon">🕒</div><h3>Server Time</h3><p>Menampilkan waktu server (Asia/Jakarta).</p></a>
            <a href="hello.php" class="feature-card"><div class="feature-icon">👋</div><h3>Hello World</h3><p>Latihan dasar PHP pertama.</p></a>
            <a href="get-demo.php?nama=Peserta&umur=20" class="feature-card"><div class="feature-icon">🔗</div><h3>GET Demo</h3><p>Demo pengiriman data via URL.</p></a>
            <a href="process.php" class="feature-card"><div class="feature-icon">📨</div><h3>Process Demo</h3><p>Demo pemrosesan form sederhana.</p></a>
        </div>
    </section>

</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>