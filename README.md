# Simple Login System

A simple PHP + MySQL login system with user registration and basic user management (view, edit, delete). Built to run locally on XAMPP.

## Features

- Register a new account
- Login / logout using PHP sessions
- Dashboard shown only to logged-in users
- View all registered users
- Edit and delete users

## Requirements

- [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP)

## Setup

1. Copy this folder into `C:\xampp\htdocs\` (so you have `htdocs\simple-login-system`).
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`, go to the **SQL** tab, and run the contents of `database.sql`. This creates the `simple_system` database and the `users` table.
4. Check `db_connect.php`. The defaults match a standard XAMPP install (`localhost`, user `root`, empty password, database `simple_system`). Change them if yours differ.
5. Open `http://localhost/simple-login-system/` in your browser.

## Project Structure

| File | Purpose |
|------|---------|
| `index.php` | Redirects to the login page |
| `login.php` | Login form |
| `register.php` | Registration form |
| `logout.php` | Ends the session |
| `dashboard.php` | Page shown after login |
| `user_list.php` | Lists all users |
| `edit_user.php` | Edit a user |
| `delete_user.php` | Delete a user |
| `db_connect.php` | Database connection |
| `database.sql` | Database and table setup |
| `style.css` | Styling |

## Note

This is a learning project. Passwords are stored as plain text and are not hashed, so do not use it in production or with real passwords.
