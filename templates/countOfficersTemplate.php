<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Total Count of Officers</h1>
    </div>
<form method="post" action="countofficers.php">
    <input type="submit" name="show" class="btn btn-primary" value="Show Count Of Officers">
</form>
<div class=officer-count>
    <p><?php if ($show == 'Show Count Of Officers') {
            echo '<br>There are currently <b>'.$officers->NumberOfOfficers.'</b> employed officers across the parking lots!<br>';
            echo '<p style="font-size:70px">';
            for ($x = 0; $x < $officers->NumberOfOfficers; $x++) {
                echo '&#128110;&#8205;&#9794;&#65039';
              }
              echo '</p>';
        } ?></p>
</div>
</main>
<?php include 'inc/footer.php'; ?>

<!-- <style>
.officer-count {
    text-decoration: underline;
    line-height: 1.6;
    font-style: italic;
    font-family: 'Roboto mono', monospace;
    font-size: 40px;
}
</style> -->