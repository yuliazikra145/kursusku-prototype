<?php
$data = [
    'String'  => 'KursusKu',
    'Integer' => 2026,
    'Float'   => 3.14,
    'Boolean' => true,
    'Null'    => null,
    'Array'   => ['PHP', 'MySQL'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Type Data Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="utility-page">
    <div class="utility-card wide-card">
        <h1>Uji Tipe Data Lanjutan</h1>
        <table class="cost-table compact-table">
            <thead>
                <tr><th>Variabel</th><th>Nilai</th><th>Tipe</th></tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $val): ?>
                    <tr>
                        <td><strong><?= $key ?></strong></td>
                        <td><?= is_array($val) ? implode(', ', $val) : var_export($val, true) ?></td>
                        <td><code><?= gettype($val) ?></code></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn-primary">Kembali</a>
    </div>
</main>
</body>
</html>