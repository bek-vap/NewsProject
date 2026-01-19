<?php

require_once __DIR__ . '/../models/News.php';

class NewsController
{
    private News $newsModel;

    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function index(): void
    {
        $news = $this->newsModel->all();
        require_once __DIR__ . '/../views/user/news_list.php';
    }

    public function detail($id = null): void
    {
        $id = $id ?? ($_GET['id'] ?? null);
        if ($id === null) {
            echo "ID topilmadi";
            return;
        }

        $item = $this->newsModel->find($id);

        require_once __DIR__ . '/../views/user/news_detail.php';
    }

    public function adminIndex(): void
    {
        $news = $this->newsModel->all();
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if ($title && $content) {
            $this->newsModel->create($title, $content);
        }

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $id = $_POST['id'] ?? null;
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if ($id && $title && $content) {
            $this->newsModel->update($id, $title, $content);
        }

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    public function delete(): void
    {
        if (!isset($_GET['id'])) {
            return;
        }

        $id = $_GET['id'];
        $this->newsModel->delete($id);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }
}
