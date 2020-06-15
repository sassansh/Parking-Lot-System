<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$parkingLot = new ParkingLot;
$template = new Template('templates/rateTemplate.php');
$template -> title = 'Rates';

if(isset($_POST['update'])) {
    $rateTypeChange = $_POST['rateTypeChange'];
    $hdmRateChange = $_POST['hdmRateChange'];
    $newPrice = $_POST['newPrice'];
    if($rate->update($rateTypeChange, $hdmRateChange, $newPrice) == true) {
        redirect('rate.php', $rateTypeChange.'\'s '.str_replace('_', ' ', $hdmRateChange).' Updated to '.$newPrice, 'success');
    } else {
        redirect('rate.php', 'Rate Not Updated', 'error');
    }
}

$template -> allRates = $rate->getAllRates();

$template -> parkingLots = $parkingLot->getParkingLots();
$template -> lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;
$template -> rateType = isset($_GET['rate']) ? $_GET['rate'] : null;
$template -> selectedRates = $rate->getRatesForLot($template->lotID, $template->rateType);

echo $template;