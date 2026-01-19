<?php
class AdminController
{
    private string $newsFile;
    private string $headerFile;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $this->newsFile   = __DIR__ . '/../data/news.json';
        $this->headerFile = __DIR__ . '/../data/header.json';
    }

    /* ---------------- AUTH ---------------- */

    public function login()
    {
        // allaqachon login bo'lgan bo'lsa
        if (!empty($_SESSION['is_admin'])) {
            header("Location: index.php?page=admin_dashboard");
            exit;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            // UY VAZIFA uchun eng sodda: hardcoded admin
            if ($username === 'admin' && $password === '12345') {
                $_SESSION['is_admin'] = true;
                header("Location: index.php?page=admin_dashboard");
                exit;
            } else {
                $error = "Login yoki parol xato!";
            }
        }

        require_once __DIR__ . '/../views/admin/login.php';
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header("Location: index.php?page=admin_login");
        exit;
    }

    private function requireAdmin()
    {
        if (empty($_SESSION['is_admin'])) {
            header("Location: index.php?page=admin_login");
            exit;
        }
    }

    /* ---------------- DASHBOARD ---------------- */

    public function dashboard()
    {
        $this->requireAdmin();
        $news = $this->readJson($this->newsFile, []);
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

    /* ---------------- NEWS (CREATE/EDIT/DELETE) ---------------- */

    public function newsForm()
    {
        $this->requireAdmin();

        $news = $this->readJson($this->newsFile, []);
        $id = $_GET['id'] ?? null;

        $item = [
            "id" => null,
            "title" => "",
            "content" => "",
            "created_at" => date("Y-m-d H:i:s"),
        ];

        // edit bo'lsa topib beradi
        if ($id !== null) {
            foreach ($news as $n) {
                if ((string)$n['id'] === (string)$id) {
                    $item = $n;
                    break;
                }
            }
        }

        require_once __DIR__ . '/../views/admin/news_form.php';
    }

    public function newsSave()
    {
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=admin_dashboard");
            exit;
        }

        $news = $this->readJson($this->newsFile, []);

        $id = trim($_POST['id'] ?? '');
        $title = trim($_POST['title'] ?? '');
        $content = trim($_POST['content'] ?? '');

        if ($title === '' || $content === '') {
            // juda sodda validatsiya
            header("Location: index.php?page=admin_news_form" . ($id ? "&id=" . urlencode($id) : ""));
            exit;
        }

        if ($id === '') {
            // CREATE
            $newId = $this->nextId($news);
            $news[] = [
                "id" => $newId,
                "title" => $title,
                "content" => $content,
                "created_at" => date("Y-m-d H:i:s"),
            ];
        } else {
            // UPDATE
            foreach ($news as &$n) {
                if ((string)$n['id'] === (string)$id) {
                    $n['title'] = $title;
                    $n['content'] = $content;
                    break;
                }
            }
            unset($n);
        }

        $this->writeJson($this->newsFile, $news);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    public function newsDelete()
    {
        $this->requireAdmin();

        $id = $_GET['id'] ?? null;
        if ($id === null) {
            header("Location: index.php?page=admin_dashboard");
            exit;
        }

        $news = $this->readJson($this->newsFile, []);
        $news = array_values(array_filter($news, fn($n) => (string)$n['id'] !== (string)$id));

        $this->writeJson($this->newsFile, $news);

        header("Location: index.php?page=admin_dashboard");
        exit;
    }

    /* ---------------- HEADER (EDIT) ---------------- */

    public function headerForm()
    {
        $this->requireAdmin();
        $header = $this->readJson($this->headerFile, [
            "site_title" => "News Portal",
            "top_text" => "Assalomu alaykum!",
        ]);

        require_once __DIR__ . '/../views/admin/header_form.php';
    }

    public function headerSave()
    {
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?page=admin_header_form");
            exit;
        }

        $siteTitle = trim($_POST['site_title'] ?? 'News Portal');
        $topText   = trim($_POST['top_text'] ?? '');

        $data = [
            "site_title" => $siteTitle === '' ? "News Portal" : $siteTitle,
            "top_text" => $topText,
        ];

        $this->writeJson($this->headerFile, $data);

        header("Location: index.php?page=admin_header_form");
        exit;
    }

    /* ---------------- HELPERS ---------------- */

    private function readJson(string $path, $default)
    {
        if (!file_exists($path)) return $default;

        $raw = file_get_contents($path);
        $data = json_decode($raw, true);

        return (json_last_error() === JSON_ERROR_NONE && $data !== null) ? $data : $default;
    }

    private function writeJson(string $path, $data): void
    {
        $dir = dirname($path);
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        file_put_contents($path, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    private function nextId(array $news): int
    {
        $max = 0;
        foreach ($news as $n) {
            $id = (int)($n['id'] ?? 0);
            if ($id > $max) $max = $id;
        }
        return $max + 1;
    }
}
