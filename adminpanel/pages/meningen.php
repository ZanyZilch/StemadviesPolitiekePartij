<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">Partij</th>
            <th scope="col">Stelling</th>
            <th scope="col">Standpunt</th>
            <th scope="col">Mening</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
    <?php
    $partySql = "SELECT 
                    ps.idPartij, 
                    ps.idStelling, 
                    ST_X(ps.standpunt) AS standpunt_X, 
                    ST_Y(ps.standpunt) AS standpunt_Y,
                    ps.mening, 
                    p.naam AS partij_naam, 
                    s.inhoud AS stelling_inhoud
                FROM 
                    partij_stelling AS ps
                INNER JOIN 
                    Partij AS p ON ps.idPartij = p.idPartij
                INNER JOIN 
                    Stelling AS s ON ps.idStelling = s.idStelling;";

    $partyStmt = $verbinding->prepare($partySql);
    $partyStmt->execute();
    $partyResult = $partyStmt->fetchAll();

    foreach ($partyResult as $row) {
        echo "<tr>";
        echo "<td style='display: none;'>" . $row['idPartij'] . "</td>";
        echo "<td style='display: none;'>" . $row['idStelling'] . "</td>";
        echo "<td>" . $row['partij_naam'] . "</td>";
        echo "<td>" . $row['stelling_inhoud'] . "</td>";

        // Determine standpunt_X description
        $standpunt_X_description = '';
        if ($row['standpunt_X'] > 5) {
            $standpunt_X_description = 'Sterk Eens';
        } elseif ($row['standpunt_X'] > 0) {
            $standpunt_X_description = 'Eens';
        } elseif ($row['standpunt_X'] < -5) {
            $standpunt_X_description = 'Sterk Oneens';
        } elseif ($row['standpunt_X'] < 0) {
            $standpunt_X_description = 'Oneens';
        }

        // Determine standpunt_Y description
        $standpunt_Y_description = '';
        if ($row['standpunt_Y'] > 5) {
            $standpunt_Y_description = 'Sterk Progressief';
        } elseif ($row['standpunt_Y'] > 0) {
            $standpunt_Y_description = 'Progressief';
        } elseif ($row['standpunt_Y'] < -5) {
            $standpunt_Y_description = 'Sterk Conversatief';
        } elseif ($row['standpunt_Y'] < 0) {
            $standpunt_Y_description = 'Conversatief';
            }

        echo "<td>" .$standpunt_X_description . ',' . $standpunt_Y_description  . "</td>";
        echo "<td>" . $row['mening'] . "</td>";
        echo "<td style='display: none;'>" . $row['standpunt_X'] . "</td>";
        echo "<td style='display: none;'>" . $row['standpunt_Y'] . "</td>";
        echo "<td>";
        echo '<button type="button" class="btn btn-success editMeningBtn" style="margin-right: 5px;" party-id="'. $row['idPartij']  . '" stelling-id="'.  $row['idStelling'] .'"><i class="fas fa-edit"></i>EDIT</button>';
        echo '<button type="button" class="btn btn-danger deleteMeningBtn" party-id="'. $row['idPartij']  . '" stelling-id="'.  $row['idStelling'] .'"><i class="fas fa-trash-alt"></i>DELETE</button>';
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
