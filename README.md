Laravel + Vue 3 Project

This is a Laravel 11 backend integrated with a Vue 3 frontend. The Laravel backend runs on http://127.0.0.1:8000, while the Vue frontend runs on http://localhost:5173.

Setup Instructions

Prerequisites

Ensure you have the following installed:

PHP 8.1+

Composer

Node.js & npm

MySQL (or any preferred database)

Laravel 11

Vue 3

Git

1. Clone the Repository
git clone https://github.com/your-username/your-repo.git
cd your-repo
2. Install Backend Dependencies
composer install
3. Configure Environment

Copy the example .env file and update database credentials:
cp .env.example .env
Edit .env and set up your MySQL database:
DB_CONNECTION=mysql
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
Generate the application key:
php artisan key:generate
4. Migrate Database
php artisan migrate
5. Install Frontend Dependencies
npm install
6. Build Frontend
npm run build
7. Run the Project

Start the Laravel server:
php artisan serve
Start the Vue frontend:
npm run dev


npm run dev

8. Access the Application

Backend (Laravel): http://127.0.0.1:8000

Frontend (Vue): http://localhost:5173
