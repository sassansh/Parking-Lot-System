<?php include_once 'config/init.php' ?>

<?php $template = new Template('templates/rateTemplate.php');
$template -> title = 'Rates';

$rate = new Rate;

$template -> rates = $rate->getRatesForLot('L3', 'Day_Rate');

echo $template;