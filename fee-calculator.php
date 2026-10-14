<?php
require_once 'data.php';
require_once 'helpers.php';

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_code = sanitize($_POST['course'] ?? '');
    $jumlah      = (int)($_POST['jumlah'] ?? 1);
    $diskon      = (int)($_POST['diskon'] ?? 0); // dalam persen
    $admin       = 25000;

    $course = getCourseByCode($course_code);

    if ($course && $jumlah > 0) {
        $subtotal = $course['fee'] * $jumlah;
        $potongan = $subtotal * ($diskon / 100);
        $total    = $subtotal - $potongan + $admin;

        $result = [
            'course'   => $course,
            'jumlah'   => $jumlah,
            'subtotal' => $subtotal,
            'diskon'   => $diskon,
            'potongan' => $potongan,
            'admin'    => $admin,
            'total'    => $total
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Estimasi Biaya - <?= htmlspecialchars($siteName) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php"><span class="brand-title"><?= htmlspecialchars($siteName) ?></span></a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="registration.php" class="btn-nav-action">Daftar</a>
        </nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card">
        <h1>Kalkulator Estimasi Biaya</h1>
        <p>Hitung total biaya kursus berdasarkan jumlah peserta dan diskon.</p>

        <form method="POST" class="stack-form">
            <div class="form-grid">
                <div class="field">
                    <label for="course">Pilih Kursus</label>
                    <select id="course" name="course" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($courses as $c): ?>
                            <option value="<?= $c['code'] ?>">
                                <?= htmlspecialchars($c['name']) ?> - <?= formatRupiah($c['fee']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="field">
                    <label for="jumlah">Jumlah Peserta</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>
                </div>

                <div class="field">
                    <label for="diskon">Diskon (%)</label>
                    <input type="number" id="diskon" name="diskon" min="0" max="100" value="0">
                </div>
            </div>

            <button type="submit" class="btn-primary">Hitung Biaya</button>
        </form>

        <?php if ($result): ?>
            <div class="formula-box" style="margin-top:24px;">
                <p><strong>Kursus:</strong> <?= htmlspecialchars($result['course']['name']) ?></p>
                <p><strong>Jumlah Peserta:</strong> <?= $result['jumlah'] ?> orang</p>
                <hr>
                <p>Subtotal: <?= formatRupiah($result['subtotal']) ?></p>
                <p>Diskon (<?= $result['diskon'] ?>%): - <?= formatRupiah($result['potongan']) ?></p>
                <p>Biaya Admin: + <?= formatRupiah($result['admin']) ?></p>
                <hr>
                <p class="total-row"><strong>Total Bayar: <?= formatRupiah($result['total']) ?></strong></p>
            </div>
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