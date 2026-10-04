<?php

$siteName = 'KursusKu';

/*
|--------------------------------------------------------------------------
| DATA KURSUS
|--------------------------------------------------------------------------
*/

$courses = [
    'web-dasar' => [
        'name' => 'Web Dasar',
        'price' => 200000
    ],

    'php-dasar' => [
        'name' => 'PHP Dasar',
        'price' => 250000
    ],

    'php-lanjutan' => [
        'name' => 'PHP Lanjutan',
        'price' => 300000
    ],

    'laravel-fundamental' => [
        'name' => 'Laravel Fundamental',
        'price' => 350000
    ],

    'mysql-dasar' => [
        'name' => 'MySQL Dasar',
        'price' => 275000
    ],

    'ui-web-dasar' => [
        'name' => 'UI Web Dasar',
        'price' => 225000
    ]
];


/*
|--------------------------------------------------------------------------
| DISKON
|--------------------------------------------------------------------------
*/

$discounts = [
    'mahasiswa' => 20,
    'guru' => 15,
    'umum' => 10
];


/*
|--------------------------------------------------------------------------
| LABEL MINAT
|--------------------------------------------------------------------------
*/

$interestLabels = [
    'frontend' => 'Frontend',
    'backend' => 'Backend',
    'database' => 'Database',
    'ui-ux' => 'UI/UX'
];


/*
|--------------------------------------------------------------------------
| HELPER
|--------------------------------------------------------------------------
*/

function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}


function rupiah($value): string
{
    return 'Rp ' . number_format(
        (int) $value,
        0,
        ',',
        '.'
    );
}


/*
|--------------------------------------------------------------------------
| AMBIL DATA FORM
|--------------------------------------------------------------------------
*/

$name = $_POST['name'] ?? '';

$email = $_POST['email'] ?? '';

$phone = $_POST['phone'] ?? '';

$studyProgram = $_POST['study_program'] ?? '';

$course = $_POST['course'] ?? '';

$participantType = $_POST['participant_type'] ?? '';

$interests = $_POST['interests'] ?? [];

$learningMethod = $_POST['learning_method'] ?? '';

$package = (int) ($_POST['package'] ?? 1);

$note = $_POST['note'] ?? '';

$source = $_POST['source'] ?? '';


/*
|--------------------------------------------------------------------------
| NORMALISASI DATA
|--------------------------------------------------------------------------
*/

if (!is_array($interests)) {
    $interests = [];
}

if ($package < 1) {
    $package = 1;
}


/*
|--------------------------------------------------------------------------
| DATA KURSUS TERPILIH
|--------------------------------------------------------------------------
*/

$courseData = $courses[$course] ?? [
    'name' => 'Kursus tidak dipilih',
    'price' => 0
];

$courseName = $courseData['name'];

$coursePrice = $courseData['price'];


/*
|--------------------------------------------------------------------------
| HITUNG BIAYA
|--------------------------------------------------------------------------
*/

$subtotal = $coursePrice * $package;

$discountPercent = $discounts[$participantType] ?? 0;

$discountAmount = intdiv(
    $subtotal * $discountPercent,
    100
);

$totalPrice = $subtotal - $discountAmount;


/*
|--------------------------------------------------------------------------
| MINAT BELAJAR
|--------------------------------------------------------------------------
*/

$interestText = [];

foreach ($interests as $interest) {

    if (isset($interestLabels[$interest])) {

        $interestText[] = $interestLabels[$interest];

    }
}

if (empty($interestText)) {

    $interestText[] = 'Tidak ada';

}


/*
|--------------------------------------------------------------------------
| TAMPILAN
|--------------------------------------------------------------------------
*/

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Hasil Pendaftaran - <?= e($siteName) ?>
    </title>

    <link
        rel="stylesheet"
        href="/kursusku-prototype/assets/css/style.css?v=5"
    >

</head>


<body>


<!-- HEADER -->

<header class="header">

    <div class="container">

        <h1>
            <?= e($siteName) ?>
        </h1>

    </div>

</header>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="container">

        <a href="index.php">
            Beranda
        </a>

        <a href="index.php#kursus">
            Katalog
        </a>

        <a href="registration.php">
            Daftar Kursus
        </a>

        <a href="index.php#keunggulan">
            Keunggulan
        </a>

        <a href="index.php#kontak">
            Kontak
        </a>

    </div>

</nav>


<main>


    <!-- JUDUL -->

    <section class="section">

        <div class="container">

            <h2>
                Pendaftaran Berhasil
            </h2>

            <p>
                Terima kasih, data pendaftaran kamu
                sudah berhasil diterima.
            </p>

        </div>

    </section>


    <!-- RINGKASAN PESERTA -->

    <section class="section">

        <div class="container">

            <div class="form-card">

                <h2>
                    Ringkasan Pendaftaran
                </h2>


                <p>
                    <strong>Nama:</strong>
                    <?= e($name) ?>
                </p>


                <p>
                    <strong>Email:</strong>
                    <?= e($email) ?>
                </p>


                <p>
                    <strong>Nomor HP:</strong>
                    <?= e($phone) ?>
                </p>


                <p>
                    <strong>Program Studi:</strong>
                    <?= e($studyProgram) ?>
                </p>


                <p>
                    <strong>Kursus:</strong>
                    <?= e($courseName) ?>
                </p>


                <p>
                    <strong>Tipe Peserta:</strong>
                    <?= e(ucfirst($participantType)) ?>
                </p>


                <p>
                    <strong>Minat Belajar:</strong>
                    <?= e(implode(', ', $interestText)) ?>
                </p>


                <p>
                    <strong>Metode Belajar:</strong>
                    <?= e(ucfirst($learningMethod)) ?>
                </p>


                <p>
                    <strong>Jumlah Paket:</strong>
                    <?= e($package) ?> paket
                </p>


                <?php if ($note !== ''): ?>

                    <p>
                        <strong>Catatan:</strong>
                        <?= e($note) ?>
                    </p>

                <?php endif; ?>

            </div>

        </div>

    </section>


    <!-- RINCIAN BIAYA -->

    <section class="section">

        <div class="container">

            <div class="form-card">

                <h2>
                    Rincian Biaya
                </h2>


                <table>

                    <tr>

                        <td>
                            Biaya satuan
                        </td>

                        <td>
                            <?= rupiah($coursePrice) ?>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Subtotal
                            (<?= e($package) ?> paket)
                        </td>

                        <td>
                            <?= rupiah($subtotal) ?>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            Diskon <?= e($discountPercent) ?>%
                        </td>

                        <td>
                            -<?= rupiah($discountAmount) ?>
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <strong>
                                TOTAL AKHIR
                            </strong>
                        </td>

                        <td>
                            <strong>
                                <?= rupiah($totalPrice) ?>
                            </strong>
                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </section>


    <!-- FASILITAS -->

    <section class="section section-light">

        <div class="container">

            <h2>
                Fasilitas
            </h2>

            <ul>

                <li>
                    Modul digital
                </li>

                <li>
                    Sertifikat penyelesaian
                </li>

                <li>
                    Forum diskusi kelas
                </li>

            </ul>

        </div>

    </section>


    <!-- TOMBOL KEMBALI -->

    <section class="section">

        <div class="container">

            <a
                href="registration.php"
                class="btn-primary"
            >
                Kembali ke Pendaftaran
            </a>

        </div>

    </section>


</main>


<!-- FOOTER -->

<footer class="footer">

    <div class="container">

        <p>
            &copy; <?= date('Y') ?> <?= e($siteName) ?>
        </p>

    </div>

</footer>


</body>

</html>