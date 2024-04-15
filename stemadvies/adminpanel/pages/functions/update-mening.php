<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idPartij']) && isset($_POST['idStelling'])) {
    var_dump($_POST);
    $partyId = $_POST['idPartij'];
    $stellingId = $_POST['idStelling'];
    $mening = $_POST['mening'];

    try {
        $updateSql = "UPDATE `stemadvies_politiekepartij_stelling`
                        SET `PartijKeuze` = :mening
                        WHERE `PolitiekePartij_PartijID` = :idPartij AND `Stelling_StellingID` = :idStelling";
        $updateStmt = $verbinding->prepare($updateSql);
        $updateStmt->bindParam(':idPartij', $partyId);
        $updateStmt->bindParam(':idStelling', $stellingId);
        $updateStmt->bindParam(':mening', $mening);
        $updateStmt->execute();

        if ($updateStmt->rowCount() > 0) {
            echo "Mening updated successfully";
        } else {
            echo "Failed to update Mening";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        // Log the error
        error_log("Database error: " . $e->getMessage(), 0);
    }
} else {
    echo "Invalid request";
}
?>
