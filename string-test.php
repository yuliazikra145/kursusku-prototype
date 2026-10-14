<?php
$text = "KursusKu Platform Belajar";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>String Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Manipulasi String</h1>
        <p>Text: <strong><?= $text ?></strong></p>
        <ul class="chip-list">
            <li>Panjang: <?= strlen($text) ?></li>
            <li>Huruf besar: <?= strtoupper($text) ?></li>
            <li>Huruf kecil: <?= strtolower($text) ?></li>
            <li>Kata: <?= str_word_count($text) ?></li>
            <li>Reverse: <?= strrev($text) ?></li>
            <li>Replace: <?= str_replace('KursusKu', 'Kami', $text) ?></li>
        </ul>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>