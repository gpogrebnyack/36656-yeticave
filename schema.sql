CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories ( 
    id INT AUTO_INCREMENT PRIMARY KEY,  
    name CHAR(128)
);

INSERT INTO categories(name) VALUES ('Доски и лыжи'), ('Крепления'), ('Ботинки'), ('Одежда'), ('Инструменты'), ('Разное');

CREATE TABLE lots ( 
    id INT AUTO_INCREMENT PRIMARY KEY,  
    date_create DATETIME,
    category_id INT,
    name CHAR(128),
    description TEXT,
    img CHAR(128),
    price_start DECIMAL,
    date_finish DATE,
    price_step INT,
    author_id INT,
    winner_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (author_id) REFERENCES users(id),
    FOREIGN KEY (winner_id) REFERENCES users(id)
);

CREATE INDEX l_name ON lots(name);
CREATE INDEX l_cat ON lots(category_id);

CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    rate_date DATETIME,
    rate_price DECIMAL,
    lot_id INT,
    user_id INT
    FOREIGN KEY (lot_id) REFERENCES lots(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE users ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_date DATETIME,
    email CHAR(128),
    name CHAR(128),
    password CHAR(64),
    avatar CHAR(128),
    contacts TEXT
);

CREATE UNIQUE INDEX email ON users(email);
CREATE INDEX u_email ON users(email);
