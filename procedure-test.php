<?php
function sapa($nama) {
    return "Halo, $nama!";
}

function hitungLuasPersegi($sisi) {
    return $sisi * $sisi;
}

function tampilkanList($array) {
    $html = "<ul class='chip-list'>";
    foreach ($array as $item) {
        $html .= "<li>$item</li>";
    }
    $html .= "</ul>";
    return $html;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Procedure Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card">
        <h1>Latihan Prosedur & Fungsi</h1>
        <p><?= sapa('Peserta Kursus') ?></p>
        <p>Luas persegi (sisi=5): <strong><?= hitungLuasPersegi(5) ?></strong></p>
        <h3>Daftar Kursus:</h3>
        <?= tampilkanList(['PHP Dasar', 'Web Dasar', 'Laravel']) ?>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>