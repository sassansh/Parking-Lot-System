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
            <option value="0">Choose a Lot</option>
            <?php foreach ($parkingLots as $lot) : ?>
                <option value="<?php echo $lot->Lot_ID; ?>"><?php echo $lot->Lot_ID; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Choose Rate</label>
        <select name="rate" class="form-control">
            <option value="0">Choose a Rate</option>
            <?php foreach ($allRates as $rate) : ?>
                <option value="<?php echo $rate->Rate_Type; ?>"><?php echo $rate->Rate_Type; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Find Rates</button>
</form>
<br>
<div>
    <table class="table rate-table">
        <tr>
            <th>Rate Type</th>
            <th><?php echo str_replace('_', ' ', $rateType) ; ?></th>
        </tr>
        <?php foreach ($selectedRates as $rate) : ?>
            <tr>
                <td><?php echo $rate->Rate_Type; ?></td>
                <td><?php echo $rate->Rate; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
        </main>
<?php include 'inc/footer.php'; ?>