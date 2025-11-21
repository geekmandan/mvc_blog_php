<?php
require_once '../app/Models/Post.php';
require_once '../app/Models/Category.php';

class PostController {
    private $postModel;
    private $categoryModel;

    public function __construct() {
        $this->postModel = new Post();
        $this->categoryModel = new Category();
    }

    public function view($id) {
        $post = $this->postModel->getById($id);
        $categories = $this->categoryModel->getAll();
        if(!$post) {
            echo "Post not found";
            return;
        }
        require '../app/Views/post/view.php';
    }
}
