<?php
$db = new SQLite3('mysqlitedb.db');
$db->exec('PRAGMA foreign_keys = ON;');

//$db->exec("CREATE TABLE product_category(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, priority INTEGER NOT NULL, parent_id INTEGER NOT NULL, memo TEXT)");

//$db->exec("CREATE TABLE spu(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT, info_list TEXT, category_id INTEGER, FOREIGN KEY(category_id) REFERENCES product_category(id) ON DELETE RESTRICT ON UPDATE RESTRICT)");

//$db->exec("CREATE TABLE sku(id INTEGER PRIMARY KEY AUTOINCREMENT, price INTEGER, stock INTEGER, info_1 TEXT, info_2 TEXT, info_3 TEXT, info_4 TEXT, info_5 TEXT, img Text, spu_id INTEGER, FOREIGN KEY(spu_id) REFERENCES spu(id) ON DELETE RESTRICT ON UPDATE RESTRICT)");

//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Fruit', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Cloth', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Pets', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Comsumer Electronics', '44', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Beauty', '100', '1')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Fruit', '77', '1')");


//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Phone', '4410', '4')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Laptop', '4420', '4')");
//$db->exec("INSERT INTO 'product_category' (`id`, `name`, `priority`, `parent_id`) VALUES (NULL, 'Network', '4430', '4')");

//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Xiaomi', 'Mi Laptop', '8')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Apple', 'Apple Laptop Macbook', '8')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Huawei', 'Huawei Laptop', '8')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Samsung', 'Samsung Laptop', '8')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Acer', 'Acer Laptop', '8')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Dell', 'Dell laptop', '8')");


//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Xiaomi', 'Mi Phone', '7')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Apple', 'Apple iPhone14', '7')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Huawei', 'Huawei Mate50', '7')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Samsung', 'Samsung Phone', '7')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'HTC', 'HTC Phone', '7')");
//$db->exec("INSERT INTO 'spu' (`id`, `name`, `description`,  'category_id') VALUES (NULL, 'Vivo', 'Vivo phone', '7')");

//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '4999', '10000', 'Red', '128GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '4999', '9000', 'Black', '128GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '4999', '8000', 'White', '128GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '5499', '11000', 'Red', '256GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '5499', '12000', 'Black', '256GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '5499', '13000', 'White', '256GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '6499', '7000', 'Red', '512GB', '9')");
//$db->exec("INSERT INTO 'sku' (`id`, `price`, `stock`, 'info_1', 'info_2', 'spu_id') VALUES (NULL, '6499', '6000', 'White', '512GB', '9')");

//$db->exec("INSERT INTO 'cart' (`id`, `cookie`) VALUES (NULL, '6d508e28489635393240fb5a9bb23e43')");

?>