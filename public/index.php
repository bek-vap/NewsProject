<?php

require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/NewsController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
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

    default:
        echo "Sahifa topilmadi";
}
