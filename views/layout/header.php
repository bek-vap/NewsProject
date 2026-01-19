
<?php
require_once __DIR__ . '/../../models/Header.php';

$headerModel = new Header();
$header = $headerModel->get();
?>

<header>
    <h2>
        <?= htmlspecialchars($header['site_name'] ?? 'News') ?>
    </h2>

    <nav>
        <?php if (!empty($header['menu'])): ?>
            <?php foreach ($header['menu'] as $item): ?>
                <a href="<?= htmlspecialchars($item['link']) ?>">
                    <?= htmlspecialchars($item['title']) ?>
                </a>
                |
            <?php endforeach; ?>
        <?php endif; ?>
    </nav>
</header>

<hr>
