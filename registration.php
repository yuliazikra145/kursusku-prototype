<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$selected_code   = isset($_GET['course']) ? sanitize($_GET['course']) : '';
$selected_course = $selected_code ? getCourseByCode($selected_code) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - <?= htmlspecialchars($siteName) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a class="brand" href="index.php">
            <div class="brand-logo-wrapper"><span class="logo-fallback-icon">🎓</span></div>
            <span class="brand-title"><?= htmlspecialchars($siteName) ?></span>
        </a>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="registration.php" class="active">Daftar</a>
            <a href="loop-lab.php">Loop Lab</a>
            <a href="history.php">History</a>
        </nav>
    </div>
</header>

<main class="utility-page">
    <div class="utility-card wide-card">
        <h1>📝 Formulir Pendaftaran Kursus</h1>
        <p>Lengkapi data diri Anda di bawah ini dengan benar.</p>

        <form action="process-registration.php" method="POST" class="stack-form">
            <div class="form-grid">
                <div class="field">
                    <label for="nama">Nama Lengkap <span style="color:var(--red-700)">*</span></label>
                    <input type="text" id="nama" name="nama" placeholder="Contoh: Fauzi Zeinnasution" required>
                </div>
                <div class="field">
                    <label for="email">Email <span style="color:var(--red-700)">*</span></label>
                    <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                </div>
            </div>

            <div class="form-grid">
                <div class="field">
                    <label for="whatsapp">Nomor HP / WhatsApp <span style="color:var(--red-700)">*</span></label>
                    <input type="tel" id="whatsapp" name="whatsapp" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="field">
                    <label for="prodi">Program Studi</label>
                    <input type="text" id="prodi" name="prodi" placeholder="Contoh: Teknik Informatika">
                </div>
            </div>

            <div class="form-grid">
                <div class="field">
                    <label for="course">Pilih Kursus <span style="color:var(--red-700)">*</span></label>
                    <select id="course" name="course" required>
                        <option value="">-- Pilih Kursus --</option>
                        <?php foreach ($courses as $c): ?>
                            <option value="<?= $c['code'] ?>"
                                <?= ($selected_course && $selected_course['code'] === $c['code']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['name']) ?> — <?= formatRupiah($c['fee']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="field">
                    <label for="jenis_peserta">Jenis Peserta</label>
                    <select id="jenis_peserta" name="jenis_peserta">
                        <option value="umum">Umum</option>
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="siswa">Siswa</option>
                        <option value="profesional">Profesional</option>
                    </select>
                </div>
            </div>

            <fieldset class="field">
                <legend>Minat Bidang (bisa pilih lebih dari satu)</legend>
                <div class="choice-row">
                    <label><input type="checkbox" name="minat[]" value="web"> Web Development</label>
                    <label><input type="checkbox" name="minat[]" value="mobile"> Mobile Development</label>
                    <label><input type="checkbox" name="minat[]" value="database"> Database</label>
                    <label><input type="checkbox" name="minat[]" value="ui/ux"> UI/UX Design</label>
                    <label><input type="checkbox" name="minat[]" value="data"> Data Science</label>
                </div>
            </fieldset>

            <div class="form-grid">
                <div class="field">
                    <label for="catatan">Catatan Tambahan</label>
                    <textarea id="catatan" name="catatan" rows="3" placeholder="Opsional..."></textarea>
                </div>
                <div class="field">
                    <label for="sumber">Sumber Informasi <span style="color:var(--red-700)">*</span></label>
                    <select id="sumber" name="sumber" required>
                        <option value="">-- Pilih Sumber --</option>
                        <option value="instagram">Instagram</option>
                        <option value="tiktok">TikTok</option>
                        <option value="teman">Teman / Keluarga</option>
                        <option value="website">Website Resmi</option>
                        <option value="week-05">week-05</option>
                    </select>
                </div>
            </div>

            <div style="display:flex; gap:12px; flex-wrap:wrap;">
                <button type="submit" class="btn-primary">📨 Kirim Pendaftaran</button>
                <a href="index.php" class="btn-outline">← Batal</a>
            </div>
        </form>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <p>&copy; <?= $year ?> <strong><?= htmlspecialchars($siteName) ?></strong> - Praktikum Pemrograman Web III.</p>
    </div>
</footer>

</body>
</html>