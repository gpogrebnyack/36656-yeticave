CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories ( 
    id INT AUTO_INCREMENT PRIMARY KEY,  
    category CHAR(128)
);

INSERT INTO categories
SET category = 'Доски и лыжи';
INSERT INTO categories
SET category = 'Крепления'; 
INSERT INTO categories
SET category = 'Ботинки';
INSERT INTO categories
SET category = 'Одежда';
INSERT INTO categories
SET category = 'Инструменты';
INSERT INTO categories
SET category = 'Разное';

CREATE INDEX c_text ON categories(category);

CREATE TABLE lots ( 
    id INT AUTO_INCREMENT PRIMARY KEY,  
    date_create DATETIME,
    catgory categories_id
    name CHAR(128),
    about TEXT,
    img CHAR(128),
    price_start DECIMAL,
    date_finish DATE,
    price_step INT,
    author users_id,
    winner users_id
);

CREATE INDEX c_text ON lots(name);

CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    rate_date DATETIME,
    rate_price DECIMAL,
    lot lots_id,
    user users_id
);

CREATE TABLE users ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration DATETIME,
    email CHAR(128),
    name CHAR(128),
    password CHAR(64),
    avatar CHAR(128),
    contacts TEXT,
    lots lots_id,
    rates rates_id
);

CREATE UNIQUE INDEX email ON users(email);
