<?php include_once 'config/init.php' ?>
<?php 
$parkingLot = new ParkingLot;

$template = new Template('templates/availableLotsTemplate.php');
$template -> title = 'Available Lots';

$template -> availableLots = $parkingLot->findAvailableLots();

echo $template;