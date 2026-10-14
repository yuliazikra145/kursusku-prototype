<?php
$a = 10;
$b = 3;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Operator Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Operator Aritmatika</h1>
        <p>a = <?= $a ?>, b = <?= $b ?></p>
        <ul class="chip-list">
            <li>+ = <?= $a + $b ?></li>
            <li>- = <?= $a - $b ?></li>
            <li>* = <?= $a * $b ?></li>
            <li>/ = <?= $a / $b ?></li>
            <li>% = <?= $a % $b ?></li>
            <li>** = <?= $a ** $b ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>