# Laravel 12 User Application Project with Laragon

This repository is a User Application project built with Laravel 12. Below are the installation steps to set up the development environment using Laragon.

## Prerequisites
Before you begin, ensure you have the following installed:

- PHP (>= 8.1)
- Composer
- Laragon

## Step 1: Install Laragon
### Download Laragon:
- Go to the official Laragon website and download the latest version.

### Install Laragon:
- Run the installer and follow the on-screen instructions.
- Choose a directory (e.g., `C:\laragon`).

### Start Apache and MySQL:
- Open Laragon and click **Start All** to start the Apache and MySQL servers.

## Step 2: Install Composer
### Download Composer:
- Go to the official Composer website and download the installer.

### Install Composer:
- Run the installer and follow the setup process.

### Verify Composer Installation:
```sh
composer --version
```
This should display the installed version of Composer.

## Step 3: Clone the Repository
Open Laragon Terminal and navigate to the `www` directory:
```sh
cd C:\laragon\www
```
Clone the repository:
```sh
git clone https://github.com/afreena02/UserApplication.git
```
Navigate to the project directory:
```sh
cd UserApplication
```

## Step 4: Install Laravel Dependencies
Run the following command to install the required dependencies:
```sh
composer install
```

## Step 5: Create the Database
### Using phpMyAdmin:
- Open Laragon and click **Database > MySQL > phpMyAdmin**.
- Create a new database named `website_test`.

### Using MySQL command line:
```sh
mysql -u root -p
CREATE DATABASE website_test;
```

## Step 6: Configure the .env File
Copy the `.env.example` file to `.env`:
```sh
cp .env.example .env
```
Edit the `.env` file with the following database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_test
DB_USERNAME=root
DB_PASSWORD=
```

## Step 7: Generate the Application Key
Run the following command:
```sh
php artisan key:generate
```
This will update the `APP_KEY` in your `.env` file.

## Step 8: Run Migrations
Run the database migrations to create the necessary tables:
```sh
php artisan migrate
```
If your project includes seeders, run:
```sh
php artisan db:seed
```

## Step 9: Create Storage Link
Run the following command to link the storage folder:
```sh
php artisan storage:link
```

## Step 10: Optimize the Application
Run the following command to optimize performance:
```sh
php artisan optimize
```

## Step 11: Serve the Application
Use the Laravel built-in server to run the application:
```sh
php artisan serve
```
The application will be available at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Troubleshooting
- **Laragon Not Starting**: Ensure required ports (80 for Apache, 3306 for MySQL) are not being used by other applications.
- **Composer Issues**: If you encounter dependency issues, try:
  ```sh
  composer update
  composer install
  composer clear-cache
  ```

## Conclusion
You've successfully set up Laravel 12 on your local machine using Laragon. You can now start building and testing your application!

---

## .env File
```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:2heL5PReZKnlfhRob6DE7xKnyy3FYKl53O/b9VQ03Lg=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_test
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
# CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_SCHEME=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=436402c97cb4a1
MAIL_PASSWORD=8c7c957fcc47c9

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"
FILESYSTEM_DISK=public
```

