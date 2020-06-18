<?php include_once 'config/init.php' ?>
<?php 
$parkingPass = new ParkingPass;

$template = new Template('templates/parkingPassTemplate.php');
$template -> title = 'Parking Pass';

$template -> parkingPasses = $parkingPass->getAllParkingPassesAndLinkedPassHolder();

echo $template;