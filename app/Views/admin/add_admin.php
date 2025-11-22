<?php
// Start session
session_start();


require_once __DIR__ . '/../../Models/Database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === '' || $password === '') {
        $message = "Username and password cannot be empty";
    } else {
        try {

            $db = Database::getInstance();


            $stmt = $db->prepare("SELECT id FROM admins WHERE username = :username LIMIT 1");
            $stmt->execute([':username' => $username]);
            $exists = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($exists) {
                $message = "Admin with this username already exists";
            } else {

                $stmt = $db->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
                $stmt->execute([
                    ':username' => $username,
                    ':password' => password_hash($password, PASSWORD_DEFAULT)
                ]);


                header("Location: /public/index.php?route=admin");
                exit;
            }
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
</head>
<body>
    <div style="width:400px; margin:50px auto;">
        <h2 style="text-align:center; margin-bottom:20px;">Add Admin</h2>

        <?php if ($message): ?>
            <p style="color:red; text-align:center;"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <form method="POST" style="display:flex; flex-direction:column; gap:15px;">
            <div>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" style="width:100%; padding:8px;" required>
            </div>

            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" style="width:100%; padding:8px;">
            </div>

            <div style="text-align:center;">
                <button type="submit" style="padding:10px 20px; cursor:pointer;">Add Admin</button>
            </div>
        </form>
    </div>
</body>
</html>
