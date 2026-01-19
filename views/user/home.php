<?php
require_once __DIR__ . '/../layout/header.php';
?>

<section class="card">
    <h1 class="h1">Bosh sahifa</h1>

    <p>So‘nggi yangiliklar portaliga xush kelibsiz.</p>

    <div class="hr"></div>

    <h3 class="h2">Tezkor havolalar</h3>
    <ul class="list">
        <li>
            <a class="btn" href="index.php?page=news">Barcha yangiliklarni ko‘rish</a>
        </li>
    </ul>

    <div class="hr"></div>

    <p class="muted">
        © <?= date('Y') ?> News Portal
    </p>
</section>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
