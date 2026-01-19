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
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>News Project</h1>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=news">News</a></li>
                <li><a href="index.php?page=admin-login">Admin</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
