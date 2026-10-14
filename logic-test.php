<?php
$a = true;
$b = false;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Logic Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Operator Logika</h1>
        <ul class="chip-list">
            <li>a AND b: <?= ($a && $b) ? 'true' : 'false' ?></li>
            <li>a OR b: <?= ($a || $b) ? 'true' : 'false' ?></li>
            <li>NOT a: <?= (!$a) ? 'true' : 'false' ?></li>
            <li>a XOR b: <?= ($a xor $b) ? 'true' : 'false' ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>