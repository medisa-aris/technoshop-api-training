# 🛍️ Technoshop API (Lumen PHP Framework)

Technoshop API is a lightweight backend built with **Laravel Lumen**, designed for high performance and simple RESTful API development.  
It serves as the backend for the Technoshop web application — providing product data, pagination, and database management using **SQL Server**.

---

## 🚀 Features

- Built with [Laravel Lumen](https://lumen.laravel.com)
- RESTful API architecture
- Pagination and filtering
- SQL Server database support
- Eloquent ORM enabled
- Simple setup & fast local run

---

## 📦 Project Structure

technoshop-api/
├── app/
│ ├── Http/
│ │ └── Controllers/
│ │ └── ProductController.php
│ └── Models/
│ └── Product.php
├── bootstrap/
│ └── app.php
├── database/
│ └── migrations/
├── public/
│ └── index.php
├── routes/
│ └── web.php
├── .env
├── composer.json
└── README.md


---

## ⚙️ Requirements

Before you begin, make sure you have:

- **PHP ≥ 8.1**
- **Composer ≥ 2.5**
- **SQL Server** (or Docker container)
- PHP extensions:
  - `pdo_sqlsrv`
  - `sqlsrv`
  - `mbstring`
  - `openssl`
  - `tokenizer`

You can check installed PHP modules:
```bash
php -m


🧩 Installation

Clone the repository

git clone https://github.com/yourusername/technoshop-api.git
cd technoshop-api


Install dependencies

composer install


Copy the environment file

cp .env.example .env


Configure database connection in .env:

DB_CONNECTION=sqlsrv
DB_HOST=localhost
DB_PORT=1433
DB_DATABASE=technoshop
DB_USERNAME=sa
DB_PASSWORD=your_password


Enable Facades & Eloquent
Open bootstrap/app.php and make sure these lines are uncommented:

$app->withFacades();
$app->withEloquent();

🗃️ Database Setup
1. Run Migrations
php artisan migrate

2. (Optional) Seed Sample Data

You can insert your product data manually or create a seeder:

php artisan make:seeder ProductSeeder
php artisan db:seed --class=ProductSeeder

🧠 Example API Endpoint

GET Products (with pagination)

GET http://localhost:8080/products?page=1&row=10


Sample Response:

{
  "page": 1,
  "row": 10,
  "total": 25,
  "data": [
    {
      "id": 1,
      "title": "Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops",
      "price": 109.95,
      "category": "men's clothing",
      "rating_rate": 3.9,
      "rating_count": 120
    }
  ]
}

▶️ Run the Server

Start the built-in PHP development server:

php -S localhost:8080 -t public


Now visit:
👉 http://localhost:8080/products