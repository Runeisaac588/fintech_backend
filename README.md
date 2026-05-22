# Fintech Dashboard Backend API

REST API built with Laravel and PostgreSQL for fintech dashboard management.

---

## 🚀 Tech Stack

- Laravel 12
- PHP 8+
- PostgreSQL
- Laravel Sanctum

---

## 📦 Features

- Authentication
- Sanctum token system
- Orders API
- Search
- Filters
- Pagination
- Sorting
- Protected routes
- Modular architecture

---

## 🧱 Architecture

```bash
app/
│
├── Core/
│   └── Modules/
│       ├── Auth/
│       └── Orders/
│
├── Models/
│
├── Http/
│
└── routes/
```

---

## ⚙️ Installation

```bash
composer install
```

---

## 🔐 Environment Variables

Create:

```bash
.env
```

Example:

```env
APP_NAME=FintechAPI

APP_ENV=local

APP_KEY=

APP_DEBUG=true

APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=fintech_db
DB_USERNAME=postgres
DB_PASSWORD=yourpassword
```

---

## 🗄️ Run Migrations

```bash
php artisan migrate
```

---

## 🌱 Seed Database

```bash
php artisan db:seed
```

---

## ▶️ Run Server

```bash
php artisan serve
```

Server runs on:

```bash
http://localhost:8000
```

---

## 🔑 Authentication

Authentication handled with:

- Laravel Sanctum
- Token-based authentication

Protected routes use:

```php
auth:sanctum
```

---

## 📡 API Endpoints

### Authentication

```http
POST /api/login
POST /api/logout
```

### Orders

```http
GET /api/orders
GET /api/orders/{id}
```

---

## 🔎 Orders Features

Supports:

- Search
- Filters
- Pagination
- Sorting

---

## 📊 Dashboard Summary

Includes:

- Total Orders
- Total Revenue
- Failed Payments

---

## 🛡️ Security

- Protected routes
- Hashed passwords
- Token authentication

---

## 👨‍💻 Author

Adan Isaac