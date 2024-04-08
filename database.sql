CREATE DATABASE IF NOT EXISTS php_projekt;
USE php_projekt;

-- Tabela products
CREATE TABLE IF NOT EXISTS products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL,
    product_quantity INT NOT NULL,
    product_category VARCHAR(50),
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
    user_token VARCHAR(255),
    user_token_expiry DATETIME
);

-- Tebala carts z relacją
CREATE TABLE IF NOT EXISTS carts (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL, FOREIGN KEY (user_id) REFERENCES users(user_id),
    user_cart TEXT
);

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');
INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_sold`, `product_discount`, `image_url`) VALUES (NULL, 'Papier', '100', '22', 'Akcesoria', 1, 0, 'https://wyposazeniesklepow.pl/userdata/public/gfx/2084/F-100x200.png');

