<?php
$nama = htmlspecialchars($_GET['nama'] ?? 'Tamu');
$umur = (int)($_GET['umur'] ?? 0);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Demo GET</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Demo Metode GET</h1>
        <p>Halo, <strong><?= $nama ?></strong>!</p>
        <p>Umur Anda: <strong><?= $umur ?></strong> tahun.</p>
        <p>Coba ubah URL: <code>?nama=Andi&umur=20</code></p>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>