<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">Partij</th>
            <th scope="col">Stelling</th>
            <th scope="col">Mening</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
    <?php
    $partySql = "SELECT sps.*, p.PartijNaam, s.StellingInhoud
    FROM stemadvies_politiekepartij_stelling sps
    INNER JOIN stemadvies_politiekepartij p ON sps.PolitiekePartij_PartijID = p.PartijID
    INNER JOIN stemadvies_stelling s ON sps.Stelling_StellingID = s.StellingID";

    $partyStmt = $verbinding->prepare($partySql);
    $partyStmt->execute();
    $partyResult = $partyStmt->fetchAll();

    foreach ($partyResult as $row) {
        echo "<tr>";
        echo "<td style='display: none;'>" . $row['PolitiekePartij_PartijID'] . "</td>";
        echo "<td style='display: none;'>" . $row['Stelling_StellingID'] . "</td>";
        echo "<td>" . $row['PartijNaam'] . "</td>";
        echo "<td>" . $row['StellingInhoud'] . "</td>";
        echo "<td>" . $row['PartijKeuze'] . "</td>";
        echo "<td>";
        echo '<button type="button" class="btn btn-success editMeningBtn" style="margin-right: 5px;" party-id="'. $row['PolitiekePartij_PartijID']  . '" stelling-id="'.  $row['PolitiekePartij_PartijID'] .'"><i class="fas fa-edit"></i>EDIT</button>';
        echo '<button type="button" class="btn btn-danger deleteMeningBtn" party-id="'. $row['PolitiekePartij_PartijID']  . '" stelling-id="'.  $row['PolitiekePartij_PartijID'] .'"><i class="fas fa-trash-alt"></i>DELETE</button>';
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
