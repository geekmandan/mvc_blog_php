<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MVC Blog Engine - Promo</title>
    <style>
        /* Modal overlay */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.7);
        }

        /* Modal content */
        .modal-content {
            margin: 10% auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
            border: 2px solid #fff;
        }

        /* Close button */
        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Images row */
        .image-row {
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 20px;
        }

        .image-box {
            text-align: center;
        }

        .image-box img {
            width: 280px; 
            height: 150px; 
            border: 1px solid #ccc;
            cursor: pointer;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div style="width:850px; margin:0 auto; text-align:center; padding:20px 0;">
        <h1>MVC Blog Engine</h1>
        <p>A lightweight PHP MVC engine for blogging</p>
        <hr>
    </div>

    <!-- Main content -->
    <div style="width:850px; margin:0 auto; padding:10px;">

        <!-- Description -->
        <div style="margin-bottom:20px;">
            <p>This MVC Blog Engine is a simple and minimalistic platform built with PHP, designed to help you quickly create, manage, and publish blog posts. It uses a clean MVC architecture for organized code.</p>
        </div>

        <!-- Features -->
        <div style="margin-bottom:20px;">
            <h2>Features:</h2>
            <ul>
                <li>Create, edit, and delete blog posts</li>
                <li>Manage categories for your posts</li>
                <li>Simple admin panel interface</li>
                <li>Upload images for posts</li>
                <li>Easy to extend and customize</li>
            </ul>
        </div>

        <!-- Images in a row -->
        <div class="image-row">
            <div class="image-box">
                <img src="images/main_page.jpg" alt="Main Page" onclick="openModal(this)">
                <p>Main Page</p>
            </div>
            <div class="image-box">
                <img src="images/admin_panel.jpg" alt="Admin Panel" onclick="openModal(this)">
                <p>Admin Panel</p>
            </div>
            <div class="image-box">
                <img src="images/add_category.jpg" alt="Manage Categories" onclick="openModal(this)">
                <p>Manage Categories</p>
            </div>
        </div>

        <!-- Start link -->
        <div style="margin-bottom:20px;">
            <a href="app/Views/admin/add_admin.php" style="display:inline-block; padding:10px 20px; background-color:#ddd; text-decoration:none;">Start Using</a>
        </div>

    </div>

    <!-- Modal container -->
    <div id="myModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

    <!-- Footer -->
    <div style="width:850px; margin:20px auto; text-align:center; padding:10px 0; border-top:1px solid #ccc;">
        &copy; <?php echo date('Y'); ?> MVC Blog Engine
    </div>

    <script>
        const modal = document.getElementById("myModal");
        const modalImg = document.getElementById("modalImg");

        function openModal(img) {
            modal.style.display = "block";
            modalImg.src = img.src;
        }

        function closeModal() {
            modal.style.display = "none";
        }

        // Close modal when clicking outside the image
        modal.addEventListener('click', function(e){
            if(e.target === modal) closeModal();
        });
    </script>

</body>
</html>
