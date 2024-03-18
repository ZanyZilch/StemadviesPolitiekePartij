<?php
include("../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $partyId = $_POST['id'];

    // Prepare and execute the delete query
    $deleteSql = "DELETE FROM partij_stelling WHERE idpartij_stelling = :id";
    $deleteStmt = $verbinding->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $partyId);
    $deleteStmt->execute();

    if ($deleteStmt->rowCount() > 0) {
        echo "Mening deleted successfully";
    } else {
        echo "Failed to delete Mening";
    }
} else {
    echo "Invalid request";
}
?>
