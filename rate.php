<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$template = new Template('templates/rateTemplate.php');
$template -> title = 'Rates';

$template -> rateType = isset($_GET['rate']) ? $_GET['rate'] : null;
$template -> rates = $rate->getRatesForLot('L3', $template->rateType);

echo $template;