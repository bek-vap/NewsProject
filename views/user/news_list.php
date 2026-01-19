<?php
require_once __DIR__ . '/../layout/header.php';
?>
 
<h2>Yangiliklar</h2>

<?php if (empty($news)): ?>
    <p>Hozircha yangiliklar yo‘q.</p>
<?php else: ?>
    <ul>
        <?php foreach ($news as $n): ?>
            <li>
                <h3>
                    <a href="index.php?page=news&id=<?= urlencode($n['id']) ?>">
                        <?= htmlspecialchars($n['title']) ?>
                    </a>
                </h3>

                <?php if (!empty($n['created_at'])): ?>
                    <small><?= htmlspecialchars($n['created_at']) ?></small>
                <?php endif; ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<p>
    <a href="index.php">← Bosh sahifaga qaytish</a>
</p>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
