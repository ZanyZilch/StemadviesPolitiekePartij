<?php
// DEFINE("USER", "root");
// DEFINE("PASSWORD", "AlXCUiOd");
// try {
//     $verbinding = new PDO("mysql:host=localhost;dbname=klas4s21_541776", USER, PASSWORD);
//     $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }catch(PDOException $e) {
//     echo $e->getMessage();
//     echo "Couldn't make connection.";
// }
?>

<?php
    define("DB_HOST", "localhost");
    define("DB_NAME", "klas4s21_541776");
    define("DB_USER", "klas4s21_541776");
    define("DB_PASSWORD", "AlXCUiOd");
    define("DB_CHARSET", "utf8");

try {
    $verbinding = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $verbinding->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo $e->getMessage();
    echo "Couldn't make connection.";
}
?>