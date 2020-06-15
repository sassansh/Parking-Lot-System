<?php include_once 'config/init.php' ?>

<?php 
$rate = new Rate;
$template = new Template('templates/rateTemplate.php');
$template -> title = 'Rates';

$template -> lotID = isset($_GET['lotID']) ? $_GET['lotID'] : null;
$template -> rateType = isset($_GET['rate']) ? $_GET['rate'] : null;
$template -> rates = $rate->getRatesForLot($template->lotID, $template->rateType);

echo $template;