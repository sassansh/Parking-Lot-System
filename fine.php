<?php include_once 'config/init.php' ?>

<?php 
$fine = new Fine;
$template = new Template('templates/fineTemplate.php');
$template -> title = 'Fines';

$template -> licensePlate = isset($_GET['licensePlate']) ? $_GET['licensePlate'] : null;
$template -> fines = $fine->getFinesForPlate($template->licensePlate);

echo $template;