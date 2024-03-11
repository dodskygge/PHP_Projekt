-- Tworzenie bazy danych php_projekt
CREATE DATABASE IF NOT EXISTS php_projekt;

-- Ustawienie używanej bazy danych na php_projekt
USE php_projekt;

-- Tworzenie tabeli products
CREATE TABLE IF NOT EXISTS products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    product_quantity INT NOT NULL,
    product_category VARCHAR(50),
    image_url VARCHAR(255)
);

-- Tworzenie tabeli users
-- user_cart to TEXT - dane będą w JSON
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_token VARCHAR(255),
    user_token_expiry DATETIME,
    user_cart TEXT 
);
