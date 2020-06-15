<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Insert a Parking Space</h2>
    <form method="post" action="insertparkingspace.php">
        <div class="form-group">
            <label>Input Lot ID (LXXXX)</label>
            <input type="text" class="form-control" name="Lot_ID">
        </div>
        <div class="form-group">
            <label>Space Type</label>
            <select name="Space_Type" class="form-control">
                <option value="0">Choose Space Type </option>
                <option value="Small">Small</option>
                <option value="Handicap">Handicap</option>
                <option value="Charging">Charging</option>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Insert Parking Space">
    </form>


<?php include 'inc/footer.php'; ?>