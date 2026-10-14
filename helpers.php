<?php
// helpers.php — Kumpulan fungsi bantuan

/**
 * Sanitasi input dari user
 */
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Format angka ke Rupiah
 */
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

/**
 * Redirect ke halaman lain
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Cek status kursus (Tersedia / Penuh)
 */
function statusKursus($quota, $registered) {
    return ($registered >= $quota) ? 'Penuh' : 'Tersedia';
}

/**
 * Hitung sisa kursi
 */
function sisaKursi($quota, $registered) {
    $sisa = $quota - $registered;
    return ($sisa < 0) ? 0 : $sisa;
}

/**
 * Cek apakah user sudah login (simulasi)
 */
function isLoggedIn() {
    return isset($_SESSION['user']);
}
?>