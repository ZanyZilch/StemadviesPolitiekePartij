<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['partyID']) && isset($_POST['stellingID']) && isset($_POST['Xcoordinate']) && isset($_POST['Ycoordinate']) && isset($_POST['mening'])) {
    $partyID = $_POST['partyID'];
    $stellingID = $_POST['stellingID'];
    $Xcoordinate = $_POST['Xcoordinate'];
    $Ycoordinate = $_POST['Ycoordinate'];
    $mening = $_POST['mening'];

    // Construct the geometry string in the proper format
    $geometryString = "ST_GeomFromText('POINT($Xcoordinate $Ycoordinate)', 0)";

    // Prepare and execute the create query
    $createSql = "INSERT INTO `partij_stelling` (`idPartij`, `idStelling`, `standpunt`, `mening`) VALUES (:partyID, :stellingID, $geometryString, :mening)";
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
