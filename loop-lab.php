<?php

$siteName = 'KursusKu';

$courses = [
    'Web Dasar',
    'PHP Dasar',
    'PHP Lanjutan',
    'Laravel Fundamental',
    'MySQL Dasar',
    'UI Web Dasar'
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Loop Lab - <?= htmlspecialchars($siteName) ?></title>

    <link
        rel="stylesheet"
        href="/kursusku-prototype/assets/css/style.css?v=5"
    >

</head>

<body>

<header class="header">

    <div class="container">

        <h1><?= htmlspecialchars($siteName) ?></h1>

    </div>

</header>


<nav class="navbar">

    <div class="container">

        <a href="index.php">Beranda</a>

        <a href="index.php#kursus">Katalog</a>

        <a href="registration.php">Daftar Kursus</a>

        <a href="index.php#keunggulan">Keunggulan</a>

        <a href="index.php#kontak">Kontak</a>

    </div>

</nav>


<main>

    <section class="section">

        <div class="container">

            <h2>Loop Lab</h2>

            <p>
                Daftar kursus berikut ditampilkan menggunakan
                perulangan PHP.
            </p>

            <div class="form-card">

                <h3>Daftar Kursus</h3>

                <ul>

                    <?php foreach ($courses as $course): ?>

                        <li>
                            <?= htmlspecialchars($course) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        </div>

    </section>

</main>


<footer class="footer">

    <div class="container">

        <p>
            &copy; <?= date('Y') ?> <?= htmlspecialchars($siteName) ?>
        </p>

    </div>

</footer>

</body>

</html>