# Delivery System

A modern delivery request management system built with **Laravel 10**, styled using **Tailwind CSS**, featuring two frontend implementations:

- ✅ Laravel Blade-based form (default)
- ✅ Vue 3-based form

---

## 🚀 Features

- Delivery request form with pickup, delivery, shipment, and package info
- Tailwind-styled modern layout and responsive design
- Full validation with error feedback
- View all requests with status tracking
- Cancel pending requests
- Unit and feature tests included

---

## 📁 Project Structure

```
/delivery-system              # Laravel Blade version
```

---

## 🧪 Testing

Run tests:

```bash
php artisan test
```

---

## 🛠 Setup

### Blade Version

```bash
git clone git@github.com:Lmarcho/delivery-system.git
cd delivery-system

cp .env.example .env
php artisan key:generate

composer install
npm install && npm run dev

php artisan migrate
php artisan serve
```

### Vue Version

```bash
cd vue-version
cp .env.example .env
php artisan key:generate

composer install
npm install && npm run dev

php artisan migrate
php artisan serve --port=8001
```

Access Blade: `http://127.0.0.1:8001`  
Access Vue: `http://127.0.0.1:8001/delivery-request/vue`

---

## 🙌 Author

Developed by [Lmarcho](https://github.com/Lmarcho)

- 💻 Laravel Blade Form (main)
- ⚡ Vue 3 Form (additional, in vue-version/)
