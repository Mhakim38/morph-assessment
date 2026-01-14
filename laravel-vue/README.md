# Laravel + Vue Project

A web application built with Laravel backend and Vue.js frontend featuring form submission and data listing with currency and date formatting.

## Features

- Form submission with validation
- Data listing table with AJAX loading
- Currency formatting (MYR)
- Date formatting
- jQuery AJAX integration
- Bootstrap 5 styling

## Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** >= 8.2
- **Composer** (latest version)
- **Node.js** >= 18.x and **npm**
- **MySQL**
- **Git**

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd laravel-vue
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install JavaScript Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Database Setup

Configure your database credentials in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Run migrations (Laravel will prompt to create the database if it doesn't exist):

```bash
php artisan migrate
```

When prompted "The database 'your_database_name' does not exist. Would you like to create it?", type `yes`.

## Running the Project

You need to run **TWO servers** simultaneously:

### Terminal 1: Laravel Development Server

```bash
php artisan serve
```

The Laravel server will start at: `http://127.0.0.1:8000`

### Terminal 2: Vite Development Server

```bash
npm run dev
```

The Vite server will start at: `http://localhost:5173` or `http://localhost:5174`

## Accessing the Application

Open your browser and navigate to:

```
http://127.0.0.1:8000
```

## Project Structure

```
laravel-vue/
├── app/
│   ├── Http/Controllers/
│   │   └── ItemController.php      # Handles form submission and data fetching
│   └── Models/
│       └── Item.php                 # Item model
├── database/
│   └── migrations/
│       └── 2026_01_14_*_create_items_table.php
├── resources/
│   ├── js/
│   │   ├── components/
│   │   │   └── DataForm.vue        # Main form component
│   │   ├── App.vue                 # Root Vue component
│   │   └── app.js                  # Vue app entry point
│   └── views/
│       └── welcome.blade.php       # Main blade template
├── routes/
│   └── web.php                     # Application routes
└── package.json                    # Node dependencies
```

## API Endpoints

- `GET /` - Main page
- `GET /items` - Fetch all items (AJAX)
- `POST /submit-form` - Submit new item

## Technologies Used

### Backend
- Laravel 11.x
- PHP 8.2+
- MySQL

### Frontend
- Vue.js 3.x
- jQuery 3.7.x
- Bootstrap 5.3
- Vite 7.x

## Troubleshooting

### Vite Manifest Not Found Error

Make sure the Vite development server is running:
```bash
npm run dev
```

### Port Already in Use

If port 8000 is already in use, specify a different port:
```bash
php artisan serve --port=8001
```

### Database Connection Error

Verify your database credentials in `.env` and ensure the database exists.

### jQuery Not Working

Ensure jQuery is installed:
```bash
npm install jquery
```

## Building for Production

To build assets for production:

```bash
npm run build
```

Then serve using a production web server (Apache/Nginx) instead of `php artisan serve`.

## License

This project is open-sourced software.

---

