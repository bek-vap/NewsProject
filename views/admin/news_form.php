<?php
$title = 'News Form';
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
    <h2 class="h1">
        <?= empty($item['id']) ? "Yangi yangilik qo‘shish" : "Yangilikni tahrirlash" ?>
    </h2>

    <a class="btn secondary" href="index.php?page=admin_dashboard">← Dashboardga qaytish</a>

    <div class="hr"></div>

    <form method="POST" action="index.php?page=admin_news_save">

        <!-- Edit bo‘lsa ID yuboriladi -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id'] ?? '') ?>">

        <div>
            <label>Sarlavha:</label>
            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($item['title'] ?? '') ?>"
                required
            >
        </div>

        <div class="hr"></div>

        <div>
            <label>Matn:</label>
            <textarea
                name="content"
                rows="8"
                required
            ><?= htmlspecialchars($item['content'] ?? '') ?></textarea>
        </div>

        <div class="hr"></div>

        <button class="btn" type="submit">
            <?= empty($item['id']) ? "Saqlash" : "Yangilash" ?>
        </button>

    </form>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
