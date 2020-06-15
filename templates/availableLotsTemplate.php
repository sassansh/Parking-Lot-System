<?php include 'inc/header.php'; ?>
<div class="lots-table">
    <table class="table">
        <tr>
            <th>Lot ID</th>
            <th>Address</th>
            <th>Available Spots</th>
        </tr>

        <?php foreach ($availableLots as $lot) : ?>
            <tr>
                <td><?php echo $lot->Lot_ID; ?></td>
                <td><?php echo $lot->Address; ?></td>
                <td><?php echo $lot->FreeSpaceCount; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>