## Sistema de login PHP + MySQL

- register
- reset password
- login page
- welcome page

[ref](https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php)


 - Fazer uma database no mysl e executar: 


 ```sql
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

 ```