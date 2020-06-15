<?php include 'inc/header.php'; ?>
    <h2 class="page-header">Select a Lot to Find Number of Empty Spaces</h2>
    <form method="GET" action="countopenspaces.php">
        <div class="form-group">
            <label>Lot ID</label>
            <select name="lotID" class="form-control">
                <option value="0">Select Lot</option>
                <?php foreach($parkingspaces as $parkingspace): ?>
                    <option value="<?php echo $parkingspace->Lot_ID; ?>" ><?php echo $parkingspace->Lot_ID; ?></option>
                <?php endforeach; ?>
                </select>
        </div>
        <input type="submit" name="show" class="btn btn-primary" value="Show Empty Spaces">
    </form>
    <div class=open-spaces>
    <p><?php if($show == 'Show Empty Spaces') {
    echo $openSpaces->NumberOfOpenSpots;
} ?></p>
    </div>
    
<?php include 'inc/footer.php'; ?>