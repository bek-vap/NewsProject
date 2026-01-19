<?php
$title = 'Admin Login';
require_once __DIR__ . '/../layout/header.php';
?>
<h2>Admin Login</h2>

<?php if (!empty($error)): ?>
    <p style="color:red;">
        <?= htmlspecialchars($error) ?>
    </p>
<?php endif; ?>

<form method="POST" action="index.php?page=admin_login">
    <div>
        <label>Username:</label><br>
        <input type="text" name="username" required>
    </div>

    <br>

    <div>
        <label>Password:</label><br>
        <input type="password" name="password" required>
    </div>

    <br>

    <button type="submit">Login</button>
</form>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
