# 📚 About This Project
This project is a Laravel-based backend application built as part of the Timedoor Backend Programming Exam.

It is designed to help a bookstore owner manage and evaluate the popularity of books and authors based on customer ratings. The system uses fake data generation to simulate real-world scenarios and includes features for displaying, filtering, and rating books.

---

# 💡 Key Features
- List of Books: Viewable with filters for search and pagination, ordered by average rating and vote count.

- Top Authors: View top 10 authors based on count of ratings greater than 5.

- Rating Input: Submit rating for a book using a dynamic form.

- Clean Architecture: Business logic handled via service classes for better scalability and maintainability.

- No Cache: As required by the exam, the system does not use any caching mechanism.

---

# 🛠 Tech Stack
- PHP 8.2+

- Laravel 12

- MySQL (for relational database)

- Faker (for data generation)

- Blade templates (for simple views)

- Tailwind CSS & Alpine.js (minimal, for interactivity only)

---

# Instalasi
Follow the steps below to set up this project on your local machine:

## ✅ Prerequisites
- PHP 8.2+

- Composer

- MySQL

- Node.js & NPM

)

## 🧰 Step-by-step Setup

1. **Clone repository**  
   ```bash
   git clone https://github.com/Yoga-Firmansyah/book-rating-system.git
   cd book-rating-system
   ```
2. **Install dependency PHP**  
   ```bash
   composer install
   ```
3. **Configuration Environment**  
   Copy file .env dari .env.example
   ```bash
   cp .env.example .env
   ```
   Generate key
   ```bash
   php artisan key:generate
   ```
   Setup your database in .env:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_book_rating_system
   DB_USERNAME=root
   DB_PASSWORD=

4. **Migrasi & Seeder Database**  
   Run migration and seeder:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```
7. **Serve the app**  
   ```bash
   php artisan serve
   ```
8. **(Optional) Install Node dependencies for frontend (Tailwind/Alpine/etc.)**
   ```bash
   npm install
   ```
9. **(Optional) Build frontend assets**
   ```bash
   npm run dev
   ```
   or if you want to build for production:
   ```bash
   npm run build
   ```

---

# ⚠️ Notes
This project uses no cache (as per the test requirement).

Database seeding may take several minutes and can consume a lot of memory. You may increase memory limit via:

```bash
php -d memory_limit=1G artisan db:seed
```
