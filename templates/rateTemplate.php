<?php include 'inc/header.php'; ?>
<div class="rate-table">
    <table class="table">
        <tr>
            <th>Rate Type</th>
            <th>Hourly Rate</th>
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