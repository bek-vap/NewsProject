<?php
$title = 'Admin Dashboard';
require_once __DIR__ . '/../layout/header.php';
?>
<section class="card">
  <h2 class="h1">Admin Dashboard</h2>

  <div class="actions">
    <a class="btn" href="index.php?page=admin_news_form">+ Yangi yangilik qo‘shish</a>
    <a class="btn secondary" href="index.php?page=admin_header_form">Header tahrirlash</a>
    <a class="btn danger" href="index.php?page=admin_logout">Chiqish</a>
  </div>

  <div class="hr"></div>

  <h3 class="h2">Yangiliklar ro‘yxati</h3>

  <?php if (empty($news)): ?>
    <p class="muted">Hozircha yangilik yo‘q.</p>
  <?php else: ?>
    <table class="table">
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
              <a class="btn secondary" href="index.php?page=admin_news_form&id=<?= urlencode($n['id']) ?>">Edit</a>
              <a
                class="btn danger"
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
</section>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
