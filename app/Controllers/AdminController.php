<?php
session_start();

require_once '../app/Models/Post.php';
require_once '../app/Models/Category.php';
require_once '../app/Models/Admin.php';

class AdminController {
    private $postModel;
    private $categoryModel;
    private $adminModel;

    public function __construct() {
        $this->postModel = new Post();
        $this->categoryModel = new Category();
        $this->adminModel = new Admin();
    }

    private function checkAuth() {
        if(!isset($_SESSION['admin_logged'])) {
            $this->login();
            exit;
        }
    }

    public function login() {
        $error = '';
        if($_SERVER['REQUEST_METHOD']==='POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $admin = $this->adminModel->checkLogin($username, $password);
            if($admin) {
                $_SESSION['admin_logged'] = true;
                header("Location: ?route=admin");
                exit;
            } else {
                $error = "Invalid username or password";
            }
        }
        require '../app/Views/admin/login.php';
    }

    public function index() {
        $this->checkAuth();
        $posts = $this->postModel->getAll(100,0);
        require '../app/Views/admin/index.php';
    }

    public function create() {
        $this->checkAuth();
        $categories = $this->categoryModel->getAll();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_FILES['image']['name'] ?? null;
            if($image) move_uploaded_file($_FILES['image']['tmp_name'], '../public/uploads/'.$image);
            $this->postModel->create([
                ':title'=>$_POST['title'],
                ':content'=>$_POST['content'],
                ':image'=>$image,
                ':category_id'=>$_POST['category_id'] ?? null
            ]);
            header("Location: ?route=admin");
        }
        require '../app/Views/admin/edit.php';
    }

    public function edit($id) {
        $this->checkAuth();
        $post = $this->postModel->getById($id);
        $categories = $this->categoryModel->getAll();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $_FILES['image']['name'] ?? $post['image'];
            if($_FILES['image']['tmp_name']) move_uploaded_file($_FILES['image']['tmp_name'], '../public/uploads/'.$image);
            $this->postModel->update($id, [
                ':title'=>$_POST['title'],
                ':content'=>$_POST['content'],
                ':image'=>$image,
                ':category_id'=>$_POST['category_id'] ?? null
            ]);
            header("Location: ?route=admin");
        }
        require '../app/Views/admin/edit.php';
    }

    public function delete($id) {
        $this->checkAuth();
        $this->postModel->delete($id);
        header("Location: ?route=admin");
    }

    public function categories() {
        $this->checkAuth();

        // Handle new category
        if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name'])) {
            $name = trim($_POST['name']);
            if($name !== '') {
                $this->categoryModel->create($name);
            }
            header("Location: ?route=admin_categories");
            exit;
        }

        $categories = $this->categoryModel->getAll();
        require '../app/Views/admin/category.php';
    }

    public function logout() {
        session_destroy();
        header("Location: ?route=admin");
    }
}
