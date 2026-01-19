<?php
$title = 'Admin Login';
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
    <h2 class="h1">Admin Login</h2>

    <?php if (!empty($error)): ?>
        <p class="muted" style="color: var(--danger);">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=admin_login">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <div class="hr"></div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div class="hr"></div>

        <button class="btn" type="submit">Login</button>
    </form>
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
