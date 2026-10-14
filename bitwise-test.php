<?php
$a = 12; // 1100
$b = 10; // 1010
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bitwise Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Operator Bitwise</h1>
        <p>a = <?= $a ?> (<?= decbin($a) ?>)</p>
        <p>b = <?= $b ?> (<?= decbin($b) ?>)</p>
        <ul class="chip-list">
            <li>a & b = <?= $a & $b ?></li>
            <li>a | b = <?= $a | $b ?></li>
            <li>a ^ b = <?= $a ^ $b ?></li>
            <li>~a = <?= ~$a ?></li>
            <li>a << 1 = <?= $a << 1 ?></li>
            <li>a >> 1 = <?= $a >> 1 ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>