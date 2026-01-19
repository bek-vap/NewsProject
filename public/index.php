<?php
session_start();

// Controllerlarni ulaymiz
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/NewsController.php';
require_once __DIR__ . '/../controllers/AdminController.php';

// Qaysi sahifa ochilayotganini olamiz
$page = $_GET['page'] ?? 'home';

switch ($page) {

    // -------- USER --------
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'news':
        $controller = new NewsController();
        if (isset($_GET['id'])) {
            $controller->detail($_GET['id']);
        } else {
            $controller->index();
        }
        break;

    // -------- ADMIN --------
    case 'admin_login':
        $controller = new AdminController();
        $controller->login();
        break;

    case 'admin_logout':
        $controller = new AdminController();
        $controller->logout();
        break;

    case 'admin_dashboard':
        $controller = new AdminController();
        $controller->dashboard();
        break;

    case 'admin_news_form':
        $controller = new AdminController();
        $controller->newsForm();
        break;

    case 'admin_news_save':
        $controller = new AdminController();
        $controller->newsSave();
        break;

    case 'admin_news_delete':
        $controller = new AdminController();
        $controller->newsDelete();
        break;

    case 'admin_header_form':
        $controller = new AdminController();
        $controller->headerForm();
        break;

    case 'admin_header_save':
        $controller = new AdminController();
        $controller->headerSave();
        break;

    // -------- 404 --------
    default:
        echo "<h2>Sahifa topilmadi</h2>";
        echo "<a href='index.php'>Bosh sahifaga qaytish</a>";
}
