<div style="width:400px; margin:50px auto; padding:20px;">
    <h2 style="text-align:center; margin-bottom:20px;">Admin Login</h2>

    <?php if(!empty($error)): ?>
        <p style="color:red; text-align:center;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST" style="display:flex; flex-direction:column; gap:15px;">
        <div>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" style="width:100%; padding:8px;">
        </div>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" style="width:100%; padding:8px;">
        </div>

        <div style="text-align:center;">
            <button type="submit" style="padding:10px 20px; cursor:pointer;">Login</button>
        </div>
    </form>
</div>
