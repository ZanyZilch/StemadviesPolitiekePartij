<?php
include("../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idStelling']) && isset($_POST['inhoud'])) {
    $stellingId = $_POST['idStelling'];
    $inhoud = $_POST['inhoud'];

    // Prepare and execute the update query
    $updateSql = "UPDATE Stelling SET inhoud = :inhoud WHERE idStelling = :idStelling";
    $updateStmt = $verbinding->prepare($updateSql);
    $updateStmt->bindParam(':idStelling', $stellingId);
    $updateStmt->bindParam(':inhoud', $inhoud);
    $updateStmt->execute();

    if ($updateStmt->rowCount() > 0) {
        echo "Stelling updated successfully";
    } else {
        echo "Failed to update Stelling";
    }
} else {
    echo "Invalid request";
}
?>
