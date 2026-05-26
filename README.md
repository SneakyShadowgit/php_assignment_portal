# 📚 Assignment Portal (PHP/MySQL)

A web-based **Assignment Management System** built with PHP and MySQL, running on XAMPP. It supports three user roles — **Admin**, **Teacher**, and **Student** — each with a dedicated dashboard and feature set.

---

## 🚀 Features

### 👤 Admin
- Add and manage **Students**, **Teachers**, and **Courses**
- Create and manage **Assignments**
- View all users and their data

### 🧑‍🏫 Teacher
- Create assignments linked to their course
- View student **submissions**
- **Grade** submissions and provide feedback

### 🧑‍🎓 Student
- View available **assignments**
- **Upload** assignment submissions (file upload)
- View received **grades and feedback**

---

## 🛠️ Tech Stack

| Layer       | Technology          |
|-------------|---------------------|
| Backend     | PHP 8.2             |
| Database    | MySQL / MariaDB 10.4|
| Server      | Apache (XAMPP)      |
| Frontend    | HTML, CSS           |
| DB Admin    | phpMyAdmin          |

---

## 📁 Project Structure

```
assignment_portal/
├── admin/
│   ├── dashboard.php          # Admin dashboard
│   ├── add_student.php        # Add new student
│   ├── add_teacher.php        # Add new teacher
│   ├── add_course.php         # Add new course
│   ├── add_assignment.php     # Create assignment
│   ├── manage_students.php    # List/manage students
│   ├── manage_teachers.php    # List/manage teachers
│   └── manage_assignments.php # List/manage assignments
├── teacher/
│   ├── dashboard.php          # Teacher dashboard
│   ├── add_assignment.php     # Post new assignment
│   ├── view_uploads.php       # View student submissions
│   ├── grade.php              # Grade a submission
│   └── view_grade.php         # View given grades
├── student/
│   ├── dashboard.php          # Student dashboard
│   ├── view_assignments.php   # Browse assignments
│   ├── upload.php             # Submit assignment file
│   └── view_grades.php        # Check grades & feedback
├── config/
│   └── db.php                 # Database connection config
├── layout/
│   ├── header.php             # Shared page header
│   ├── sidebar.php            # Shared navigation sidebar
│   └── footer.php             # Shared page footer
├── assets/
│   └── css/                   # Stylesheets
├── uploads/                   # Uploaded student files
├── login.php                  # Login page
├── check_login.php            # Login authentication handler
├── logout.php                 # Session logout
└── assignment_portal.sql      # Database schema & seed data
```

---

## ⚙️ Setup & Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (PHP 8.x + Apache + MySQL)
- A web browser

### Steps

1. **Clone or copy** the project into your XAMPP `htdocs` directory:
   ```
   C:\xampp\htdocs\assignment_portal\
   ```

2. **Start XAMPP** — enable **Apache** and **MySQL** services.

3. **Import the database:**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `assignment_portal`
   - Click **Import** and select `assignment_portal.sql`
   - Click **Go**

4. **Configure the database connection** in `config/db.php`:
   ```php
   $host     = "localhost";
   $user     = "root";
   $password = "";           // default XAMPP password is empty
   $database = "assignment_portal";
   ```

5. **Open the application** in your browser:
   ```
   http://localhost/assignment_portal/login.php
   ```

---

## 🔐 Default Login Credentials

| Role    | Username  | Password   |
|---------|-----------|------------|
| Admin   | admin     | admin123   |
| Teacher | teacher1  | teach123   |
| Student | student1  | stu123     |
| Student | student2  | stu123     |

> ⚠️ **Note:** Change these passwords before deploying to a production environment.

---

## 🗄️ Database Schema

The database `assignment_portal` contains the following tables:

| Table         | Description                                      |
|---------------|--------------------------------------------------|
| `users`       | Login credentials and roles (admin/teacher/student) |
| `students`    | Student profile (name, enrollment number)        |
| `teachers`    | Teacher profile (name, course)                   |
| `courses`     | Course list (code and name)                      |
| `assignments` | Assignments linked to courses and teachers       |
| `submissions` | Student file submissions for assignments         |
| `grades`      | Marks and feedback given to submissions          |

---

## 📌 Notes

- Uploaded student files are stored in the `uploads/` directory.
- The project uses **PHP sessions** for authentication and role-based access control.
- Make sure the `uploads/` folder has **write permissions**.

---

## 📄 License

This project is for **educational purposes** only.


## 👤 Author

**Harikrishna P**
- GitHub: [@SneakyShadowgit](https://github.com/SneakyShadowgit)

---

