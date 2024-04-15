<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $image = $_POST['image'];
    $name = $_POST['name'];

    // Prepare and execute the create query
    $createSql = "INSERT INTO stemadvies_politiekepartij (PartijNaam, partijAfbeelding) VALUES (:image, :name)";
    $createStmt = $verbinding->prepare($createSql);
    $createStmt->bindParam(':image', $image);
    $createStmt->bindParam(':name', $name);
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
