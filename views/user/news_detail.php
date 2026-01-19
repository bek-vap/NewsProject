<?php
require_once __DIR__ . '/../layout/header.php';
?>

<section class="card">
    <?php if (empty($item)): ?>
        <h2 class="h1">Yangilik topilmadi</h2>
    <?php else: ?>

        <h2 class="h1"><?= htmlspecialchars($item['title']) ?></h2>

        <?php if (!empty($item['created_at'])): ?>
            <span class="badge"><?= htmlspecialchars($item['created_at']) ?></span>
        <?php endif; ?>

        <div class="hr"></div>
 
        <p>
            <?= nl2br(htmlspecialchars($item['content'])) ?>
        </p>

    <?php endif; ?>

    <div class="hr"></div>

    <a class="btn secondary" href="index.php?page=news">← Barcha yangiliklarga qaytish</a>
</section>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
