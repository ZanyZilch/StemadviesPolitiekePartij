<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo $_POST['stellingID'];
    //echo $_POST['stellingsInhoud'];
    //echo $_POST['verticaalGewicht'];
    if (isset($_POST['stellingsInhoud']) && isset($_POST['verticaalGewicht']) && isset($_POST['horizontaalGewicht']) && isset($_POST['stellingID'])) {
        $stellingID = $_POST['stellingID'];
        $stellingInhoud = $_POST['stellingsInhoud'];
        $stellingGewichtVerticaal = $_POST['verticaalGewicht'];
        $stellingGewichtHorizontaal = $_POST['horizontaalGewicht'];

        $sql = "UPDATE stemadvies_stelling SET StellingInhoud = ?, StellingHorizontaal = ?, StellingVerticaal = ? WHERE stellingID = ?";
        $stmt = $verbinding->prepare($sql);
    
        $stmt->bindParam(1, $stellingInhoud);
        $stmt->bindParam(2, $stellingGewichtHorizontaal);
        $stmt->bindParam(3, $stellingGewichtVerticaal);
        $stmt->bindParam(4, $stellingID);
    
        if ($stmt->execute()) {
            echo "Succesfully editted!";
        } else {
            echo "Error updating stelling";
        }
    } else {
        echo "One or more form fields are empty.";
    }
}
?>
