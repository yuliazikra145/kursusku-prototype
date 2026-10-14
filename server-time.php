<?php
date_default_timezone_set('Asia/Jakarta');
$sekarang = date('l, d F Y H:i:s');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Waktu Server</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Waktu Server</h1>
        <p class="server-time"><?= $sekarang ?></p>
        <p>Zona waktu: <strong>Asia/Jakarta</strong></p>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>