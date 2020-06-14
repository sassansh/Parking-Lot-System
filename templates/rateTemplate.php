<?php include 'inc/header.php'; ?>

<form method="GET" action="rate.php">
<div class="form-group">
        <label>Choose Lot ID</label>
        <select name="lotID" class="form-control">
            <option value="0"> </option>
            <option value="L3">L3</option>
        </select>
    </div>
    <div class="form-group">
        <label>Choose Rate</label>
        <select name="rate" class="form-control">
            <option value="0"> </option>
            <option value="Hourly_Rate">Hourly Rate</option>
            <option value="Day_Rate">Day Rate</option>
            <option value="Monthly_Rate">Monthly Rate</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Find Rates</button>
</form>
<form>



</form>
</div>

<div>
    <table class="table rate-table">
        <tr>
            <th>Rate Type</th>
            <th><?php echo str_replace('_', ' ', $rateType) ; ?></th>
        </tr>
        <?php foreach ($rates as $rate) : ?>
            <tr>
                <td><?php echo $rate->Rate_Type; ?></td>
                <td><?php echo $rate->Rate; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>