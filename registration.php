<?php
require_once 'data.php';
require_once 'helpers.php';

// Ambil kode kursus dari URL (opsional)
$selected_code = isset($_GET['course']) ? sanitize($_GET['course']) : '';
$selected_course = $selected_code ? getCourseByCode($selected_code) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - <?= htmlspecialchars($siteName) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <span class="brand-title"><?= htmlspecialchars($siteName) ?></span>
        </a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="fee-calculator.php">Estimasi Biaya</a>
            <a href="registration.php" class="btn-nav-action">Daftar</a>
        </nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card">
        <h1>Formulir Pendaftaran Kursus</h1>
        <p>Lengkapi data diri Anda di bawah ini.</p>

        <form action="process-registration.php" method="POST" class="stack-form">

            <div class="form-grid">
                <div class="field">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="field">
                    <label for="whatsapp">No. WhatsApp</label>
                    <input type="tel" id="whatsapp" name="whatsapp" required>
                </div>

                <div class="field">
                    <label for="course">Pilih Kursus</label>
                    <select id="course" name="course" required>
                        <option value="">-- Pilih Kursus --</option>
                        <?php foreach ($courses as $c): ?>
                            <option value="<?= $c['code'] ?>"
                                <?= ($selected_course && $selected_course['code'] === $c['code']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['name']) ?> - <?= formatRupiah($c['fee']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <fieldset class="field">
                <legend>Jadwal Kelas</legend>
                <div class="choice-row">
                    <label><input type="radio" name="jadwal" value="pagi" required> Pagi (08.00 - 11.00)</label>
                    <label><input type="radio" name="jadwal" value="siang"> Siang (13.00 - 16.00)</label>
                    <label><input type="radio" name="jadwal" value="malam"> Malam (18.30 - 21.00)</label>
                </div>
            </fieldset>

            <div class="field">
                <label for="catatan">Catatan Tambahan (Opsional)</label>
                <textarea id="catatan" name="catatan" rows="3"></textarea>
            </div>

            <button type="submit" class="btn-primary">Kirim Pendaftaran</button>
        </form>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>