
<?php
// agar header data bo‘lsa (masalan title, menu)
$title = $title ?? 'News Project';
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="topbar">
            <div class="brand">
                <span class="logo" aria-hidden="true"></span>
                <span class="title">News Project</span>
            </div>

            <nav class="nav" aria-label="Asosiy menyu">
                <a href="index.php">Home</a>
                <a href="index.php?page=news">News</a>
                <a href="index.php?page=admin_login">Admin</a>
            </nav>
        </div>
    </div>
</header>

<main class="main">
    <div class="container">
