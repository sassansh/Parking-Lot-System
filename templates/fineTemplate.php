<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Fine Lookup</h1>
    </div>

    <div class="form-group">
        <form method="GET" action="fine.php">
            <label>Please enter the License Plate to show all the fines for:</label>
            <input type="text" id="licensePlate" name="licensePlate">
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Lookup Fines</button>
        </form>
    </div>
    <br>
    <?php if ($licensePlate) : ?>
        <p>Here are the fines for <b><?php echo $licensePlate; ?></b></p>
        <br>    
        <div class="fine-table table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Fine ID</th>
                        <th>Fine Type</th>
                        <th>Fine Cost</th>
                    </tr>
                </thead>
                <?php foreach ($fines as $fine) : ?>
                    <tr>
                        <td><?php echo $fine->Fine_ID; ?></td>
                        <td><?php echo $fine->Fine_Type; ?></td>
                        <td>$<?php echo $fine->Cost; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</main>
<?php include 'inc/footer.php'; ?>