<?php include 'inc/header.php'; ?>
<h1>Officers</h1>

<?php
if($show == 'allLotOfficers'){
    echo '<form method="GET" action="officer.php">
    <button name="show" type="submit" id="show" class="btn btn-secondary" value="allOfficers">Show All Officers</button>
</form>
<br>
<form method="GET" action="officer.php">
    <button name="show" type="submit" id="show" class="btn btn-primary" value="Show Officers Patrolling All Lots">Show Officers Patrolling All Lots</button>
</form>
<br>
<h5>Currently showing officers that patrol all lots:</h5>
<br>
';
} else {
    echo '<form method="GET" action="officer.php">
    <button name="show" type="submit" id="show" class="btn btn-primary" value="allOfficers">Show All Officers</button>
</form>
<br>
<form method="GET" action="officer.php">
<button name="show" type="submit" id="show" class="btn btn-secondary" value="allLotOfficers">Show Officers Patrolling All Lots</button>
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