<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inhoud'])) {
    $inhoud = $_POST['inhoud'];

    // Prepare and execute the create query
    $createSql = "INSERT INTO `stelling` (`idStelling`, `inhoud`) VALUES (NULL, :inhoud)";
    $createStmt = $verbinding->prepare($createSql);
    $createStmt->bindParam(':inhoud', $inhoud);
    $createStmt->execute();

    if ($createStmt->rowCount() > 0) {
        echo "Stelling created successfully";
    } else {
        echo "Failed to create Stelling";
    }
} else {
    echo "Invalid request";
}
?>