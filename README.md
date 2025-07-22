# Task Management App

This project is a full-stack task management app with:

- ✅ Laravel API backend (`backend/`)
- ✅ Next.js frontend (`frontend/`)
- ✅ Drag-and-drop UI
- ✅ REST API with UUIDs
- ✅ Status updates: To Do, In Progress, Done

## Backend Setup

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
