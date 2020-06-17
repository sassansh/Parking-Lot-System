<?php include_once 'config/init.php' ?>
<?php 
$customer = new Customer;

$template = new Template('templates/allCustomersTemplate.php');
$template -> title = 'Customers';

$template -> customers = $customer->getAllCustomers();

echo $template;