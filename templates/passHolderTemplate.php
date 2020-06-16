<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pass Holders</h1>
    </div>
<div class="customer-table">
    <table class="table">
        <thead>
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Email</th>
            <th>Parking Pass ID</th>
            <th>Action</th>
        </tr>
</thead>
        <?php foreach ($passHolderPasses as $passHolder) : ?>
            <tr>
                <td><?php echo $passHolder->Customer_ID; ?></td>
                <td><?php echo $passHolder->First_Name; ?></td>
                <td><?php echo $passHolder->Last_Name; ?></td>
                <td><?php echo $passHolder->Phone_Number; ?></td>
                <td><?php echo $passHolder->Address; ?></td>
                <td><?php echo $passHolder->Email; ?></td>
                <td><?php echo $passHolder->Parking_Pass_ID; ?></td>
                <td>
                    <form style="display:inline;" method="post" action="passHolder.php">
                        <input type="hidden" name="del_id" value="<?php echo $passHolder->Customer_ID ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="parking-pass-table">
    <table class="table">
        <tr>
            <th>Parking Pass ID</th>
            <th>Issue Date</th>
            <th>Expiry Date</th>
            <th>Lot ID</th>
            <th>Space ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($parkingPasses as $parkingPass) : ?>
            <tr>
                <td><?php echo $parkingPass->Parking_Pass_ID; ?></td>
                <td><?php echo $parkingPass->Issue_Date_Time; ?></td>
                <td><?php echo $parkingPass->Expiry_Date_Time; ?></td>
                <td><?php echo $parkingPass->Lot_ID; ?></td>
                <td><?php echo $parkingPass->Space_ID; ?></td>
                <td>
                    <form style="display:inline;" method="post" action="passHolder.php">
                        <input type="hidden" name="del_id" value="<?php echo $parkingPass->Customer_ID ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
        </main>
<?php include 'inc/footer.php'; ?>