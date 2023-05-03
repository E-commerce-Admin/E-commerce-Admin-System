<?php
$db = new SQLite3('mysqlitedb.db');
$db->exec("CREATE TABLE user(id INTEGER PRIMARY KEY AUTOINCREMENT, first_name TEXT, last_name TEXT,email TEXT)");
?>