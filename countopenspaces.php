<?php include_once 'config/init.php' ?>

<?php
$parkingspace = new ParkingSpace;
$template = new Template('templates/countOpenSpacesTemplate.php');
$template -> title = 'ParkingSpaces';

$template -> parkingspaces = $parkingspace->getAllDistinctLotIDs();

$template -> show = isset($_GET['show']) ? $_GET['show'] : null;

$template -> lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;

if(($template -> show) == 'show'){
    $template -> openSpaces = $parkingspace->getAllOpenSpaces('L1');
} 


echo $template;



