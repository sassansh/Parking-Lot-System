<?php include 'inc/header.php'; ?>
Hello, Officer!<br><br>
<form method="GET" action="fine.php">
<div class="form-group">
        <label>Please enter the License Plate to show all the fines for:</label>
        <input type="text" id="licensePlate" name="licensePlate"><br>
    </div>
    <button type="submit" class="btn btn-primary">Lookup Fines</button>
</form>
</div>
<br>
<?php 

if(strlen($licensePlate ) > 1){
    echo 'Here are the fines for <b>'.$licensePlate.'</b><br><br>';
}
?>



<div>
    <table class="table">
        <tr>
            <th>Fine ID</th>
            <th>Fine Type</th>
            <th>Fine Cost</th>
        </tr>
        <?php foreach ($fines as $fine) : ?>
            <tr>
                <td><?php echo $fine->Fine_ID; ?></td>
                <td><?php echo $fine->Fine_Type; ?></td>
                <td><?php echo $fine->Cost; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'inc/footer.php'; ?>