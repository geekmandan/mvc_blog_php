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
            <?php if(!empty($posts)): ?>
                <?php foreach($posts as $post): ?>
                    <div style="display:flex; border-bottom:1px solid #ccc; margin-bottom:10px; padding-bottom:10px;">
                        <!-- Image on the left -->
                        <?php if($post['image']): ?>
                            <div style="width:200px; margin-right:10px; margin-top:5px;">
                                <img src="uploads/<?php echo $post['image']; ?>" alt="" style="width:100%; display:block;">
                            </div>
                        <?php endif; ?>

                        <!-- Content on the right -->
                        <div style="flex:1; display:flex; flex-direction:column;">
                            <!-- Post title -->
                            <h2 style="margin:0 0 5px 0; margin-top: 10px;">
                                <a style="text-decoration: none;" href="?route=post&id=<?php echo $post['id']; ?>">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h2>

                            <!-- Category under title -->
                            <?php if(!empty($post['category_id'])): ?>
                                <?php
                                    $catName = '';
                                    foreach($categories as $cat){
                                        if($cat['id'] == $post['category_id']) $catName = $cat['name'];
                                    }
                                ?>
                                <div style="margin-bottom:5px; margin-top: 10px;">
                                    <a style="text-decoration: none;" href="?route=home&category_id=<?php echo $post['category_id']; ?>" style="font-weight:bold;">
                                        <?php echo htmlspecialchars($catName); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <!-- Post text -->
                            <p style="margin:0 0 5px 0; margin-top: 10px;"><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

                            <!-- Date and Read More -->
                            <div style="text-align:left; margin-top: 10px;">
                                <small>Date: <?php echo $post['created_at']; ?></small> |
                                <a href="?route=post&id=<?php echo $post['id']; ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Pagination -->
                <?php if($totalPages>1): ?>
                    <div>
                        <?php for($i=1;$i<=$totalPages;$i++): ?>
                            <a style="text-decoration: none;" href="?route=home&page=<?php echo $i; ?>" style="margin:0 5px;"><?php echo $i; ?></a>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </main>
    </div>

    <footer style="margin-top:20px; border-top:1px solid #ccc; padding-top:10px; text-align:center;">
        &copy; <?php echo date('Y'); ?> MVC Engine Blog
    </footer>
</div>
