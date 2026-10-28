# Student Management System

A simple web application built with PHP and MySQL to manage student records. It has an admin login, a dashboard, and options to add, edit, delete and search students.

## Features

- Admin login and logout (session based)
- Dashboard showing all students
- Add a new student
- Edit student details
- Delete a student
- Search students

## Tech Stack

- PHP
- MySQL / MariaDB
- HTML and CSS
- XAMPP (local server)

## Project Structure

```
student_management_system/
├── admin/
│   ├── add_student.php
│   ├── dashboard.php
│   ├── delete_student.php
│   ├── edit_student.php
│   └── search.php
├── config/
│   └── database.php
├── includes/
│   ├── footer.php
│   ├── header.php
│   ├── sidebar.php
│   └── style.css
├── login.php
├── logout.php
└── student_management.sql
```

## How to Run

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Copy this project folder into `C:\xampp\htdocs\`.
3. Open `http://localhost/phpmyadmin` and create a database named `student_management`.
4. Select the database, click **Import**, and choose `student_management.sql`.
5. Check `config/database.php`. The default settings are host `localhost`, user `root`, and an empty password.
6. Open `http://localhost/student_management_system/login.php` in your browser.

## Demo Login

| Username | Password |
|----------|----------|
| admin    | admin123 |

This login is for demonstration only. Change it before using the project anywhere real.

## Future Improvements

- Hash passwords with `password_hash()` and `password_verify()`
- Use prepared statements to prevent SQL injection
- Add
