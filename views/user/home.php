<?php
require_once __DIR__ . '/../layout/header.php';
?>

<h1>Bosh sahifa</h1>

<p>So‘nggi yangiliklar portaliga xush kelibsiz.</p>

<hr>

<h3>Tezkor havolalar</h3>
<ul>
    <li>
        <a href="index.php?page=news">Barcha yangiliklarni ko‘rish</a>
    </li>
</ul>
 
<hr>

<p>
    <small>
        © <?= date('Y') ?> News Portal
    </small>
</p>

<?php
require_once __DIR__ . '/../layout/footer.php';
?>
