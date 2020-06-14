<?php include_once 'config/init.php' ?>
<?php 
$customer = new Customer;
$parkingPass = new ParkingPass;

$template = new Template('templates/customer-pp.php');
$template -> title = 'ParkingPass';

if(isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    if($customer->delete($del_id)) {
        redirect('customer.php', 'Customer Deleted', 'success');
    } else {
        redirect('customer.php', 'Customer Not Deleted', 'error');
    }

}


$template -> parkingPasses = $parkingPass->getAllParkingPasses();
$template -> customers = $customer->getAllCustomers();

echo $template;