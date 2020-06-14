<?php include 'inc/header.php'; ?>

<div class="form-group">
    <form method="GET" action="rate.php">
        <select name="rate" class="form-control">
            <option value="0">Choose Rate</option>
            <option value="Hourly_Rate">Hourly Rate</option>
            <option value="Day_Rate">Day Rate</option>
            <option value="Monthly_Rate">Monthly Rate</option>
        </select>
        <input type="submit" class="btn btn-primary" value="Find Rate">
    </form>
</div>

<div class="rate-table">
    <table class="table">
        <tr>
            <th>Rate Type</th>
            <th><?php echo $rateType; ?></th>
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