<?php
require_once 'data.php';
require_once 'helpers.php';

// Cek metode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('registration.php');
}

// Ambil data dari form
$nama     = sanitize($_POST['nama'] ?? '');
$email    = sanitize($_POST['email'] ?? '');
$whatsapp = sanitize($_POST['whatsapp'] ?? '');
$course_code = sanitize($_POST['course'] ?? '');
$jadwal   = sanitize($_POST['jadwal'] ?? '');
$catatan  = sanitize($_POST['catatan'] ?? '');

// Validasi
$errors = [];
if (empty($nama)) $errors[] = "Nama wajib diisi.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";
if (empty($whatsapp)) $errors[] = "Nomor WhatsApp wajib diisi.";
if (empty($course_code)) $errors[] = "Kursus wajib dipilih.";
if (empty($jadwal)) $errors[] = "Jadwal wajib dipilih.";

$course = getCourseByCode($course_code);
if (!$course) $errors[] = "Kursus tidak ditemukan.";

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pendaftaran - <?= htmlspecialchars($siteName) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php"><span class="brand-title"><?= htmlspecialchars($siteName) ?></span></a>
        <nav><a href="index.php">Beranda</a></nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-error">
                <strong>Terjadi Kesalahan:</strong>
                <ul>
                    <?php foreach ($errors as $e): ?>
                        <li><?= $e ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="registration.php" class="btn-primary">Kembali ke Formulir</a>
        <?php else: ?>
            <h1>✅ Pendaftaran Berhasil!</h1>
            <p>Terima kasih, <strong><?= $nama ?></strong>. Berikut ringkasan pendaftaran Anda:</p>

            <div class="result-grid">
                <p><strong>Nama:</strong> <?= $nama ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>WhatsApp:</strong> <?= $whatsapp ?></p>
                <p><strong>Kursus:</strong> <?= htmlspecialchars($course['name']) ?></p>
                <p><strong>Kode:</strong> <?= htmlspecialchars($course['code']) ?></p>
                <p><strong>Biaya:</strong> <?= formatRupiah($course['fee']) ?></p>
                <p><strong>Jadwal:</strong> <?= ucfirst($jadwal) ?></p>
                <p><strong>Tanggal Mulai:</strong> <?= $course['start_date'] ?></p>
            </div>

            <?php if ($catatan): ?>
                <div class="alert alert-info">
                    <strong>Catatan:</strong> <?= $catatan ?>
                </div>
            <?php endif; ?>

            <p style="margin-top:24px;">Simpan bukti pendaftaran ini sebagai konfirmasi Anda.</p>
            <a href="index.php" class="btn-primary">Kembali ke Beranda</a>
        <?php endif; ?>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong></p>
    </div>
</footer>

</body>
</html>