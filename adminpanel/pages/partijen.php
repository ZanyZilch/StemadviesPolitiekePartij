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
            // Fetch and display houses with the same user_ID
            $partySql = "SELECT idPartij, naam, beschrijving, image, ST_X(positie) AS latitude, ST_Y(positie) AS longitude FROM partij";
            $partyStmt = $verbinding->prepare($partySql);
            $partyStmt->execute();
            $partyResult = $partyStmt->fetchAll();

            foreach ($partyResult as $row) {
                // Determine the label for latitude
                $latitudeLabel = $row['latitude'] < 0 ? "Links" : "Rechts";

                // Determine the label for longitude
                $longitudeLabel = $row['longitude'] < 0 ? "Progressief" : "Conversatief";

                if($row['latitude'] == 0){
                    $latitudeLabel = "Midden";
                }

                if($row['longitude'] == 0){
                    $longitudeLabel = "Midden";
                }

                echo "<tr>";
                echo "<td style='display: none;'>" . $row['idPartij'] . "</td>";
                if (!empty($row['image'])) {
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Party Image' style='width: 100px; height: 100px;'></td>"; // Assuming the image data is stored as JPEG
                } else {
                    echo "<td></td>";
                }
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td style='display: none;'>" . $row['beschrijving'] . "</td>";
                echo "<td>" . $latitudeLabel . ", " . $longitudeLabel . "</td>";
                echo "<td>";
                echo '<button type="button" class="btn btn-success editPartyBtn" style="margin-right: 5px;" data-id="'. $row['idPartij']  . '"><i class="fas fa-edit"></i>EDIT</button>';
                echo '<button type="button" class="btn btn-danger deletePartyBtn" data-id="'. $row['idPartij']  . '"><i class="fas fa-trash-alt"></i>DELETE</button>';
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
