<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MVC Engine Blog</title>
</head>
<body>
    <div style="width:850px; margin:0 auto;">
        <header>
            <h1>MVC Engine Blog</h1>
            <p>Engine for blog website</p>
            <hr>
        </header>
        <div style="display:flex;">
            <aside style="width:20%; padding: 0 0 10px; border-right:1px solid #ccc;">
                <h3>Category</h3>
                <ul>
                    <?php foreach($categories as $cat): ?>
                        <li><?php echo htmlspecialchars($cat['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <main style="flex:1; margin-left: 20px;">
                <?php echo $content; ?>
            </main>
        </div>
        <footer style="border-top:1px solid #ccc; padding:10px; margin-top:10px; text-align:center;">
            &copy; <?php echo date('Y'); ?> MVC Engine Blog. All rights reserved.
        </footer>
    </div>
</body>
</html>
