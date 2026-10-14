<?php
// ============================================================
//  string-test.php — Latihan Fungsi String di PHP
// ============================================================
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$year     = date('Y');

// ==============================
// DATA INPUT
// ==============================
$namaLengkap = "  budi santoso  ";
$email       = "Budi.Santoso@Gmail.com";
$kursus      = "Pemrograman Web Dasar dengan PHP";
$noHp        = "0812-3456-7890";

// 1. Membersihkan & mengubah huruf
$namaBersih  = trim($namaLengkap);
$namaRapi    = ucwords($namaBersih);
$emailKecil  = strtolower($email);
$kursusBesar = strtoupper($kursus);

// 2. Panjang & posisi
$panjangNama = strlen($namaBersih);
$posisiPHP   = strpos($kursus, 'PHP');

// 3. Mengambil sebagian string
$kataPertama = substr($namaRapi, 0, 4);
$domainEmail = substr(strrchr($emailKecil, '@'), 1);

// 4. Mengganti & memecah
$noHpBersih = str_replace('-', '', $noHp);
$katakata   = explode(' ', $kursus);
$slug       = strtolower(str_replace(' ', '-', $kursus));

// 5. Menggabungkan & mengulang
$gabung = implode(' | ', $katakata);
$garis  = str_repeat('=', 20);

// 6. Cek isi string
$adaPHP     = strpos($kursus, 'PHP') !== false;
$emailValid = filter_var($emailKecil, FILTER_VALIDATE_EMAIL) !== false;
$awalan08   = substr($noHpBersih, 0, 2) === '08';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Test - <?= htmlspecialchars($siteName) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- ⬇️ INI YANG WAJIB — LINK KE CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- =========================
     HEADER
========================= -->
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
            <a href="index.php">Beranda</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
            <a href="string-test.php" class="active">String Test</a>
            <a href="registration.php" class="btn-nav-action">Daftar</a>
        </nav>
    </div>
</header>

<!-- =========================
     KONTEN — PAKAI UTILITY-PAGE
========================= -->
<main class="utility-page">
    <div class="utility-card wide-card">

        <h1>🔤 String Test</h1>
        <p>Latihan berbagai fungsi manipulasi string di PHP.</p>

        <!-- 1. MENGUBAH HURUF -->
        <h2>1. Mengubah Huruf</h2>
        <div class="result-grid">
            <p><strong>Nama asli:</strong><br>"<?= htmlspecialchars($namaLengkap) ?>"</p>
            <p><strong>trim():</strong><br>"<?= htmlspecialchars($namaBersih) ?>"</p>
            <p><strong>ucwords():</strong><br><?= htmlspecialchars($namaRapi) ?></p>
            <p><strong>strtolower() email:</strong><br><?= htmlspecialchars($emailKecil) ?></p>
            <p><strong>strtoupper() kursus:</strong><br><?= htmlspecialchars($kursusBesar) ?></p>
        </div>

        <!-- 2. PANJANG & POSISI -->
        <h2>2. Panjang & Posisi</h2>
        <div class="result-grid">
            <p><strong>Panjang nama:</strong><br><?= $panjangNama ?> karakter</p>
            <p><strong>Posisi "PHP":</strong><br>Index ke-<?= $posisiPHP ?></p>
        </div>

        <!-- 3. AMBIL SEBAGIAN -->
        <h2>3. Mengambil Sebagian String</h2>
        <div class="result-grid">
            <p><strong>4 huruf pertama nama:</strong><br><?= htmlspecialchars($kataPertama) ?></p>
            <p><strong>Domain email:</strong><br><?= htmlspecialchars($domainEmail) ?></p>
        </div>

        <!-- 4. GANTI & PECAH -->
        <h2>4. Mengganti & Memecah</h2>
        <div class="result-grid">
            <p><strong>No HP asli:</strong><br><?= htmlspecialchars($noHp) ?></p>
            <p><strong>No HP bersih:</strong><br><?= htmlspecialchars($noHpBersih) ?></p>
            <p><strong>Jumlah kata:</strong><br><?= count($katakata) ?> kata</p>
            <p><strong>Slug URL:</strong><br><code><?= htmlspecialchars($slug) ?></code></p>
        </div>

        <!-- 5. GABUNG & ULANG -->
        <h2>5. Menggabungkan & Mengulang</h2>
        <div class="result-grid">
            <p><strong>implode(' | '):</strong><br><?= htmlspecialchars($gabung) ?></p>
            <p><strong>str_repeat('=', 20):</strong><br><code><?= $garis ?></code></p>
        </div>

        <!-- 6. PENGECEKAN -->
        <h2>6. Pengecekan</h2>
        <ul class="chip-list">
            <li>Mengandung "PHP"? <strong><?= $adaPHP ? 'Ya ✅' : 'Tidak ❌' ?></strong></li>
            <li>Email valid? <strong><?= $emailValid ? 'Ya ✅' : 'Tidak ❌' ?></strong></li>
            <li>No HP diawali "08"? <strong><?= $awalan08 ? 'Ya ✅' : 'Tidak ❌' ?></strong></li>
        </ul>

        <!-- TOMBOL KEMBALI -->
        <p style="margin-top:32px;">
            <a href="index.php" class="btn-primary">← Kembali ke Beranda</a>
        </p>

    </div>
</main>

<!-- =========================
     FOOTER
========================= -->
<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>