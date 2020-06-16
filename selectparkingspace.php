<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$parkingspace = new ParkingSpace;
$template = new Template('templates/selectParkingSpaceTemplate.php');
$template -> title = 'Spaces';

$template -> allRates = $rate->getAllRates();
$template -> parkingspaces = $parkingspace->getAllDistinctLotIDs();
$template -> spacetypes = $parkingspace->getAllDistinctSpaceTypes();

$template -> lotID = isset($_POST['lotID']) ? $_POST['lotID'] : null;
$template -> spaceType = isset($_POST['spaceType']) ? $_POST['spaceType'] : null;
$template -> spaces2 = $parkingspace->getSpaceByLotidAndSpacetype($template->lotID, $template->spaceType);

echo $template;