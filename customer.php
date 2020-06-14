<?php include_once 'config/init.php' ?>
<?php 
$customer = new Customer;

$template = new Template('templates/customerTemplate.php');
$template -> title = 'Customers';

if(isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    if($customer->delete($del_id) == true) {
        redirect('customer.php', 'Customer Deleted', 'success');
    } else {
        redirect('customer.php', 'Customer Not Deleted', 'error');
    }
}

$template -> customers = $customer->getAllCustomers();

echo $template;