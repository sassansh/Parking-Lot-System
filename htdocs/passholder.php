<?php include_once 'config/init.php' ?>
<?php 
$passHolder = new PassHolder;

$template = new Template('templates/passHolderTemplate.php');
$template -> title = 'Pass Holders';

$template -> passHolders = $passHolder->getAllPassHolders();

echo $template;