<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lot Rates</h1>
    </div>
    <form method="GET" action="rate.php">
        <div class="form-group">
            <label>Choose Lot ID</label>
            <select name="lotID" class="form-control">
                <option value="">Choose a Lot</option>
                <?php foreach ($parkingLots as $lot) : ?>
                    <option value="<?php echo $lot->Lot_ID; ?>"><?php echo $lot->Lot_ID; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Choose Rate</label>
            <select name="rate" class="form-control">
                <option value="">Choose a Rate</option>
                <?php foreach ($allRateColumns as $rate) : ?>
                    <option value="<?php echo $rate->RateCat; ?>"><?php echo str_replace('_', ' ', $rate->RateCat); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Find Rates</button>
    </form>
    <br>
    <br>
    <?php if ($rateCategory && $lotID) : ?>
        <h2>
            Showing <?php echo str_replace('_', ' ', $rateCategory) . 's'; ?> in <?php echo str_replace('_', ' ', $lotID); ?>
        </h2>
        <div class="table-responsive">
            <table class="table rate-table table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Rate Type</th>
                        <th><?php echo str_replace('_', ' ', $rateCategory); ?></th>
                    </tr>
                </thead>
                <?php foreach ($selectedRates as $rate) : ?>
                    <tr>
                        <td><?php echo $rate->Rate_Type; ?></td>
                        <td>$<?php echo $rate->RateCat; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</main>
<?php include 'inc/footer.php'; ?>