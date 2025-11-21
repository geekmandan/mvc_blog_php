<h2>Admin Login</h2>
<?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    <p>
        <label>Username:</label><br>
        <input type="text" name="username">
    </p>
    <p>
        <label>Password:</label><br>
        <input type="password" name="password">
    </p>
    <p>
        <button type="submit">Login</button>
    </p>
</form>
