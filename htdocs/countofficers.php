<?php include_once 'config/init.php' ?>

<?php
$officer = new Officer;
$template = new Template('templates/countOfficersTemplate.php');
$template -> title = 'Officers';

$template -> officers1 = $officer->getShifts();

$template -> show = isset($_POST['show']) ? $_POST['show'] : null;

$template -> shift = isset($_POST['Shift']) ? $_POST['Shift'] : null;
$template -> officers = $officer->getCountOfOfficers($template->shift);

echo $template;



