<?php include 'inc/header.php'; ?>

<form method="GET" action="selectparkingspace.php">
<div class="form-group">
        <label>Choose Lot ID</label>
        <select name="lotID" class="form-control">
                <option value="0">Select Lot</option>
                <?php foreach($parkingspaces as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Lot_ID; ?>" ><?php echo $parkingspace->Lot_ID; ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Choose Space_Type</label>
        <select name="rate" class="form-control">
            <option value="0">Select Space Type</option>
            <?php foreach($spacetypes as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Space_Type; ?>" ><?php echo $parkingspace->Space_Type; ?></option>
                <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Find Spaces</button>
</form>

<div class="all-spaces-table">
    <table class="table">
        <tr>
            <th>Lot_ID</th>
            <th>Space_ID</th>
        </tr>
        <?php foreach ($spaces as $parkingspace) : ?>
            <tr>
                <td><?php echo $parkingspace->Lot_ID; ?></td>
                <td><?php echo $parkingspace->Space_ID; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>