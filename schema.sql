CREATE DATABASE factory_inventory;

CREATE TABLE users(
 id SMALLINT NOT NULL AUTO_INCREMENT, 
 username VARCHAR(100) NOT NULL, 
 pword VARCHAR(100) NOT NULL, 
 priveliges_id SMALLINT NOT NULL, 
 PRIMARY KEY(id) 
);

CREATE TABLE products(
 id INT NOT NULL AUTO_INCREMENT,
 product_name VARCHAR(100) NOT NULL,
 product_number INT NOT NULL, 
 description TEXT NOT NULL,
 cost_price DECIMAL NOT NULL,
 quantity_in_stock INT NOT NULL,
 PRIMARY KEY(id)
);

CREATE TABLE priveliges(
  id SMALLINT NOT NULL,
  priveliges_name VARCHAR(60) NOT NULL,
  PRIMARY KEY(id) 
);

INSERT INTO priveliges(id, priveliges_name) 
VALUES
(1, 'master'),
(2, 'view_only');

/* SET UP USERS - PASSWORDS WILL BE ENCRYPTED BY APP SET UP */

INSERT INTO users(username, pword, priveliges_id) VALUES('mainadmin', 'mA99fBBnDfeT4', '1');

INSERT INTO users(username, pword, priveliges_id) VALUES('user1', 'cBUoo958uFgT7', '2');