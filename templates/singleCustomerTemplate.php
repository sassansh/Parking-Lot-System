<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customer <?php echo $customer->Customer_ID; ?></h1>
    </div>
    <h3>License Plate: <?php echo $customer->License_Plate ?></h3>
    <?php if ($parkingPass && $passHolder) : ?>
        <br>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="assets/placeholder.jpg" alt="Parking Pass">
            <div class="card-body">
                <h5 class="card-title">Parking Pass ID # <?php echo $parkingPass->Parking_Pass_ID; ?></h5>
                <p class="card-text"><b><?php echo $passHolder->Last_Name . ', ' . $passHolder->First_Name; ?></b></p>
                <p class="card-text"><b>Lot ID: </b><?php echo $parkingPass->Lot_ID ?></p>
                <p class="card-text"><b>Space ID: </b> <?php echo $parkingPass->Space_ID ?></p>
                <p class="card-text"><b>Expiry Date: </b> <?php echo $parkingPass->Expiry_Date_Time ?></p>
                <form style="display:inline;" method="POST" action="customer.php">
                    <input type="hidden" name="pass_del_id" value="<?php echo $parkingPass->Parking_Pass_ID ?>">
                    <input type="hidden" name="id" value="<?php echo $customer->Customer_ID ?>">
                    <input type="submit" class="btn btn-danger" value="Delete Pass">
                </form>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($fines) : ?>
        <br>
        <br>
        <h2>Fines</h2>
        <div class="fine-table table-responsive">
            <table class="table customer-fine-table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Fine ID</th>
                        <th>Fine Type</th>
                        <th>Fine Cost</th>
                        <th>Date of Issue</th>
                    </tr>
                </thead>
                <?php foreach ($fines as $fine) : ?>
                    <tr>
                        <td><?php echo $fine->Fine_ID; ?></td>
                        <td><?php echo $fine->Fine_Type; ?></td>
                        <td>$<?php echo $fine->Cost; ?></td>
                        <td><?php echo $fine->Issue_Date_Time; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
    <br>
    <form style="display:inline;" method="POST" action="customer.php">
        <input type="hidden" name="cus_del_id" value="<?php echo $customer->Customer_ID ?>">
        <input type="submit" class="btn btn-danger" value="Delete Customer">
    </form>
</main>
<?php include 'inc/footer.php'; ?>