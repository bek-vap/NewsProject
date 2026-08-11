# 📰 NewsProject — PHP MVC News Portal

A small news website built **from scratch in plain PHP** using the MVC pattern — no
framework. It has a public side for reading news and a password-protected admin panel
for managing articles and the site header. Data is stored in JSON files, so the project
runs anywhere PHP runs, with zero database setup.


> The interface is in **Uzbek**.

---

## ✨ Features

### Public site
- **Home page** with a customizable header (title/subtitle managed from the admin panel).
- **News list** — all articles, newest first.
- **News detail** — full article by id.

### Admin panel
- **Login / logout** with session-based authentication.
- **Create, edit and delete** news articles.
- **Edit the site header** (title and description) without touching the code.

---

## 🛠 Tech Stack

| Layer        | Technology |
|--------------|-----------|
| Language     | PHP 8 (no framework) |
| Pattern      | MVC (Model – View – Controller) |
| Routing      | Single front controller (`public/index.php`) |
| Storage      | JSON files (`data/news.json`, `data/header.json`) |
| Auth         | PHP sessions |

---

## 🧭 How it works

All requests go through one entry point, `public/index.php`, which acts as a **front
controller**. It reads a `?page=` parameter and dispatches to the right controller
method:

```
index.php?page=home              → HomeController::index()
index.php?page=news&id=123       → NewsController::detail(123)
index.php?page=admin_login       → AdminController::login()
index.php?page=admin_dashboard   → AdminController::dashboard()
index.php?page=admin_news_save   → AdminController::newsSave()
```

Controllers talk to models (`News`, `Header`), which read and write the JSON data
files. Views render the HTML. This keeps a clean separation between routing, logic,
data and presentation — the same idea frameworks like Laravel are built on, done by hand
to understand the fundamentals.

---

## 📁 Project Structure

```
.
├── public/
│   ├── index.php           # Front controller / router
│   └── style.css
├── controllers/
│   ├── HomeController.php   # Home page
│   ├── NewsController.php   # News list & detail
│   └── AdminController.php  # Auth + admin CRUD
├── models/
│   ├── News.php            # News CRUD over JSON
│   └── Header.php          # Site header data
├── views/
│   ├── layout/             # Shared header/footer
│   ├── user/               # Public pages
│   └── admin/              # Admin pages (login, dashboard, forms)
└── data/
    ├── news.json           # Stored articles
    └── header.json         # Stored header settings
```

---

## 🚀 Getting Started

### Prerequisites
- PHP 8.x

### Run locally

```bash
# 1. Clone
git clone https://github.com/bek-vap/NewsProject.git
cd NewsProject

# 2. Start PHP's built-in server from the public/ folder
php -S localhost:8000 -t public
```

Then open **http://localhost:8000** in your browser.

- Public site: `http://localhost:8000/index.php?page=home`
- Admin panel: `http://localhost:8000/index.php?page=admin_login`

> Default admin credentials are set in `AdminController.php` — change them before using
> this anywhere real.

---

## 📝 Notes

- Built to practise the **MVC pattern in raw PHP**: front-controller routing, separating
  models/views/controllers, and session-based auth — the foundations behind modern PHP
  frameworks.
- JSON is used as a lightweight datastore so the project runs with no database setup.
