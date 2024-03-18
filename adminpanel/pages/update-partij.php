<?php
include("../DBconfig.php");

// Check if the request method is POST and if all required parameters are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyId']) && isset($_POST['image']) && isset($_POST['name']) && isset($_POST['description'])) {
    // Retrieve the data from the POST parameters
    $partyId = $_POST['partyId'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Prepare and execute the update query
    $updateSql = "UPDATE Partij SET image = :image, naam = :name, beschrijving = :description WHERE idPartij = :partyId";
    $updateStmt = $verbinding->prepare($updateSql);
    $updateStmt->bindParam(':image', $image);
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
    // If any required parameter is missing, return an error message
    echo "Invalid request";
}
?>
