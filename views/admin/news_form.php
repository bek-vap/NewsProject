<?php
$title = 'News Form';
require_once __DIR__ . '/../layout/header.php';
?>
<h2>
    <?= empty($item['id']) ? "Yangi yangilik qo‘shish" : "Yangilikni tahrirlash" ?>
</h2>

<p>
    <a href="index.php?page=admin_dashboard">← Dashboardga qaytish</a>
</p>

<form method="POST" action="index.php?page=admin_news_save">

    <!-- Edit bo‘lsa ID yuboriladi -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($item['id'] ?? '') ?>">

    <div>
        <label>Sarlavha:</label><br>
        <input
            type="text"
            name="title"
            value="<?= htmlspecialchars($item['title'] ?? '') ?>"
            required
            style="width:400px;"
        >
    </div>

    <br>

    <div>
        <label>Matn:</label><br>
        <textarea
            name="content"
            rows="8"
            cols="60"
            required
        ><?= htmlspecialchars($item['content'] ?? '') ?></textarea>
    </div>

    <br>

    <button type="submit">
        <?= empty($item['id']) ? "Saqlash" : "Yangilash" ?>
    </button>

</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
