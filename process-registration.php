<?php
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$year     = date('Y');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('registration.php');
}

$nama        = sanitize($_POST['nama'] ?? '');
$email       = sanitize($_POST['email'] ?? '');
$whatsapp    = sanitize($_POST['whatsapp'] ?? '');
$prodi       = sanitize($_POST['prodi'] ?? '');
$course_code = sanitize($_POST['course'] ?? '');
$jenis       = sanitize($_POST['jenis_peserta'] ?? 'umum');
$minat       = $_POST['minat'] ?? [];
$catatan     = sanitize($_POST['catatan'] ?? '');
$sumber      = sanitize($_POST['sumber'] ?? '');

$errors = [];
if (empty($nama))        $errors[] = "Nama wajib diisi.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";
if (empty($whatsapp))    $errors[] = "Nomor HP/WhatsApp wajib diisi.";
if (empty($course_code)) $errors[] = "Kursus wajib dipilih.";
if (empty($sumber))      $errors[] = "Sumber informasi wajib dipilih.";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran <?= htmlspecialchars($siteName) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <div class="brand-logo-wrapper"><span class="logo-fallback-icon">🎓</span></div>
            <span class="brand-title"><?= htmlspecialchars($siteName) ?></span>
        </a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="registration.php">Daftar</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
        </nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card wide-card">
        <?php if (!empty($errors)): ?>
            <h1>⚠️ Terjadi Kesalahan</h1>
            <div class="alert alert-error">
                <strong>Mohon periksa kembali data Anda:</strong>
                <ul>
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <p style="margin-top:24px;">
                <a href="registration.php" class="btn-primary">← Kembali ke Formulir</a>
            </p>
        <?php else: ?>
            <h1>✅ Pendaftaran Diterima untuk Diproses</h1>
            <p>Periksa kembali data latihan berikut.</p>

            <div class="result-grid" style="margin-top:24px;">
                <p><strong>Nama:</strong><br><?= htmlspecialchars($nama) ?></p>
                <p><strong>Email:</strong><br><?= htmlspecialchars($email) ?></p>
                <p><strong>Nomor HP:</strong><br><?= htmlspecialchars($whatsapp) ?></p>
                <p><strong>Program Studi:</strong><br><?= htmlspecialchars($prodi ?: '-') ?></p>
                <p><strong>Kursus:</strong><br><?= htmlspecialchars($course_code) ?></p>
                <p><strong>Jenis Peserta:</strong><br><?= htmlspecialchars($jenis) ?></p>
                <p><strong>Minat:</strong><br><?= htmlspecialchars(is_array($minat) ? implode(', ', $minat) : ($minat ?: '-')) ?></p>
                <p><strong>Catatan:</strong><br><?= htmlspecialchars($catatan ?: '-') ?></p>
                <p><strong>Sumber:</strong><br><?= htmlspecialchars($sumber) ?></p>
            </div>

            <div class="alert alert-info" style="margin-top:24px;">
                <strong>Simpan bukti pendaftaran ini</strong> sebagai konfirmasi Anda.
            </div>

            <p style="margin-top:32px;">
                <a href="index.php" class="btn-primary">← Kembali ke Beranda</a>
                <a href="registration.php" class="btn-secondary" style="margin-left:8px;">Daftar Lagi</a>
            </p>
        <?php endif; ?>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>