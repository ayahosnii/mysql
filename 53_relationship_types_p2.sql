use store;
CREATE TABLE products(
                         product_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                         product_name VARCHAR(50) NOT NULL ,
                         product_price DECIMAL(6, 2) NOT NULL ,
                         product_quantity SMALLINT(3) NOT NULL,
                         product_created DATE NOT NULL
);

SHOW TABLES ;

CREATE TABLE product_orders(
                               order_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                               customer_id INT UNSIGNED NOT NULL ,
                               order_timestamp DATETIME NOT NULL,
                               CONSTRAINT fk_customer_id FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE products_orders_list (
                                      item_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
                                      order_id INT UNSIGNED NOT NULL ,
                                      product_id INT UNSIGNED NOT NULL ,
                                      quantity TINYINT(2) NOT NULL
);

