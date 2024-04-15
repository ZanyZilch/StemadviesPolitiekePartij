<?php
include("../../DBconfig.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyId']) && isset($_POST['name'])) {
    $partyId = $_POST['partyId'];
    $name = $_POST['name'];
    
    $imageData = ''; 
    

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    }

    $updateSql = "UPDATE stemadvies_politiekepartij SET partijAfbeelding = :image, PartijNaam = :name WHERE PartijID = :partyId";
    $updateStmt = $verbinding->prepare($updateSql);
    $updateStmt->bindParam(':image', $imageData);
    $updateStmt->bindParam(':name', $name);
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
