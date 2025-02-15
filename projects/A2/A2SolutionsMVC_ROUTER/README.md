# Cadastro de carros e sistema de login

- PHP MCV
- Bootstrap
- Font awesome
- jquery


create a database: 

`CREATE DATABASE nomedatabase;`

create users table:

```sql
CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)```


usando bcrypt(PHP HASH better)
create users table:

```sql
CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

```

create cars table:

```sql
CREATE TABLE cars (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    cor VARCHAR(30) NOT NULL,
    ano INT(4) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    status ENUM('novo', 'seminovo') NOT NULL
);
```

## Criar seu usuário:
http://localhost/register.php

## Images svg thanks: https://github.com/dangnelson/car-makes-icons