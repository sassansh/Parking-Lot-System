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
                <option value="Space_Type">Small</option>
                <option value="Space_Type">Handicap</option>
                <option value="Space_Type">Charging</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Insert Parking Space</button>
    </form>


<?php include 'inc/footer.php'; ?>