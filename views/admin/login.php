<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

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

</body>
</html>
