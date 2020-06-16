<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Available Spots by Lot</h1>
    </div>
    <div class="lots-table table-responsive">
        <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>Lot ID</th>
            <th>Address</th>
            <th>Available Spots</th>
        </tr>
</thead>

        <?php foreach ($availableLots as $lot) : ?>
            <tr>
                <td><?php echo $lot->Lot_ID; ?></td>
                <td><?php echo $lot->Address; ?></td>
                <td><?php echo $lot->FreeSpaceCount; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
        </main>
<?php include 'inc/footer.php'; ?>