<?php
// File proses umum (mungkin untuk login atau register)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Data diterima: " . htmlspecialchars($_POST['data'] ?? 'Kosong');
} else {
    echo "Akses langsung tidak diizinkan.";
}
?>