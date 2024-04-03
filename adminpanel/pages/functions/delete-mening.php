<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idParty']) && isset($_POST['idStelling'])) {
    $partyId = $_POST['idParty'];
    $stellingId = $_POST['idStelling'];
    // Prepare and execute the delete query
    $deleteSql = "DELETE FROM partij_stelling WHERE idPartij = :idPartij AND idStelling = :idStelling;";
    $deleteStmt = $verbinding->prepare($deleteSql);
    $deleteStmt->bindParam(':idPartij', $partyId);
    $deleteStmt->bindParam(':idStelling', $stellingId);
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
