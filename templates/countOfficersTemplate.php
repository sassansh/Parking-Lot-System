<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<h2 class="page-header">Click Button to Show Count of All Officers</h2>
<form method="post" action="countofficers.php">
    <input type="submit" name="show" class="btn btn-primary" value="Show Count Of Officers">
</form>
<div class=officer-count>
    <p><?php if ($show == 'Show Count Of Officers') {
            echo $officers->NumberOfOfficers;
        } ?></p>
</div>
</main>
<?php include 'inc/footer.php'; ?>

<style>
.officer-count {
    text-decoration: underline;
    line-height: 1.6;
    font-style: italic;
    font-family: 'Roboto mono', monospace;
    font-size: 40px;
}
</style>