<?php include 'inc/header.php'; ?>

<form method="GET" action="selectparkingspace.php">
<div class="form-group">
        <label>Choose Lot ID</label>
        <select name="lotID" class="form-control">
                <option value="0">Select Lot</option>
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="L4">L4</option>
                <option value="L5">L5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Choose Space_Type</label>
        <select name="rate" class="form-control">
            <option value="0">Select Space Type</option>
            <option value="Small">Small</option>
            <option value="Charging">Charging</option>
            <option value="Handicap">Handicap</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Find Spaces</button>
</form>
<form>



</form>
</div>

<div>
    <table class="table space-table">
        <tr>
            <th>Spaces</th>
            <th><?php echo str_replace('_', ' ', $spaceType) ; ?></th>
        </tr>
        <?php foreach ($parkingspaces as $parkingspace) : ?>
            <tr>
                <td><?php echo $parkingspace->Lot_ID; ?></td>
                <td><?php echo $parkingspace->Space_ID; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>