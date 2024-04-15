<?php 
if (!defined('USER')) {
    include("../DBconfig.php");
}

try {
    $stmt = $verbinding->query("SELECT * FROM stemadvies_politiekepartij");
    
    if ($stmt->rowCount() > 0) {
        $partyResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "<tr><td colspan='4'>Geen partijen gevonden.</td></tr>";
    }
} catch(PDOException $e) {
    echo "Er is een fout opgetreden bij het ophalen van de partijgegevens: " . $e->getMessage();
}
?>

<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
        <?php
            // Fetch and display houses with the same user_ID
            $partySql = "SELECT PartijID, PartijNaam, partijAfbeelding  FROM stemadvies_politiekepartij";
            $partyStmt = $verbinding->prepare($partySql);
            $partyStmt->execute();
            $partyResult = $partyStmt->fetchAll();

            foreach ($partyResult as $row) {


                echo "<tr>";
                echo "<td style='display: none;'>" . $row['PartijID'] . "</td>";
                if (!empty($row['partijAfbeelding'])) {
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['partijAfbeelding']) . "' alt='Party Image' style='width: 100px; height: 100px;'></td>"; // Assuming the image data is stored as JPEG
                } else {
                    echo "<td></td>";
                }
                echo "<td>" . $row['PartijNaam'] . "</td>";
                echo "<td>";
                echo '<button type="button" class="btn btn-success editPartyBtn" style="margin-right: 5px;" data-id="'. $row['PartijID']  . '"><i class="fas fa-edit"></i>EDIT</button>';
                echo '<button type="button" class="btn btn-danger deletePartyBtn" data-id="'. $row['PartijID']  . '"><i class="fas fa-trash-alt"></i>DELETE</button>';
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
