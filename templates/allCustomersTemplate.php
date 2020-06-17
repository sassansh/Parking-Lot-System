<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Customers</h1>
    </div>
    <div class="customer-table table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>License Plate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer->Customer_ID; ?></td>
                    <td><?php echo $customer->License_Plate; ?></td>
                    <td>
                        <a class="btn btn-primary" href="customer.php?id=<?php echo $customer->Customer_ID; ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>