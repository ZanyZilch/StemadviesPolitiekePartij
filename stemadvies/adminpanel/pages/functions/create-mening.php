<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyID']) && isset($_POST['stellingID']) && isset($_POST['mening'])) {
    $partyID = $_POST['partyID'];
    $stellingID = $_POST['stellingID'];
    $mening = $_POST['mening'];

    // Prepare and execute the create query
    $createSql = "INSERT INTO `stemadvies_politiekepartij_stelling` (`PolitiekePartij_PartijID`, `Stelling_StellingID`, `PartijKeuze`) VALUES (:partyID, :stellingID, :mening)";
    $createStmt = $verbinding->prepare($createSql);

    $createStmt->bindParam(':partyID', $partyID);
    $createStmt->bindParam(':stellingID', $stellingID);
    $createStmt->bindParam(':mening', $mening);
    $createStmt->execute();

    if ($createStmt->rowCount() > 0) {
        echo "Mening created successfully";
    } else {
        echo "Failed to create Mening";
    }
} else {
    echo "Invalid request";
}
?>
