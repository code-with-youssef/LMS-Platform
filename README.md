# Learning Management System (LMS)

A comprehensive role-based Learning Management System built with Laravel, designed to streamline the educational process for administrators, teachers, and students. The system provides distinct dashboards for each role and supports a wide range of features including assignment management, automatic grading, and resource sharing.

## 🔒 Authentication & Role System

The system supports **three user roles**:

- **Admin**
- **Teacher**
- **Student**

Each role is securely managed using Laravel middleware. Upon login, users are redirected to their respective dashboards. The access to routes and functionalities is fully protected using role-specific middleware.

---

## 🧑‍💼 Admin Dashboard

Admins have full control over the system with the ability to:

- View all registered students and teachers.
- Add, edit, or delete user accounts.
- Upload and manage books and educational resources accessible to students.

---

## 👨‍🏫 Teacher Dashboard

Teachers have tools to manage student progress and assignments:

- View all assigned students.
- Create and assign assignments.
- View student submissions.
- Automatic grading based on the student’s submitted answers.

---

## 🧑‍🎓 Student Dashboard

Students interact with learning materials and assignments via their dedicated dashboard:

- View all available books and resources uploaded by the admin.
- View assignments from their linked teachers.
- Submit answers for assignments.
- Automatically receive and view grades.
- Access materials and tasks from **all linked teachers**.

---

## 🔄 Relationships

- **Teacher ↔ Student**: Many-to-Many relationship. Each teacher can have multiple students, and each student can be assigned to multiple teachers.

---

## 📚 Main Features

- ✅ Role-based dashboards: Admin / Teacher / Student
- ✅ Middleware-protected routing and role authentication
- ✅ Assignment creation, submission, and **automatic grading**
- ✅ Student-Teacher many-to-many relationship
- ✅ Admin-managed book/resource library
- ✅ Clear structure and separation of logic per role

---

## 🛠️ Tech Stack

| Layer      | Technology               |
|------------|---------------------------|
| Backend    | Laravel (PHP Framework)   |
| Frontend   | Blade, HTML5, CSS3        |
| Database   | MySQL                     |
| Auth       | Laravel Sanctum / Middleware |

---

## 🏁 Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM (for frontend assets)

### Installation

```bash
git clone https://github.com/your-username/lms-laravel.git
cd lms-laravel
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
