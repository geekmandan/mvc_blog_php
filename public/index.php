<?php
require_once '../config/config.php';
require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/PostController.php';
require_once '../app/Controllers/AdminController.php';

$route = $_GET['route'] ?? 'home';
$id = $_GET['id'] ?? null;

switch($route){
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'post':
        $controller = new PostController();
        $controller->view($id);
        break;
    case 'admin':
        $controller = new AdminController();
        $controller->index();
        break;
    case 'admin_create':
        $controller = new AdminController();
        $controller->create();
        break;
    case 'admin_edit':
        $controller = new AdminController();
        $controller->edit($id);
        break;
    case 'admin_delete':
        $controller = new AdminController();
        $controller->delete($id);
        break;
    case 'admin_categories':
        $controller = new AdminController();
        $controller->categories();
        break;
    case 'admin_logout':
        $controller = new AdminController();
        $controller->logout();
        break;
    default:
        echo "404 Not Found";
}
