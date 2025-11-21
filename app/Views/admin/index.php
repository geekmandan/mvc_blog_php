<div style="width:850px; margin:0 auto;">
    <h2>Admin Panel</h2>
    <div style="margin-bottom:10px;">
        <a href="?route=admin_create">Add Post</a> | 
        <a href="?route=admin_categories">Categories</a> | 
        <a href="?route=admin_logout">Logout</a> | 
        <a href="/public/" target="_blank" style="padding:5px 10px; text-decoration:none;">View Site</a>
    </div>

    <?php if(!empty($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div style="display:flex; justify-content: space-between; padding:10px; border:1px solid #ccc; margin-bottom:5px;">
                <div>
                    <strong>ID:</strong> <?php echo $post['id']; ?><br>
                    <strong>Title:</strong> <?php echo htmlspecialchars($post['title']); ?>
                </div>
                <div>
                    <a href="?route=admin_edit&id=<?php echo $post['id']; ?>">Edit</a> | 
                    <a href="?route=admin_delete&id=<?php echo $post['id']; ?>" onclick="return confirm('Delete this post?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>
