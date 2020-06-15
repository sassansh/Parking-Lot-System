<?php include_once 'config/init.php' ?>

<?php 
$officer = new Officer;
$template = new Template('templates/officerTemplate.php');
$template -> title = 'Officers';

$template -> show = isset($_GET['show']) ? $_GET['show'] : null;


if(($template -> show) == 'allLotOfficers'){
    $template -> officers = $officer->getAllOfficersPatrollingAllLots();
} else {
    $template -> officers = $officer->getAllOfficers();
}

echo $template;