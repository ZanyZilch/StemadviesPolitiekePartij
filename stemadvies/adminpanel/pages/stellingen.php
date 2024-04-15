<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Inhoud</th>
            <th scope="col">Actions</th>
            <th scope="col">Y</th>
            <th scope="col">X</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
        <?php
            $partySql = "SELECT * FROM `stemadvies_stelling`";
            $partyStmt = $verbinding->prepare($partySql);
            $partyStmt->execute();
            $partyResult = $partyStmt->fetchAll();

            foreach ($partyResult as $row) {
                echo "<tr>";
                echo "<td>" . $row['StellingID'] . "</td>";
                echo "<td>" . $row['StellingInhoud'] . "</td>";
                echo "<td>";
                echo '<button type="button" class="btn btn-success editStellingBtn" style="margin-right: 5px;" data-id="'. $row['StellingID']  . '"><i class="fas fa-edit"></i>EDIT</button>';
                echo '<button type="button" class="btn btn-danger deleteStellingBtn" data-id="'. $row['StellingID']  . '"><i class="fas fa-trash-alt"></i>DELETE</button>';
                echo '<td>'. $row['StellingHorizontaal'] .'</td>';
                echo '<td>'. $row['StellingVerticaal'] .'</td>';
                echo "</td>";
                echo "</tr>";
                
            }
        ?>
    </tbody>
</table>
