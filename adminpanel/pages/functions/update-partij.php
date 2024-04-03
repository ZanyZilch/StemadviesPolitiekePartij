<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyId']) && isset($_POST['image']) && isset($_POST['name']) && isset($_POST['description'])) {
    $partyId = $_POST['partyId'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $updateSql = "UPDATE Partij SET image = :image, naam = :name, beschrijving = :description WHERE idPartij = :partyId";
    $updateStmt = $verbinding->prepare($updateSql);
    $updateStmt->bindParam(':image', $image);
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':description', $description);
    $updateStmt->bindParam(':partyId', $partyId);
    $updateStmt->execute();

    if ($updateStmt->rowCount() > 0) {
        echo "Partij updated successfully";
    } else {
        echo "Failed to update Partij";
    }
} else {
    echo "Invalid request";
}
?>
