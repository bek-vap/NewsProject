<?php
require_once __DIR__ . '/../layout/header.php';
?>

<?php if (empty($item)): ?>
    <h2>Yangilik topilmadi</h2>
<?php else: ?>

    <h2><?= htmlspecialchars($item['title']) ?></h2>

    <?php if (!empty($item['created_at'])): ?>
        <small><?= htmlspecialchars($item['created_at']) ?></small>
    <?php endif; ?>

    <hr>
 
    <p>
        <?= nl2br(htmlspecialchars($item['content'])) ?>
    </p>

<?php endif; ?>

<hr>

<p>
    <a href="index.php?page=news">← Barcha yangiliklarga qaytish</a>
</p>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
