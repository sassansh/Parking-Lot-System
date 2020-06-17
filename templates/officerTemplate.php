<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Officers</h1>
    </div>
    <div style="display:flex">
        <form method="GET" action="officer.php">
            <button name="show" type="submit" id="show" class="btn btn-primary" value="allOfficers" style="margin-right: 20px;">Show All Officers</button>
        </form>
        <form method="GET" action="officer.php">
            <button name="show" type="submit" id="show" class="btn btn-secondary" value="allLotOfficers">Show Officers Patrolling All Lots</button>
        </form>
    </div>
    <br>
    <h5>Currently showing all Officers:</h5>
    <br>
    <div class="officer-table table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Officer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Shift</th>
                </tr>
            </thead>
            <?php foreach ($officers as $officer) : ?>
                <tr>
                    <td><?php echo $officer->Officer_ID; ?></td>
                    <td><?php echo $officer->First_Name; ?></td>
                    <td><?php echo $officer->Last_Name; ?></td>
                    <td><?php echo $officer->Shift; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>