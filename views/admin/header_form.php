<?php
$title = 'Header Form';
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
    <h2 class="h1">Header tahrirlash</h2>

    <a class="btn secondary" href="index.php?page=admin_dashboard">← Dashboardga qaytish</a>

    <div class="hr"></div>

    <form method="POST" action="index.php?page=admin_header_save">

        <div>
            <label>Site title:</label>
            <input
                type="text"
                name="site_title"
                value="<?= htmlspecialchars($header['site_title'] ?? 'News Portal') ?>"
                required
            >
        </div>

        <div class="hr"></div>

        <div>
            <label>Top text (header yuqorisidagi matn):</label>
            <textarea
                name="top_text"
                rows="3"
            ><?= htmlspecialchars($header['top_text'] ?? '') ?></textarea>
        </div>

        <div class="hr"></div>

        <button class="btn" type="submit">Saqlash</button>

    </form>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
