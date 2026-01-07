INFO 3305 Section 4
Web Application development

Project title: The Sisters Coffee 
A Laravel-based coffee ordering system featuring a User Menu and an Admin Dashboard.

🛠 Prerequisites
Ensure you have the following installed:
1.PHP >= 8.1
2.Composer
3.XAMPP / MySQL

🚀 Installation & Setup
1.Extract the zip file and open your terminal inside the project folder.

2.Run the following command to download the Laravel framework files: composer install

3.Open the .env file and find the line DB_DATABASE.

4.Change it to: DB_DATABASE=sister_coffee

5.Ensure APP_URL is set to: APP_URL=http://127.0.0.1:8000

6.Run php artisan key:generate

7.Start Apache and MySQL in your XAMPP Control Panel.

8.Go to http://localhost/phpmyadmin/ in your browser.

9.Create a new database named sister_coffee.

10.Click the Import tab, select the sister_coffee.sql file found in the project folder, and click Go

11.Run php artisan storage:link

12.Run php artisan serve

13.Visit the website at: http://127.0.0.1:8000 

📝 Admin Access
Email: admin@gmail.com (or the email you used for your admin account)
Password: 12345678 (or your chosen password)

✨ Key Features 
User Side: Search coffee menu, add items to cart, place order, view order history.

Admin Side: Manage Menu items, manage order (change status of order), manage availability of items