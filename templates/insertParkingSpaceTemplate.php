<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 class="page-header">Insert a Parking Space</h2>
    <form method="post" action="insertparkingspace.php">
        <div class="form-group">
            <label>Lot ID</label>
            <select name="Lot_ID" class="form-control">
                <option value="0">Select Lot</option>
                <?php foreach($parkingspaces as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Lot_ID; ?>" ><?php echo $parkingspace->Lot_ID; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        <div class="form-group">
            <label>Space Type</label>
            <select name="Space_Type" class="form-control">
                <option value="0">Select Space Type </option>
                <?php foreach($spacetypes as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Space_Type; ?>" ><?php echo $parkingspace->Space_Type; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Insert Parking Space">
    </form>
    </main>

<?php include 'inc/footer.php'; ?>