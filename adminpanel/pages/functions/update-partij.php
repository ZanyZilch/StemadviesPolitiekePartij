<?php
include("../../DBconfig.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyId']) && isset($_POST['name']) && isset($_POST['description'])) {

    $partyId = $_POST['partyId'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    $imageData = ''; 
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    }

    $updateSql = "UPDATE Partij SET image = :image, naam = :name, beschrijving = :description WHERE idPartij = :partyId";
    $updateStmt = $verbinding->prepare($updateSql);
    $updateStmt->bindParam(':image', $imageData);
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':description', $description);
    $updateStmt->bindParam(':partyId', $partyId);
    $updateStmt->execute();

    // Check if the update was successful
    if ($updateStmt->rowCount() > 0) {
        echo "Partij updated successfully";
    } else {
        echo "Failed to update Partij";
    }
} else {
    echo "Invalid request";
}
?>
