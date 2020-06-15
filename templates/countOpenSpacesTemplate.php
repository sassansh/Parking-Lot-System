<?php print_r($openSpaces);?>

<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Select a Lot to Find Number of Empty Spaces</h2>
    <form method="post" action="countopenspaces.php">
        <div class="form-group">
            <label>Lot ID</label>
            <select name="Lot_ID" class="form-control">
                <option value="0">Select Lot</option>
                <?php foreach($parkingspaces as $parkingspace): ?>
                    <option name="lotID" value="<?php echo $parkingspace->Lot_ID; ?>" ><?php echo $parkingspace->Lot_ID; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        <input type="submit" name="show" class="btn btn-primary" value="Select Lot">
    </form>


    <div>
    <table class="table">
        <tr>
            <th>Open Spaces</th>
        </tr>
            <tr>
                <td><?php print_r($openSpaces); ?></td>
            </tr>
    </table>
</div>

<?php include 'inc/footer.php'; ?>


