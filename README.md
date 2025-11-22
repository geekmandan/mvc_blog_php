# MVC Blog Engine

This is a simple MVC-based blogging engine built with PHP.

## Accessing the Admin Panel

To log in to the admin panel, follow these steps:

1. **Add an admin user in the database**  
   - Open phpMyAdmin (or any MySQL client).  
   - Go to the `admins` table.  
   - Insert a new row with your desired `username`. You can leave the `password` column empty if you want.  
     Example:  
     | id | username | password |
     |----|----------|----------|
     | 1  | admin    |          |

2. **Open the admin panel in your browser**  
   Navigate to the following URL:  
   [http://localhost/public/index.php?route=admin](http://localhost/public/index.php?route=admin)

3. **Login using the credentials from step 1**  
   - Enter the username you added in the `admins` table.  
   - If you left the password empty, just leave it blank.  
   - Click **Login**. You will be redirected to the admin dashboard.

## Promo Page

- A promo page `index.php` is available in the root of your project (htdocs).  
- URL example: [http://localhost/promo.php](http://localhost/index.php)  
- The page contains:
  - Title and short description of the engine
  - Features list
  - Three images displayed in a row
  - "Start Using" button that redirects to the Add Admin form
  - Footer with current year

- Clicking on the images opens them in a **modal popup** for better viewing.

## Adding Admin via Form

- You can now add an admin using the form at:  
  `app/Views/admin/add_admin.php`
- The form checks:
  - Username is not empty
  - Admin with the same username does not already exist
- Password can be left empty or set. If set, it will be hashed automatically.
- After successful addition, you are redirected to the login page.

## Notes

- The admin panel allows you to create, edit, and delete posts.  
- You can also manage categories from the admin interface.  
- Make sure the database connection settings in `app/Models/Database.php` match your local environment.  
- The promo page and images use inline styles and a simple modal script, no external CSS required.  

## Recent Updates / Changelog

- Added **promo.php** page with description, features, images, and "Start Using" button.  
- Added **modal popup** functionality for images on the promo page.  
- Added **Add Admin form** (`add_admin.php`) to simplify admin creation.  
- Fixed **admin login** to properly handle empty or hashed passwords.  
- Updated inline styles for better readability and structure.

## Contact
For questions or suggestions: [rebcoding@gmail.com]
