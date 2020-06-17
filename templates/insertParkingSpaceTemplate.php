<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Insert New Parking Space</h1>
    </div>
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
                <?php foreach ($allRates as $rate) : ?>
                <option value="<?php echo $rate->Rate_Type; ?>"><?php echo $rate->Rate_Type; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Insert Parking Space">
    </form>
    <br>
    <div>
        <table class="table">
            <tr>
                <th>Lot ID</th>
                <th>Space ID</th>
                <th>Space Type</th>
            </tr>
            <?php foreach ($spaces2 as $parkingspace) : ?>
                <tr>
                    <td><?php echo $parkingspace->Lot_ID; ?></td>
                    <td><?php echo $parkingspace->Space_ID; ?></td>
                    <td><?php echo $parkingspace->Space_Type; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </main>

<?php include 'inc/footer.php'; ?>