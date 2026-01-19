<?php
require_once __DIR__ . '/../../models/Header.php';

$headerModel = new Header();
$header = $headerModel->get();
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($header['site_name'] ?? 'News') ?></title>

    <!-- STYLE (keyin dizayn shu yerdan olinadi) -->
    <link rel="stylesheet" href="style.php">
</head>
<body>

<header>
    <h1><?= htmlspecialchars($header['site_name'] ?? 'News') ?></h1>

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
