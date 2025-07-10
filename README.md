# 💼 HustleHub – Laravel + React Job Portal
**HustleHub** is a full-featured web application built using **Laravel (PHP)** for the backend and **React** for the frontend. It is designed to streamline job listings, applications, and administrative workflows in a responsive, scalable, and developer-friendly way.

## 🚀 Features
- 🔐 Authentication & Authorization
- 📝 Job Listings Management
- 🌐 RESTful API Architecture for frontend-backend separation
- 💬 User-Friendly Frontend built with React, TailwindCSS, and Vite
- 📦 Modern Build Tooling using Vite for fast HMR and production builds
- 🧪 Ready for Testing, Session management, and Database Queueing
- 📊 Admin Panel and user dashboards (customizable)

## 🛠️ Tech Stack

| Layer        | Technologies                                                 |
|-----------   |--------------------------------------------------------------|
| **Frontend** | React, Vite, TailwindCSS                                     |
| **Backend**  | Laravel (PHP), MVC Architecture                              |
| **Database** | PostgreSQL (configurable via `.env`)                         |
| **API**      | RESTful with Laravel Controllers                             |
| **Dev Tools**| Composer, Node.js, Artisan CLI, NPM                          |

## ⚙️ Installation
### Clone the repository
git clone https://github.com/your-username/jobsearch.git
cd jobsearch
### Install backend dependencies
composer install
### Install frontend dependencies
npm install
### Create environment file
cp .env.example .env
### Generate application key
php artisan key:generate
### Setup database
php artisan migrate --seed
### Run development servers
php artisan serve
npm run dev

## ⚙️ Environment Configuration

Copy the `.env.example` file and set up your environment variables:

```bash
cp .env.example .env

APP_NAME=JobSearch
APP_ENV=local
APP_KEY=base64:your_app_key_here
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jobsearch
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
QUEUE_CONNECTION=database

💡 Use php artisan key:generate to generate the APP_KEY after setting up your .env.

