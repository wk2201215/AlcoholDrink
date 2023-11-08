CREATE TABLE identifications(
    identification_id INT auto_increment,
    identification_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(identification_id)
);

CREATE TABLE customers(
    customer_id INT auto_increment,
    login_id VARCHAR(50) NOT NULL,
    customer_name VARCHAR(50) NOT NULL,
    customer_password VARCHAR(50) NOT NULL,
    postcode VARCHAR(7) NOT NULL,
    address VARCHAR(100) NOT NULL,
    telephone VARCHAR(16) NOT NULL,
    mail VARCHAR(50),
    birth DATE NOT NULL,
    identification_image VARCHAR(100) NOT NULL,
    identification_id INT,
    identification_detail VARCHAR(100),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    customer_payment VARCHAR(50),
    PRIMARY KEY(customer_id),
    FOREIGN KEY(identification_id) REFERENCES identifications(identification_id)
);

CREATE TABLE categories(
    category_id INT auto_increment,
    category_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(category_id)
);

CREATE TABLE products(
    product_id INT auto_increment,
    product_name VARCHAR(100) NOT NULL,
    category_id INT NOT NULL,
    price INT NOT NULL,
    stock INT DEFAULT 0 NOT NULL,
    image_pass VARCHAR(100),
    description VARCHAR(1023),
    PRIMARY KEY(product_id),
    FOREIGN KEY(category_id) REFERENCES categories(category_id)
);

CREATE TABLE orders(
    order_id INT auto_increment,
    customer_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    shipping_address VARCHAR(100) NOT NULL,
    payment VARCHAR(50) NOT NULL,
    PRIMARY KEY(order_id),
    FOREIGN KEY(customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE order_details(
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    PRIMARY KEY(order_id,product_id),
    FOREIGN KEY(order_id) REFERENCES orders(order_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id)
);

CREATE TABLE recipes(
    recipe_id INT auto_increment,
    recipe_name VARCHAR(50) NOT NULL,
    customer_id INT NOT NULL,
    recipe_created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    recipe_updated_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    cooking VARCHAR(200) NOT NULL,
    recipe_image_pass VARCHAR(100),
    PRIMARY KEY(recipe_id),
    FOREIGN KEY(customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE ingredients(
    recipe_id INT,
    ingredient_number INT,
    ingredient_name VARCHAR(50) NOT NULL,
    ingredient_quantity INT NOT NULL,
    PRIMARY KEY(recipe_id,ingredient_number),
    FOREIGN KEY(recipe_id) REFERENCES recipes(recipe_id)
);

CREATE TABLE carts(
    customer_id INT,
    product_id INT,
    cart_quantity INT NOT NULL,
    PRIMARY KEY(customer_id,product_id),
    FOREIGN KEY(customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id)
);

CREATE TABLE knowledge(
    knowledge_id INT auto_increment,
    knowledge_name VARCHAR(50) NOT NULL,
    knowledge_text VARCHAR(1023) NOT NULL,
    PRIMARY KEY(knowledge_id)
);

CREATE TABLE knowledge_products(
    knowledge_id INT,
    product_id INT,
    PRIMARY KEY(knowledge_id,product_id),
    FOREIGN KEY(knowledge_id) REFERENCES knowledge(knowledge_id),
    FOREIGN KEY(product_id) REFERENCES products(product_id)
);