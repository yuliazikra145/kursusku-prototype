<?php
// Simulasi GET Request
if (isset($_GET['pesan'])) {
    echo "Pesan: " . htmlspecialchars($_GET['pesan']);
} else {
    echo "Tidak ada pesan.";
}
?>