Laravel 12 User Application Project with Laragon
This repository is a User Application project built with Laravel 12. Below are the installation steps to set up the development environment using Laragon.

Prerequisites
Before you begin, ensure you have the following installed:

PHP (>= 8.1)
Composer
Laragon
Step 1: Install Laragon
Download Laragon:

Go to the official Laragon website and download the latest version.
Install Laragon:

Run the installer and follow the on-screen instructions.
Choose a directory (e.g., C:\laragon).
Start Apache and MySQL:

Open Laragon and click Start All to start the Apache and MySQL servers.
Step 2: Install Composer
Download Composer:

Go to the official Composer website and download the installer.
Install Composer:

Run the installer and follow the setup process.
Verify Composer Installation:

composer --version
This should display the installed version of Composer.

Step 3: Clone the Repository
Open Laragon Terminal and navigate to the www directory:
cd C:\laragon\www
Clone the repository:
git clone https://github.com/afreena02/UserApplication.git
Navigate to the project directory:
cd UserApplication
Step 4: Install Laravel Dependencies
Run the following command to install the required dependencies:

composer install
Step 5: Create the Database
Open Laragon and click Database > MySQL > phpMyAdmin.
Create a new database named website_test.
Alternatively, you can create the database via MySQL command line:

mysql -u root -p
CREATE DATABASE website_test;
Step 6: Configure the .env File
Copy the .env.example file to .env:

cp .env.example .env
Edit the .env file with the following database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_test
DB_USERNAME=root
DB_PASSWORD=
Step 7: Generate the Application Key
Run the following command:

php artisan key:generate
This will update the APP_KEY in your .env file.

Step 8: Run Migrations
Run the database migrations to create the necessary tables:

php artisan migrate
If your project includes seeders, run:

php artisan db:seed
Step 9: Create Storage Link
Run the following command to link the storage folder:

php artisan storage:link
Step 10: Optimize the Application
Run the following command to optimize performance:

php artisan optimize
Step 11: Serve the Application
Use the Laravel built-in server to run the application:

php artisan serve
The application will be available at http://127.0.0.1:8000.

Troubleshooting
Laragon Not Starting: Ensure required ports (80 for Apache, 3306 for MySQL) are not being used by other applications.
Composer Issues: If you encounter dependency issues, try:
composer update
composer install
composer clear-cache
Conclusion
You've successfully set up Laravel 12 on your local machine using Laragon. You can now start building and testing your application!
