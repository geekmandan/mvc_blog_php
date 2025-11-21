<?php
ob_start();
?>

<div style="width:850px; margin:0 auto;">
    <header>
        <h1>MVC Engine Blog</h1>
        <p>Engine for blog website</p>
        <hr>
    </header>

    <div style="display:flex;">
        <!-- Sidebar -->
        <aside style="width:20%; border-right:1px solid #ccc;">
            <h3>Categories</h3>
            <ul style="list-style:none; padding:0; margin:0;">
                <?php foreach($categories as $cat): ?>
                    <li style="margin-bottom:5px;">
                        <a style="text-decoration: none;" href="?route=home&category_id=<?php echo $cat['id']; ?>">
                            <?php echo htmlspecialchars($cat['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>

        <!-- Main content -->
        <main style="flex:1; padding:10px;">
            <div style="margin-bottom:10px; padding-bottom:10px;">
                <!-- Post title -->
                <h2 style="margin:0 0 10px 0; margin-top:10px;">
                    <?php echo htmlspecialchars($post['title']); ?>
                </h2>

                <!-- Post image -->
                <?php if($post['image']): ?>
                    <div style="margin-bottom:10px; margin-top:10px;">
                        <img src="uploads/<?php echo $post['image']; ?>" alt="" style="max-width:100%; display:block;">
                    </div>
                <?php endif; ?>

                <!-- Post content -->
                <div style="margin-bottom:10px;">
                    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                </div>

                <!-- Category -->
                <?php if(!empty($post['category_id'])): ?>
                    <?php
                        $catName = '';
                        foreach($categories as $cat){
                            if($cat['id'] == $post['category_id']) $catName = $cat['name'];
                        }
                    ?>
                    <div style="margin-bottom:15px;">
                        <a style="text-decoration: none;" href="?route=home&category_id=<?php echo $post['category_id']; ?>" style="font-weight:bold;">
                            <?php echo htmlspecialchars($catName); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Date -->
                <div>
                    <small>Date: <?php echo $post['created_at']; ?></small>
                </div>

                <!-- Back button -->
                <div style="margin-top:10px;">
                    <button onclick="window.history.back();" style="padding:5px 10px;">Back to Posts</button>
                </div>
            </div>
        </main>
    </div>

    <footer style="margin-top:20px; border-top:1px solid #ccc; padding-top:10px; text-align:center;">
        &copy; <?php echo date('Y'); ?> MVC Engine Blog
    </footer>
</div>