<?php
require_once __DIR__ . '/../layout/header.php';
?>
 
<section class="card">
    <h2 class="h1">Yangiliklar</h2>

    <?php if (empty($news)): ?>
        <p class="muted">Hozircha yangiliklar yo‘q.</p>
    <?php else: ?>
        <ul class="list">
            <?php foreach ($news as $n): ?>
                <li>
                    <h3>
                        <a href="index.php?page=news&id=<?= urlencode($n['id']) ?>">
                            <?= htmlspecialchars($n['title']) ?>
                        </a>
                    </h3>

                    <?php if (!empty($n['created_at'])): ?>
                        <span class="badge"><?= htmlspecialchars($n['created_at']) ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="hr"></div>

    <a class="btn secondary" href="index.php">← Bosh sahifaga qaytish</a>
</section>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
