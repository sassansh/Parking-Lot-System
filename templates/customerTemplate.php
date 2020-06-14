<?php include 'inc/header.php'; ?>
<div class="customer-table">
    <table class="table">
        <tr>
            <th>Customer ID</th>
            <th>License Plate</th>
            <th>Action</th>
        </tr>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer->Customer_ID; ?></td>
                <td><?php echo $customer->License_Plate; ?></td>
                <td>
                    <form style="display:inline;" method="post" action="customer.php">
                        <input type="hidden" name="del_id" value="<?php echo $customer->Customer_ID ?>">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>