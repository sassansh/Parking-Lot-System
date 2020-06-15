<?php include_once 'config/init.php' ?>

<?php 
$parkingspace = new ParkingSpace;
$template = new Template('templates/selectParkingSpaceTemplate.php');
$template -> title = 'Spaces';

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

echo $template;