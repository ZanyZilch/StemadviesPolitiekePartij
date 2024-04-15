<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $stellingId = $_POST['id'];

    // Prepare and execute the delete query
    $deleteSql = "DELETE FROM `stemadvies_stelling` WHERE `StellingID`  = :id";
    $deleteStmt = $verbinding->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $stellingId);
    $deleteStmt->execute();

    if ($deleteStmt->rowCount() > 0) {
        echo "Stelling deleted successfully";
    } else {
        echo "Failed to delete Stelling";
    }
} else {
    echo "Invalid request";
}
?>
