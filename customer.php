<?php include_once 'config/init.php' ?>
<?php 
$customer = new Customer;
$passHolder = new PassHolder;
$parkingPass = new ParkingPass;
$fine = new Fine;

$template = new Template('templates/singleCustomerTemplate.php');
$template -> title = 'Single Customer';

$cid = isset($_GET['id']) ? $_GET['id'] : null;

$template -> customer = $customer->getCustomerByID($cid);
$template -> passHolder = $passHolder->getPassHolderByID($cid);
$template -> parkingPass = $parkingPass->getParkingPassByCustomerID($cid);
$template -> fines = $fine->getFinesByCustomerID($cid);

if(isset($_POST['pass_del_id'])) {
    $pass_del_id = $_POST['pass_del_id'];
    $id = $_POST['id'];
    if($parkingPass->delete($pass_del_id)) {
        redirect('customer.php?id='.$id, 'Parking Pass Deleted', 'success');
    } else {
        redirect('customer.php?id='.$id, 'Parking Pass Not Deleted', 'error');
    }
}

if(isset($_POST['cus_del_id'])) {
    $del_id = $_POST['cus_del_id'];
    if($customer->delete($del_id)) {
        redirect('customers.php', 'Customer Deleted', 'success');
    } else {
        redirect('customer.php?id='.$del_id, 'Customer Not Deleted', 'error');
    }
}

echo $template;