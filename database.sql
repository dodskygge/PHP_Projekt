CREATE DATABASE IF NOT EXISTS php_projekt;
USE php_projekt;

-- Tabela products
CREATE TABLE IF NOT EXISTS products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    product_quantity INT NOT NULL,
    product_category VARCHAR(50) NOT NULL,
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
    order_products_id TEXT NOT NULL,
    order_total DECIMAL(10, 2) NOT NULL,
    order_payment VARCHAR(50) NOT NULL,
    order_status VARCHAR(50) NOT NULL,
    order_date DATETIME
);

-- INSERTY
INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_role`, `user_token`, `user_token_expiry`) VALUES ('admin', 'admin@localhost', '$2y$10$dwOWbNGBCknqGMk0Du0UjOg92dFgWsaH72FhDied9f2msaQXs/W5e', 'admin', NULL, NULL);
INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_role`, `user_token`, `user_token_expiry`) VALUES ('user', 'user@gmail.com', '$2y$10$MTtNrGJXRtW57JiTsWtM1eS.YkhFrsl4R0VuvfJlJ1gtZrS/5UYJ2', 'user', NULL, NULL);

INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Zestaw komputerowy dla graczy i5-12600k RTX3060', '5599', '5', 'computers', '1', '/img/komp1.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Komputer i5-2500k RX480 8 GB', '1999', '10', 'computers', '0', '/img/komp2.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('MINI Komputer J4125', '130', '8', 'computers', '0', '/img/komp3.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Komputer biurowy DELL i5-4800', '1200', '7', 'computers', '0', '/img/komp4.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Komputer biurowy DELL Intel Pentium 4', '800', '4', 'computers', '0', '/img/komp5.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Komputer i9-10900k RTX4070', '5999', '12', 'computers', '0', '/img/komp6.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Mini komputer Tonix', '199', '13', 'computers', '0', '/img/komp7.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Commodore 64 Unikat', '6400', '1', 'computers', '1', '/img/komp8.png');

INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop Lenovo i7-6700', '2100', '13', 'laptops', '0', '/img/lap1.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop Lenovo IdeaPad Gaming', '3400', '12', 'laptops', '0', '/img/lap2.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop Acer i7-8600', '3199', '6', 'laptops', '0', '/img/lap3.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop edukacyjny', '20', '8', 'laptops', '1', '/img/lap4.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop Dell Precision', '2899', '9', 'laptops', '0', '/img/lap5.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Laptop Gigabyte Ai', '3699', '53', 'laptops', '0', '/img/lap6.png');

INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Toner do drukarki Brother - CF244A', '60', '6', 'accessories', '0', '/img/acc1.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Tusz do drukarki HP - zestaw 5x', '80', '5', 'accessories', '0', '/img/acc2.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Tusz do drukarki HP - zestaw 10x', '160', '2', 'accessories', '0', '/img/acc3.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Tusz do drukarki Brother - XL B321BK', '69', '7', 'accessories', '0', '/img/acc4.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Bęben do drukarki BROTHER L2520', '55', '10', 'accessories', '0', '/img/acc5.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Bęben do drukarki BROTHER 7030', '58', '6', 'accessories', '0', '/img/acc6.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('ESP32 z modułem WiFi i BT', '45', '8', 'accessories', '1', '/img/acc7.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Arduino Uno', '79', '22', 'accessories', '', '/img/acc8.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Zestaw Arudino XL', '145', '11', 'accessories', '0', '/img/acc9.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Multimetr', '39', '7', 'accessories', '', '/img/acc10.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Kabel światłowodowy 30m', '99', '9', 'accessories', '0', '/img/acc11.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Mysz komputerowa', '20', '12', 'accessories', '0', '/img/acc12.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Mysz ergonomiczna', '109', '8', 'accessories', '0', '/img/acc13.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Mysz dla graczy Bloody', '159', '6', 'accessories', '0', '/img/acc14.png');
INSERT INTO `products` (`product_name`, `product_price`, `product_quantity`, `product_category`, `product_discount`, `image_url`) VALUES ('Aerox SteelSeries', '200', '15', 'accessories', '0', '/img/acc15.png');



