<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rate Update</h1>
    </div>
<form method="post" action="rateUpdate.php">
<div class="form-group">
        <label>Choose Rate Type</label>
        <select name="rateTypeChange" class="form-control">
            <option value="0">Choose a Rate Type</option>
            <?php foreach ($allRates as $rate) : ?>
                <option value="<?php echo $rate->Rate_Type; ?>"><?php echo str_replace('_', ' ', $rate->Rate_Type) ; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Hourly, Daily, or Monthly Price?</label>
        <select name="hdmRateChange" class="form-control">
            <option value="0">Choose a Price Type</option>
            <option value="Hourly_Rate">Hourly Rate</option>
            <option value="Day_Rate">Day Rate</option>
            <option value="Monthly_Rate">Monthly Rate</option>
        </select>
    </div>
    <div>
        <label for="fname">New price:</label>
        <input type="text" id="newPrice" name="newPrice"><br><br>
    </div>
    <input name="update" type="submit" id="update" class="btn btn-primary" value="Update">
</form>

<br>
<div class="all-rates-table table-responsive">
        <table class="table table-striped table-sm">
            <thead>
        <tr>
            <th>Rate Type</th>
            <th>Hourly Rate</th>
            <th>Day Rate</th>
            <th>Monthly Rate</th>
        </tr>
            </thead>
        <?php foreach ($allRates as $rate) : ?>
            <tr>
                <td><?php echo $rate->Rate_Type; ?></td>
                <td>$<?php echo $rate->Hourly_Rate; ?></td>
                <td>$<?php echo $rate->Day_Rate; ?></td>
                <td>$<?php echo $rate->Monthly_Rate; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</main>
<?php include 'inc/footer.php'; ?>