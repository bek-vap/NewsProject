<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Header Form</title>
</head>
<body>

<h2>Header tahrirlash</h2>

<p>
    <a href="index.php?page=admin_dashboard">← Dashboardga qaytish</a>
</p>

<form method="POST" action="index.php?page=admin_header_save">

    <div>
        <label>Site title:</label><br>
        <input
            type="text"
            name="site_title"
            value="<?= htmlspecialchars($header['site_title'] ?? 'News Portal') ?>"
            required
            style="width:400px;"
        >
    </div>

    <br>

    <div>
        <label>Top text (header yuqorisidagi matn):</label><br>
        <textarea
            name="top_text"
            rows="3"
            cols="60"
        ><?= htmlspecialchars($header['top_text'] ?? '') ?></textarea>
    </div>

    <br>

    <button type="submit">Saqlash</button>

</form>

</body>
</html>
