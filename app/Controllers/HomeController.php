<?php
require_once '../app/Models/Post.php';
require_once '../app/Models/Category.php';

class HomeController {
    private $postModel;
    private $categoryModel;

    public function __construct() {
        $this->postModel = new Post();
        $this->categoryModel = new Category();
    }

    public function index() {
        $page = $_GET['page'] ?? 1;
        $limit = 5;
        $offset = ($page-1)*$limit;

        $posts = $this->postModel->getAll($limit, $offset);
        $totalPosts = $this->postModel->getCount();
        $totalPages = ceil($totalPosts / $limit);

        $categories = $this->categoryModel->getAll();

        require '../app/Views/home/index.php';
    }
}
