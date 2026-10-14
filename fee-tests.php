<?php
require_once 'data.php';
// Uji coba perhitungan fee
foreach ($courses as $c) {
    echo $c['name'] . ": " . rupiah($c['fee']) . "<br>";
}
?>