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
        <?php if (isset($partyResult) && is_array($partyResult)): ?>
            <?php foreach ($partyResult as $row): ?>
                <tr>
                    <!-- Render table data -->
                    <!-- Example: -->
                    <td><?php echo isset($row['idStelling']) ? $row['idStelling'] : 'Niet beschikbaar'; ?></td>
                    <td><?php echo isset($row['inhoud']) ? $row['inhoud'] : 'Niet beschikbaar'; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Geen gegevens gevonden</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
