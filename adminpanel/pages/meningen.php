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
        <?php if (!empty($partyResult) && is_array($partyResult)): ?>
            <?php foreach ($partyResult as $row): ?>
                <tr>
                    <!-- Render table data -->
                    <!-- Example: -->
                    <td><?php echo isset($row['partij_naam']) ? $row['partij_naam'] : 'Niet beschikbaar'; ?></td>
                    <td><?php echo isset($row['stelling_inhoud']) ? $row['stelling_inhoud'] : 'Niet beschikbaar'; ?></td>
                    <td><?php echo isset($row['standpunt_X']) && isset($row['standpunt_Y']) ? $row['standpunt_X'] . ', ' . $row['standpunt_Y'] : 'Niet beschikbaar'; ?></td>
                    <td><?php echo isset($row['mening']) ? $row['mening'] : 'Niet beschikbaar'; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Geen gegevens gevonden</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
