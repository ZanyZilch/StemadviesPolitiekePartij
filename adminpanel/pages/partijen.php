<?php 
// Inclusief DBconfig.php alleen als het nog niet is ingesloten
if (!defined('USER')) {
    include("../DBconfig.php");
}

try {
    // Voorbereidde statement om partijgegevens op te halen
    $stmt = $verbinding->query("SELECT * FROM partij");
    
    // Controleer of er resultaten zijn
    if ($stmt->rowCount() > 0) {
        // Haal de gegevens op en wijs deze toe aan $partyResult
        $partyResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Toon een melding als er geen partijgegevens zijn gevonden
        echo "<tr><td colspan='4'>Geen partijen gevonden.</td></tr>";
    }
} catch(PDOException $e) {
    // Als er een fout optreedt bij het uitvoeren van de query, geef dan een foutmelding weer
    echo "Er is een fout opgetreden bij het ophalen van de partijgegevens: " . $e->getMessage();
}
?>

<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Richting</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
        <?php 
        // Controleer of $partyResult is ingesteld en niet leeg is
        if(isset($partyResult) && !empty($partyResult)) {
            // Loop door de partijgegevens en toon deze in de tabel
            foreach ($partyResult as $row): ?>
                <tr>
                    <!-- Render table data -->
                    <!-- Voorbeeld: -->
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['naam']; ?></td>
                    <!-- Voeg meer kolommen toe indien nodig -->
                </tr>
            <?php endforeach; 
        }
        ?>
    </tbody>
</table>
