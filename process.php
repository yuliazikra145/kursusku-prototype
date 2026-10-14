<?php
require_once 'helpers.php';

// File ini contoh untuk memproses form sederhana
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = sanitize($_POST['nama'] ?? 'Anonim');
    echo "<h1>Halo, $nama!</h1>";
    echo "<p>Data Anda telah diproses.</p>";
    echo '<a href="index.php">Kembali</a>';
} else {
    redirect('index.php');
}
?>