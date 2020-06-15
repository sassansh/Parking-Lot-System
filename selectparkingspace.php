<?php include_once 'config/init.php' ?>

<?php 
$parkingspace = new ParkingSpace;
$template = new Template('templates/selectParkingSpaceTemplate.php');
$template -> title = 'Spaces';

$template -> parkingspaces = $parkingspace->getAllDistinctLotIDs();
$template -> spacetypes = $parkingspace->getAllDistinctSpaceTypes();

$template -> lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;
$template -> spaceType = isset($_GET['spaceType']) ? $_GET['spaceType'] : null;
$template -> spaces2 = $parkingspace->getSpaceByLotidAndSpacetype($template->lotID, $template->spaceType);

echo $template;