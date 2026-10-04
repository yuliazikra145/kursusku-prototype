<?php

$siteName = 'KursusKu';

$courses = [
    'web-dasar' => 'Web Dasar',
    'php-dasar' => 'PHP Dasar',
    'php-lanjutan' => 'PHP Lanjutan',
    'laravel-fundamental' => 'Laravel Fundamental',
    'mysql-dasar' => 'MySQL Dasar',
    'ui-web-dasar' => 'UI Web Dasar'
];

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kursus - <?= e($siteName) ?></title>

    <link rel="stylesheet" href="/kursusku-prototype/assets/css/style.css?v=5">
</head>

<body>

<header class="header">

    <div class="container">

        <h1><?= e($siteName) ?></h1>

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

    <!-- Judul -->

    <section class="section">

        <div class="container">

            <h2>Pendaftaran Kursus</h2>

            <p>
                Lengkapi formulir berikut untuk melakukan pendaftaran
                kursus di KursusKu.
            </p>

        </div>

    </section>


    <!-- Form Pendaftaran -->

    <section class="section">

        <div class="container">

            <div class="form-card">

                <form action="process-registration.php" method="POST">

                    <!-- Sumber -->

                    <input
                        type="hidden"
                        name="source"
                        value="week-06"
                    >


                    <!-- Nama dan Email -->

                    <div class="form-group">

                        <label for="name">
                            Nama lengkap
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            minlength="3"
                            maxlength="100"
                            autocomplete="name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            maxlength="120"
                            autocomplete="email"
                            required
                        >

                    </div>
                    <div class="form-group">

    <label for="study_program">
        Program Studi
    </label>

    <input
        id="study_program"
        name="study_program"
        type="text"
        maxlength="100"
        placeholder="Contoh: PTIK"
        required
    >

</div>
<div class="form-group">

    <label for="phone">
        Nomor HP
    </label>

    <input
        id="phone"
        name="phone"
        type="tel"
        maxlength="20"
        placeholder="Contoh: 08123456789"
        autocomplete="tel"
        required
    >

</div>


                    <!-- Pilih Kursus -->

                    <div class="form-group">

                        <label for="course">
                            Pilih kursus
                        </label>

                        <select
                            id="course"
                            name="course"
                            required
                        >

                            <option value="">
                                -- Pilih kursus --
                            </option>

                            <?php foreach ($courses as $value => $label): ?>

                                <option value="<?= e($value) ?>">
                                    <?= e($label) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- Tipe Peserta -->

                    <fieldset class="form-group">

                        <legend>
                            Tipe peserta
                        </legend>

                        <label class="choice">

                            <input
                                type="radio"
                                name="participant_type"
                                value="mahasiswa"
                                required
                            >

                            Mahasiswa

                        </label>


                        <label class="choice">

                            <input
                                type="radio"
                                name="participant_type"
                                value="guru"
                            >

                            Guru

                        </label>


                        <label class="choice">

                            <input
                                type="radio"
                                name="participant_type"
                                value="umum"
                            >

                            Umum

                        </label>

                    </fieldset>


                    <!-- Minat Belajar -->

                    <fieldset class="form-group">

                        <legend>
                            Minat belajar
                        </legend>

                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="frontend"
                            >

                            Frontend

                        </label>


                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="backend"
                            >

                            Backend

                        </label>


                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="database"
                            >

                            Database

                        </label>


                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="ui-ux"
                            >

                            UI/UX

                        </label>

                    </fieldset>


                    <!-- Metode Belajar -->

                    <div class="form-group">

                        <label for="learning_method">
                            Metode belajar
                        </label>

                        <select
                            id="learning_method"
                            name="learning_method"
                            required
                        >

                            <option value="">
                                -- Pilih metode --
                            </option>

                            <option value="online">
                                Online
                            </option>

                            <option value="offline">
                                Offline
                            </option>

                            <option value="hybrid">
                                Hybrid
                            </option>

                        </select>

                    </div>


                    <!-- Jumlah Paket -->

                    <div class="form-group">

                        <label for="package">
                            Jumlah paket
                        </label>

                        <select
                            id="package"
                            name="package"
                            required
                        >

                            <option value="1">
                                1 paket
                            </option>

                            <option value="2">
                                2 paket
                            </option>

                            <option value="3">
                                3 paket
                            </option>

                        </select>

                    </div>


                    <!-- Catatan -->

                    <div class="form-group">

                        <label for="note">
                            Catatan tambahan
                        </label>

                        <textarea
                            id="note"
                            name="note"
                            rows="5"
                            maxlength="300"
                            placeholder="Tuliskan kebutuhan belajar Anda"
                        ></textarea>

                        <small class="help">
                            Maksimal 300 karakter.
                        </small>

                    </div>


                    <!-- Tombol -->

                    <div class="form-actions">

                        <button
                            class="btn-primary"
                            type="submit"
                        >
                            Proses Pendaftaran
                        </button>


                        <a
                            href="history-dummy.php"
                            class="btn-link"
                        >
                            History Dummy
                        </a>


                        <a
                            href="loop-lab.php"
                            class="btn-link"
                        >
                            Loop Lab
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </section>


    <!-- Fasilitas -->

    <section class="section section-light" id="keunggulan">

        <div class="container">

            <h2>Fasilitas</h2>

            <p>
                Fasilitas yang tersedia untuk peserta KursusKu:
            </p>

            <ul>

                <li>Materi pembelajaran terstruktur</li>

                <li>Latihan dan praktik</li>

                <li>Pembelajaran online dan offline</li>

                <li>Pengajar yang berpengalaman</li>

                <li>Sertifikat setelah menyelesaikan kursus</li>

            </ul>

        </div>

    </section>

</main>


<!-- Footer -->

<footer class="footer">

    <div class="container">

        <p>
            &copy; <?= date('Y') ?> KursusKu
        </p>

    </div>

</footer>


</body>

</html>