<?php include_once 'config/init.php' ?>

<?php
$officer = new Officer;
$template = new Template('templates/countOfficersTemplate.php');
$template -> title = 'Officers';

$template -> show = isset($_GET['show']) ? $_GET['show'] : null;
$template -> officers = $officer->getCountOfOfficers();

echo $template;



