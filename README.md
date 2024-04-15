# User Registration, Login, and News Aggregator System

This repository contains a PHP-based system that includes user registration, login, and a news aggregator feature. Users can register, log in, and browse news articles categorized into different topics such as sports, politics, technology, and entertainment.

## Features

### User Registration and Login System

- **User Registration**: Users can sign up by providing their first name, last name, email, gender, and password. Basic form validation is implemented to ensure all required fields are filled, email is valid, and password meets minimum length requirements.
- **User Login**: Registered users can log in using their email and password. Passwords are hashed for security.
- **Session Management**: Sessions are used to keep users logged in across pages until they choose to log out.
- **Database Interaction**: User data is stored in a MySQL database. Basic database operations are performed using MySQLi.
- **Responsive Design**: The registration and login forms are designed to be responsive, adapting to various screen sizes.

### News Aggregator

- **Navigation Bar**: The navigation bar allows users to navigate between different news categories and perform searches.
- **Article Display**: Articles are fetched from an external data source and displayed on the homepage based on the selected category or search query.
- **Responsive Design**: The news aggregator feature is designed to be responsive, ensuring a seamless experience across various devices.

## Setup Instructions

### Database Setup:

1. Create a MySQL database with the name `login_registration`.
2. Import the provided SQL file (`database.sql`) into the database to create the necessary table structure.

### Configuration:

1. Update `database.php` with your MySQL database credentials (`$hostName`, `$dbUser`, `$dbPassword`, `$dbName`).

### Web Server:

- Host the PHP files on a web server that supports PHP execution (e.g., Apache, Nginx).

### Access:

- Access the registration form via `registration.php`.
- Access the login form via `login.php`.
- Users need to log in using their credentials to access the homepage (`homepage.php`) and browse news articles.

## Notes

- **Security**: This codebase provides basic functionality and security measures. For production use, consider implementing additional security measures such as input validation, prepared statements, and CSRF protection.
- **Customization**: Feel free to customize the design, add new features, or integrate additional functionalities according to your requirements.
- **External Data Source**: Ensure that the `fetchData` function in `script.js` is correctly implemented to retrieve news data from an external source.


