<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Insert a Parking Space</h2>
    <form method="post" action="insertparkingspace.php">
        <div class="form-group">
            <label>Lot ID</label>
            <select name="Lot_ID" class="form-control" name=>
                <option value="0">Select Lot</option>
                <option value="L1">L1</option>
                <option value="L2">L2</option>
                <option value="L3">L3</option>
                <option value="L4">L4</option>
                <option value="L5">L5</option>
                </select>
        </div>
        <div class="form-group">
            <label>Space Type</label>
            <select name="Space_Type" class="form-control">
                <option value="0">Select Space Type </option>
                <option value="Small">Small</option>
                <option value="Handicap">Handicap</option>
                <option value="Charging">Charging</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Insert Parking Space</button>
    </form>


<?php include 'inc/footer.php'; ?>