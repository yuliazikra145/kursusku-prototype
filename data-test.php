<?php
$string = "KursusKu";
$integer = 2026;
$float = 3.14;
$boolean = true;
$array = ['PHP', 'MySQL', 'Laravel'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Tipe Data</h1>
        <ul class="chip-list">
            <li>String: <?= $string ?></li>
            <li>Integer: <?= $integer ?></li>
            <li>Float: <?= $float ?></li>
            <li>Boolean: <?= $boolean ? 'true' : 'false' ?></li>
            <li>Array: <?= implode(', ', $array) ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>