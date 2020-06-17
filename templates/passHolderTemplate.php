<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pass Holders</h1>
    </div>
    <div class="parking-pass-table table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <?php foreach ($passHolders as $passHolder) : ?>
                <tr>
                    <td><?php echo $passHolder->Customer_ID; ?></td>
                    <td><?php echo $passHolder->First_Name; ?></td>
                    <td><?php echo $passHolder->Last_Name; ?></td>
                    <td><?php echo $passHolder->Phone_Number; ?></td>
                    <td><?php echo $passHolder->Address; ?></td>
                    <td><?php echo $passHolder->Email; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>