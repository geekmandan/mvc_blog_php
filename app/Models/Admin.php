<?php
require_once 'Database.php';

class Admin {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function checkLogin($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE username=:username LIMIT 1");
        $stmt->execute([':username'=>$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if($admin && password_verify($password, $admin['password'])) {
            return $admin;
        }
        return false;
    }
}
