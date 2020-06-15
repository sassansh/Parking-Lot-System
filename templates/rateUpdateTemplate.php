<?php include 'inc/header.php'; ?>
<form method="post" action="rateUpdate.php">
<div class="form-group">
        <label>Choose Rate Type</label>
        <select name="rateTypeChange" class="form-control">
            <option value="0"> </option>
            <option value="Charging">Charging</option>
            <option value="Handicap">Handicap</option>
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select>
    </div>
    <div class="form-group">
        <label>Hourly, Daily, or Monthly Price?</label>
        <select name="hdmRateChange" class="form-control">
            <option value="0"> </option>
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


<div class="all-rates-table">
    <table class="table">
        <tr>
            <th>Rate Type</th>
            <th>Hourly Rate</th>
            <th>Day Rate</th>
            <th>Monthly Rate</th>
        </tr>
        <?php foreach ($allRates as $rate) : ?>
            <tr>
                <td><?php echo $rate->Rate_Type; ?></td>
                <td><?php echo $rate->Hourly_Rate; ?></td>
                <td><?php echo $rate->Day_Rate; ?></td>
                <td><?php echo $rate->Monthly_Rate; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php include 'inc/footer.php'; ?>