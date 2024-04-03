<table class="table table-bordered table-striped table-hover table-light">
    <!-- Table header -->
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Inhoud</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <!-- Table body -->
    <tbody>
        <?php
            $partySql = "SELECT * FROM `stelling`";
            $partyStmt = $verbinding->prepare($partySql);
            $partyStmt->execute();
            $partyResult = $partyStmt->fetchAll();

            foreach ($partyResult as $row) {
                echo "<tr>";
                echo "<td>" . $row['idStelling'] . "</td>";
                echo "<td>" . $row['inhoud'] . "</td>";
                echo "<td>";
                echo '<button type="button" class="btn btn-success editStellingBtn" style="margin-right: 5px;" data-id="'. $row['idStelling']  . '"><i class="fas fa-edit"></i>EDIT</button>';
                echo '<button type="button" class="btn btn-danger deleteStellingBtn" data-id="'. $row['idStelling']  . '"><i class="fas fa-trash-alt"></i>DELETE</button>';
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
