<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Parking Passes</h1>
    </div>
    <div class="parking-pass-table table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Parking Pass ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Issue Date</th>
                    <th>Expiry Date</th>
                    <th>Lot ID</th>
                    <th>Space ID</th>
                </tr>
            </thead>
            <?php foreach ($parkingPasses as $parkingPass) : ?>
                <tr>
                    <td><?php echo $parkingPass->Parking_Pass_ID; ?></td>
                    <td><?php echo $parkingPass->First_Name; ?></td>
                    <td><?php echo $parkingPass->Last_Name; ?></td>
                    <td><?php echo $parkingPass->Issue_Date_Time; ?></td>
                    <td><?php echo $parkingPass->Expiry_Date_Time; ?></td>
                    <td><?php echo $parkingPass->Lot_ID; ?></td>
                    <td><?php echo $parkingPass->Space_ID; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>