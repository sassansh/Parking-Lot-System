<?php include_once 'config/init.php' ?>

<?php
$parkingspace = new ParkingSpace;
$template = new Template('templates/countOpenSpacesTemplate.php');
$template -> title = 'ParkingSpaces';

$template -> parkingspaces = $parkingspace->getAllDistinctLotIDs();

$template -> show = isset($_GET['show']) ? $_GET['show'] : null;
$lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;
$template -> openSpaces = $parkingspace->getAllOpenSpaces($lotID);

echo $template;



