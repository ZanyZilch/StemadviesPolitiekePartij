<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idPartij']) && isset($_POST['idStelling'])) {
    $partyId = $_POST['idPartij'];
    $stellingId = $_POST['idStelling'];
    $standpuntXY = $_POST['standpunt'];
    $mening = $_POST['mening'];

    list($x, $y) = explode(",", $standpuntXY);

    $geometryString = "ST_GeomFromText('POINT($x $y)', 0)";

    $updateSql = "UPDATE partij_stelling SET standpunt = $geometryString, mening = :mening WHERE idPartij = :idPartij AND idStelling = :idStelling;";
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
} else {
    echo "Invalid request";
}
?>
