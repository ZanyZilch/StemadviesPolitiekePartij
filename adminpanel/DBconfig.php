<?php
    define("DB_HOST", "localhost");
    define("DB_NAME", "klas4s21_553622");
    define("DB_USER", "klas4s21_553622");
    define("DB_PASSWORD", "V4Q1kg6e");
    define("DB_CHARSET", "utf8");
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try {
    $verbinding = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo $e->getMessage();
}
?>