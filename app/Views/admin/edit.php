<div style="width:850px; margin:0 auto;">
    <h2><?php echo isset($post) ? 'Edit Post' : 'Add Post'; ?></h2>

    <!-- Back button -->
    <button onclick="history.back();" style="margin-bottom:10px; padding:5px 10px;">Back</button>

    <form method="POST" enctype="multipart/form-data" style="display:flex; flex-direction:column; gap:15px;">
        <!-- Title -->
        <div style="display:flex; flex-direction:column;">
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $post['title'] ?? ''; ?>" required style="padding:5px;">
        </div>

        <!-- Content -->
        <div style="display:flex; flex-direction:column;">
            <label>Content:</label>
            <textarea name="content" required style="padding:5px; min-height:100px;"><?php echo $post['content'] ?? ''; ?></textarea>
        </div>

        <!-- Category -->
        <div style="display:flex; flex-direction:column;">
            <label>Category:</label>
            <select name="category_id" style="padding:5px;">
                <option value="">--Select--</option>
                <?php foreach($categories as $cat): ?>
                    <option value="<?php echo $cat['id']; ?>" <?php if(isset($post) && $post['category_id']==$cat['id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($cat['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Image -->
        <div style="display:flex; flex-direction:column;">
            <label>Image:</label>
            <input type="file" name="image">
            <?php if(isset($post) && $post['image']): ?>
                <img src="../public/uploads/<?php echo $post['image']; ?>" style="max-width:150px; margin-top:5px;">
            <?php endif; ?>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit" style="padding:5px 10px;">Save</button>
        </div>
    </form>
</div>
