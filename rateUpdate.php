<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$template = new Template('templates/rateUpdateTemplate.php');
$template -> title = 'Rate Update';

if(isset($_POST['update'])) {
    $rateTypeChange = $_POST['rateTypeChange'];
    $hdmRateChange = $_POST['hdmRateChange'];
    $newPrice = $_POST['newPrice'];
    if($rate->update($rateTypeChange, $hdmRateChange, $newPrice) == true) {
        redirect('rateUpdate.php', $rateTypeChange.'\'s '.str_replace('_', ' ', $hdmRateChange).' Updated to $'.$newPrice, 'success');
    } else {
        redirect('rateUpdate.php', 'Rate Not Updated', 'error');
    }
}

$template -> allRates = $rate->getAllRates();

echo $template;