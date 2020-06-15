<?php include 'inc/header.php'; ?>
<h1>Officers</h1>

<?php
if($show == 'Show Officers Patrolling All Lots'){
    echo '<form method="GET" action="officer.php">
    <input name="show" type="submit" id="show" class="btn btn-secondary" value="Show All Officers">
</form>
<br>
<form method="GET" action="officer.php">
    <input name="show" type="submit" id="show" class="btn btn-primary" value="Show Officers Patrolling All Lots">
</form>
<br>
<h5>Currently showing officers that patrol all lots:</h5>
<br>
';
} else {
    echo '<form method="GET" action="officer.php">
    <input name="show" type="submit" id="show" class="btn btn-primary" value="Show All Officers">
</form>
<br>
<form method="GET" action="officer.php">
    <input name="show" type="submit" id="show" class="btn btn-secondary" value="Show Officers Patrolling All Lots">
</form>
<br>
<h5>Currently showing all Officers:</h5>
<br>
';
}
?>



<div>
    <table class="table">
        <tr>
            <th>Officer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Shift</th>
        </tr>
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

<?php include 'inc/footer.php'; ?>