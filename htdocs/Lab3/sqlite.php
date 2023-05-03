<?php
$db = new SQLite3('mysqlitedb.db');
$db->exec("CREATE TABLE product_category(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, priority INTEGER NOT NULL, parent_id INTEGER NOT NULL, memo TEXT)");
$db->exec("CREATE TABLE product(id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT, price INTEGER, stock INTEGER, category_id INTEGER, FOREIGN KEY(category_id) REFERENCES product_category(id)) ON DELETE RESTRICT ON UPDATE RESTRICT");
?>