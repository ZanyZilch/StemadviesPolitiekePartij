<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['description'])) {
    $image = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Prepare and execute the create query
    $createSql = "INSERT INTO partij (image, naam, beschrijving) VALUES (:image, :name, :description)";
    $createStmt = $verbinding->prepare($createSql);
    $createStmt->bindParam(':image', $image);
    $createStmt->bindParam(':name', $name);
    $createStmt->bindParam(':description', $description);
    $createStmt->execute();

    if ($createStmt->rowCount() > 0) {
        echo "Partij created successfully";
    } else {
        echo "Failed to create partij";
    }
} else {
    echo "Invalid request";
}
?>
