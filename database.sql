CREATE DATABASE IF NOT EXISTS php_projekt;
USE php_projekt;

-- Tabela products
CREATE TABLE IF NOT EXISTS products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    product_quantity INT NOT NULL,
    product_category VARCHAR(50) NOT NULL,
    product_sold INT NOT NULL,
    product_discount DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255)
);

-- Tabela users
CREATE TABLE IF NOT EXISTS users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_role VARCHAR(50),
    user_token VARCHAR(255),
    user_token_expiry DATETIME
);

-- Tabela cart
CREATE TABLE IF NOT EXISTS carts (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    cart_user_id INT NOT NULL,
    FOREIGN KEY (cart_user_id) REFERENCES users(user_id),
    cart_product_id INT NOT NULL,
    FOREIGN KEY (cart_product_id) REFERENCES products(product_id),
    cart_quantity INT NOT NULL,
    cart_total DECIMAL(10, 2) NOT NULL
);

-- Tebala orders
CREATE TABLE IF NOT EXISTS orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    order_user_id INT NOT NULL,
    FOREIGN KEY (order_user_id) REFERENCES users(user_id),
    order_adress TEXT NOT NULL,
    order_products TEXT NOT NULL,
    order_total DECIMAL(10, 2) NOT NULL,
    order_status VARCHAR(50) NOT NULL,
    order_date DATETIME
);



