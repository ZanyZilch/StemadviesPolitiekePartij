<?php
    define("DB_HOST", "localhost");
    define("DB_NAME", "klas4s21_553622");
    define("DB_USER", "klas4s21_553622");
    define("DB_PASSWORD", "V4Q1kg6e");
    define("DB_CHARSET", "utf8");   

try {
    $verbinding = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo $e->getMessage();
    echo "Couldn't make connection.";
}
?>