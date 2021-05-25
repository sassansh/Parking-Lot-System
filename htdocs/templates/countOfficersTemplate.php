<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Officers on Patrol</h1>
    </div>
<form method="post" action="countofficers.php">
<div class="form-group">
            <label>Select Shift</label>
            <select name="Shift" class="form-control">
                <option value="0">Select Shift</option>
                <?php foreach ($officers1 as $officer) : ?>
                    <option value="<?php echo $officer->Shift; ?>"><?php echo str_replace('_', ' ', $officer->Shift); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <input type="submit" name="show" class="btn btn-primary" value="Show Count Of Officers">
</form>
<div class=officer-count>
    <p><?php if ($show == 'Show Count Of Officers') {
            echo '<br>There are currently <b>'.$officers->NumberOfOfficers.'</b> officers working the <b>'.$officers->Shift.'</b> shift.<b>';
            echo '<p style="font-size:70px">';
            for ($x = 0; $x < $officers->NumberOfOfficers; $x++) {
                echo '&#128110;&#8205;&#9794;&#65039';
              }
              echo '</p>';
        } ?></p>
</div>
</main>
<?php include 'inc/footer.php'; ?>
