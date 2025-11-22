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
   
http://localhost/public/index.php?route=admin


3. **Login using the credentials from step 1**  
- Enter the username you added in the `admins` table.  
- If you left the password empty, just leave it blank.  
- Click **Login**. You will be redirected to the admin dashboard.

## Notes

- The admin panel allows you to create, edit, and delete posts.  
- You can also manage categories from the admin interface.  
- Make sure the database connection settings in `app/Models/Database.php` match your local environment.
