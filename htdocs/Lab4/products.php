<?php
$db = new SQLite3('mysqlitedb.db');
$db->exec('PRAGMA foreign_keys = ON;');
//$db->exec("CREATE TABLE product_category(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, priority INTEGER NOT NULL, parent_id INTEGER NOT NULL, memo TEXT)");
//$db->exec("CREATE TABLE product(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT, price INTEGER, stock INTEGER, category_id INTEGER, FOREIGN KEY(category_id) REFERENCES product_category(id))");

//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Fruit', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Cloth', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Pets', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Comsumer Electronics', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Beauty', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Fruit', '77', '1')");

//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Apple', '7710', '6')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Pear', '7720', '6')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Grape', '7730', '6')");

//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Chardonnay', 'For White wine', '10', '1000', '9')");


//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Phone', '4410', '4')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Laptop', '4420', '4')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Network', '4430', '4')");

//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Xiaomi', 'Mi Laptop', '10', '1000', '11')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Apple', 'Apple Laptop Macbook', '10', '1000', '11')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Huawei', 'Huawei Laptop', '10', '1000', '11')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Samsung', 'Samsung Laptop', '10', '1000', '11')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Acer', 'Acer Laptop', '10', '1000', '11')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Dell', 'Dell laptop', '10', '1000', '11')");


//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'iRobot', 'Floor Cleaner', '100', '999', '4')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Samsung', 'Samsung Television', '100', '1999', '4')");
//$db->exec("INSERT INTO 'product' (`id`, `name`, `description`, `price`, 'stock', 'category_id') VALUES (NULL, 'Dell', '24inches Display', '100', '2999', '4')");

?>