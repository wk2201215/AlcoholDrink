CREATE TABLE Identifications(
    identification_id INT auto_increment,
    identification_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(identification_id)
);

CREATE TABLE Payments(
    payment_id INT auto_increment,
    payment_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(payment_id)
);

CREATE TABLE Administrator(
    Administrator_id INT auto_increment,
    Administrator_name VARCHAR(50) NOT NULL,
    Administrator_password VARCHAR(200) NOT NULL,
    PRIMARY KEY(Administrator_id)
);

CREATE TABLE Customers(
    customer_id INT auto_increment,
    login_id VARCHAR(50) NOT NULL,
    customer_name VARCHAR(50) NOT NULL,
    customer_password VARCHAR(50) NOT NULL,
    postcode VARCHAR(7) NOT NULL,
    address VARCHAR(100) NOT NULL,
    telephone VARCHAR(16) NOT NULL,
    mail VARCHAR(50),
    birth DATE NOT NULL,
    identification_image_pass VARCHAR(100) NOT NULL,
    identification_id INT,
    identification_detail VARCHAR(100),
    created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    payment_id INT,
    delete_flag TINYINT DEFAULT 0,
    PRIMARY KEY(customer_id),
    FOREIGN KEY(identification_id) REFERENCES Identifications(identification_id),
    FOREIGN KEY(payment_id) REFERENCES Payments(payment_id)
);

CREATE TABLE Categories(
    category_id INT auto_increment,
    category_name VARCHAR(50) NOT NULL,
    PRIMARY KEY(category_id)
);

CREATE TABLE Products(
    product_id INT auto_increment,
    product_name VARCHAR(100) NOT NULL,
    category_id INT NOT NULL,
    price INT NOT NULL,
    stock INT DEFAULT 0 NOT NULL,
    image_pass VARCHAR(100),
    product_description VARCHAR(1023),
    PRIMARY KEY(product_id),
    FOREIGN KEY(category_id) REFERENCES Categories(category_id)
);

CREATE TABLE Orders(
    order_id INT auto_increment,
    customer_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    shipping_address VARCHAR(100) NOT NULL,
    payment VARCHAR(50) NOT NULL,
    PRIMARY KEY(order_id),
    FOREIGN KEY(customer_id) REFERENCES Customers(customer_id)
);

CREATE TABLE Order_details(
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    PRIMARY KEY(order_id,product_id),
    FOREIGN KEY(order_id) REFERENCES Orders(order_id),
    FOREIGN KEY(product_id) REFERENCES Products(product_id)
);

CREATE TABLE Recipes(
    recipe_id INT auto_increment,
    recipe_name VARCHAR(50) NOT NULL,
    customer_id INT NOT NULL,
    recipe_created_date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    recipe_updated_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    recipe_image_pass VARCHAR(100),
    recipe_description VARCHAR(1023),
    PRIMARY KEY(recipe_id),
    FOREIGN KEY(customer_id) REFERENCES Customers(customer_id)
);

CREATE TABLE Recipe_cooking(
    recipe_id INT,
    cooking_number INT,
    cooking_procedure VARCHAR(300) NOT NULL,
    PRIMARY KEY(recipe_id,cooking_number),
    FOREIGN KEY(recipe_id) REFERENCES Recipes(recipe_id)
);

CREATE TABLE Recipe_ingredients(
    recipe_id INT,
    ingredient_number INT,
    ingredient_name VARCHAR(50) NOT NULL,
    ingredient_quantity VARCHAR(50) NOT NULL,
    PRIMARY KEY(recipe_id,ingredient_number),
    FOREIGN KEY(recipe_id) REFERENCES Recipes(recipe_id)
);

CREATE TABLE Carts(
    customer_id INT,
    product_id INT,
    cart_quantity INT NOT NULL,
    PRIMARY KEY(customer_id,product_id),
    FOREIGN KEY(customer_id) REFERENCES Customers(customer_id),
    FOREIGN KEY(product_id) REFERENCES Products(product_id)
);

CREATE TABLE Knowledge(
    knowledge_id INT auto_increment,
    knowledge_name VARCHAR(50) NOT NULL,
    knowledge_text VARCHAR(1023) NOT NULL,
    PRIMARY KEY(knowledge_id)
);

CREATE TABLE Knowledge_products(
    knowledge_id INT,
    product_id INT,
    PRIMARY KEY(knowledge_id,product_id),
    FOREIGN KEY(knowledge_id) REFERENCES Knowledge(knowledge_id),
    FOREIGN KEY(product_id) REFERENCES Products(product_id)
);