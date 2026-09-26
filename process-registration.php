<?php
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

$interestText = implode(', ', $interests);

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
    <title>Pendaftaran Diterima - KursusKu</title>

   <style>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        color: #16332c;
        background: #f5f7f6;
    }

    .container {
        width: min(1100px, calc(100% - 40px));
        margin: 0 auto;
    }

    nav {
        display: flex;
        align-items: center;
        gap: 24px;
        padding: 20px 0;
        flex-wrap: wrap;
    }

    nav a {
        color: #0a20cc;
        text-decoration: none;
        font-weight: 600;
    }

    nav a:hover {
        text-decoration: underline;
    }

    .page-header {
        padding: 25px 0;
    }

    .page-header h1 {
        margin: 0 0 8px;
        font-size: 32px;
    }

    .page-header p {
        margin: 0;
        color: #66736f;
    }

    .summary-card {
        background: white;
        border: 1px solid #dfe5e2;
        border-radius: 12px;
        padding: 30px;
        margin: 20px 0 40px;
    }

    .alert-success {
        background: #e7f8ef;
        border: 1px solid #b9e5cc;
        color: #145c35;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .summary-list {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 14px 20px;
        margin: 0;
    }

    .summary-list dt {
        font-weight: bold;
    }

    .summary-list dd {
        margin: 0;
        overflow-wrap: anywhere;
    }

    .button {
        display: inline-block;
        background: #0a20cc;
        color: white;
        padding: 11px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }

    .button:hover {
        background: #07168f;
    }

    @media (max-width: 640px) {
        .container {
            width: min(100% - 24px, 1100px);
        }

        .summary-list {
            grid-template-columns: 1fr;
            gap: 4px;
        }

        .summary-list dd {
            margin-bottom: 12px;
        }
    }
</style>
</head>

<body>

    <main class="container">

        <nav aria-label="Navigasi utama">
            <a href="index.php"><strong>KursusKu</strong></a>
            <a href="index.php#katalog">Katalog</a>
            <a href="registration.php">Daftar Kursus</a>
        </nav>

        <section class="page-header">
            <h1>Pendaftaran Diterima untuk Diproses</h1>
            <p>Periksa kembali data latihan berikut.</p>
        </section>

        <section class="summary-card">

            <div class="alert-success">
                Data pendaftaran berhasil diterima melalui POST.
            </div>

            <dl class="summary-list">

                <dt>Nama</dt>
                <dd><?= e($name) ?></dd>

                <dt>Email</dt>
                <dd><?= e($email) ?></dd>

                <dt>Nomor HP</dt>
                <dd><?= e($phone) ?></dd>

                <dt>Program Studi</dt>
                <dd><?= e($studyProgram) ?></dd>

                <dt>Kursus</dt>
                <dd><?= e($course) ?></dd>

                <dt>Jenis Peserta</dt>
                <dd><?= e($participantType) ?></dd>

                <dt>Minat</dt>
                <dd><?= e($interestText) ?></dd>

                <dt>Catatan</dt>
                <dd><?= e($note) ?></dd>

                <dt>Sumber</dt>
                <dd><?= e($source) ?></dd>

            </dl>

            <p>
                <a class="button" href="registration.php">
                    Kembali ke Form
                </a>
            </p>

        </section>

    

    </main>

</body>
</html>