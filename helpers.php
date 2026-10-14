<?php
// helpers.php

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

function formatTanggal($tanggal) {
    return date('d M Y', strtotime($tanggal));
}

function sisaKursi($quota, $registered) {
    return $quota - $registered;
}

function statusKursus($quota, $registered) {
    if ($registered >= $quota) return 'Penuh';
    if ($registered >= ($quota * 0.8)) return 'Hampir Penuh';
    return 'Tersedia';
}
?>