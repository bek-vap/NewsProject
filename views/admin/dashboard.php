<!DOCTYPE html>
<html lang="uz">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
</head>
<body>

<h2>Admin Dashboard</h2>

<p>
  <a href="index.php?page=admin_news_form">+ Yangi yangilik qo‘shish</a> |
  <a href="index.php?page=admin_header_form">Header tahrirlash</a> |
  <a href="index.php?page=admin_logout">Chiqish</a>
</p>

<hr>

<h3>Yangiliklar ro‘yxati</h3>

<?php if (empty($news)): ?>
  <p>Hozircha yangilik yo‘q.</p>
<?php else: ?>
  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Sarlavha</th>
        <th>Yaratilgan</th>
        <th>Amallar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($news as $n): ?>
        <tr>
          <td><?= htmlspecialchars($n['id'] ?? '') ?></td>
          <td><?= htmlspecialchars($n['title'] ?? '') ?></td>
          <td><?= htmlspecialchars($n['created_at'] ?? '') ?></td>
          <td>
            <a href="index.php?page=admin_news_form&id=<?= urlencode($n['id']) ?>">Edit</a>
            |
            <a
              href="index.php?page=admin_news_delete&id=<?= urlencode($n['id']) ?>"
              onclick="return confirm('O‘chirishni xohlaysizmi?')"
            >
              Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

</body>
</html>
