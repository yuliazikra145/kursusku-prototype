<?php
require_once 'helpers.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Test Functions</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Uji Fungsi Helper</h1>
        <ul class="chip-list">
            <li>formatRupiah(250000) = <?= formatRupiah(250000) ?></li>
            <li>statusKursus(30, 30) = <?= statusKursus(30, 30) ?></li>
            <li>statusKursus(30, 12) = <?= statusKursus(30, 12) ?></li>
            <li>sisaKursi(30, 12) = <?= sisaKursi(30, 12) ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>