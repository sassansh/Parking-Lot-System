<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$parkingLot = new ParkingLot;
$template = new Template('templates/rateTemplate.php');
$template -> title = 'Lot Rates';

$template -> allRateColumns = $rate->getAllRateColumns();
$template -> parkingLots = $parkingLot->getParkingLots();
$template -> lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;
$template -> rateCategory = isset($_GET['rate']) ? $_GET['rate'] : null;
$template -> selectedRates = $rate->getRatesForLot($template->lotID, $template->rateCategory);

echo $template;