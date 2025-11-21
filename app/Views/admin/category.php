<div style="width:850px; margin:0 auto;">
    <h2>Categories</h2>

    <button onclick="history.back();" style="margin-bottom:10px; padding:5px 10px;">Back</button>

    <?php if(!empty($categories)): ?>
        <?php foreach($categories as $cat): ?>
            <div style="display:flex; justify-content: space-between; align-items: center; padding:10px; border:1px solid #ccc; margin-bottom:5px;">
                <div>
                    <strong>ID:</strong> <?php echo $cat['id']; ?><br>
                    <strong>Name:</strong> <?php echo htmlspecialchars($cat['name']); ?>
                </div>
                <div>
                    <a href="#">Edit</a> | 
                    <a href="#" onclick="return confirm('Delete this category?')">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>

    <h3>Add New Category</h3>
    <form method="POST" style="margin-top:10px; display:flex; gap:10px;">
        <input type="text" name="name" placeholder="New Category" required style="flex:1; padding:5px;">
        <button type="submit" style="padding:5px 10px;">Add</button>
    </form>
</div>
