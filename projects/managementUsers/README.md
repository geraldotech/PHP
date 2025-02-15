
- [https://gmapdev.000webhostapp.com/managementUsers/](https://gmapdev.000webhostapp.com/managementUsers/)

- create a database
- create table users:

```sql

CREATE TABLE users (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CPFCNPJ VARCHAR(255) NOT NULL UNIQUE,
    FirstName VARCHAR(255),
    Address VARCHAR(255),
    role ENUM('admin', 'client') NOT NULL,
    Age INT,
    password CHAR(40) NOT NULL -- SHA1 hash will be 40 characters long
);


```

- orders table

```sql

CREATE TABLE Orders (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    OrderNumber INT,
    UserID INT,
    OBS VARCHAR(255),
    Active BOOLEAN,
    FOREIGN KEY (UserID) REFERENCES users(ID)
);

```

- create admin with SHA1
