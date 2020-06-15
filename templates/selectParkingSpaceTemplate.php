<?php include 'inc/header.php'; ?>

<form method="post" action="selectparkingspace.php">
<div class="form-group">
        <label>Choose Lot ID</label>
        <select name="lotID" class="form-control">
                <option value="0">Select Lot</option>
                <?php foreach($parkingspaces as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Lot_ID; ?>" ><?php echo str_replace('_', ' ', $parkingspace->Lot_ID); ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Choose Space_Type</label>
        <select name="spaceType" class="form-control">
            <option value="0">Select Space Type</option>
            <?php foreach($spacetypes as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Space_Type; ?>" ><?php echo str_replace('_', ' ', $parkingspace->Space_Type); ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <input type="submit" name = "submit" class="btn btn-primary" value = "Find Spaces">
</form>

<div>
    <table class="table">
        <tr>
            <th>Lot ID</th>
            <th>Space ID</th>
        </tr>
        <?php foreach ($spaces2 as $parkingspace) : ?>
            <tr>
                <td><?php echo $parkingspace->Lot_ID; ?></td>
                <td><?php echo $parkingspace->Space_ID; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>