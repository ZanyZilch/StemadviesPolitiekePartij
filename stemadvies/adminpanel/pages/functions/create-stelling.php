<?php
include("../../DBconfig.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST['stellingsInhoud'];
    echo $_POST['verticaalGewicht'];
    echo $_POST['horizontaalGewicht'];
    if (isset($_POST['stellingsInhoud']) && isset($_POST['verticaalGewicht']) && isset($_POST['horizontaalGewicht'])) {
        $stellingInhoud = $_POST['stellingsInhoud'];
        $stellingGewichtVerticaal = $_POST['verticaalGewicht'];
        $stellingGewichtHorizontaal = $_POST['horizontaalGewicht'];

        
        // Prepare and execute INSERT query for stelling
        $sql = "INSERT INTO stemadvies_stelling (StellingInhoud, StellingHorizontaal, StellingVerticaal) VALUES (?, ?, ?)";
        $stmt = $verbinding->prepare($sql);
        $stmt->bindParam(1, $stellingInhoud);
        $stmt->bindParam(2, $stellingGewichtHorizontaal);
        $stmt->bindParam(3, $stellingGewichtVerticaal);
        echo "inserted!";
        if ($stmt->execute()) {
            // Get the last inserted ID
            $lastInsertedStellingID = $verbinding->lastInsertId();

            // Fetch all Partij IDs
            $stmt_partij = $verbinding->query("SELECT PartijID FROM stemadvies_politiekepartij");
            $partijIDs = $stmt_partij->fetchAll(PDO::FETCH_COLUMN);

            // Prepare and execute INSERT query for each Partij in the linking table (politiekepartij_stelling)
            $sql_linking = "INSERT INTO stemadvies_politiekepartij_stelling (PartijKeuze, Stelling_StellingID, PolitiekePartij_PartijID) VALUES (?, ?, ?)";
            $stmt_linking = $verbinding->prepare($sql_linking);
            $partijKeuze = 1; // Assuming 1 is the default value

            foreach ($partijIDs as $partijID) {
                $stmt_linking->bindParam(1, $partijKeuze);
                $stmt_linking->bindParam(2, $lastInsertedStellingID);
                $stmt_linking->bindParam(3, $partijID);
                $stmt_linking->execute();
            }

        } else {
            echo "Error updating stelling";
        }
    } else {
        echo "One or more form fields are empty.";
    }
} else {
    echo "Form not submitted.";
}
?>