<?php include_once 'config/init.php' ?>
<?php 
$passHolder = new PassHolder;
$parkingPass = new ParkingPass;

$template = new Template('templates/passHolderTemplate.php');
$template -> title = 'Pass Holders';

if(isset($_POST['del_id'])) {
    $del_id = $_POST['del_id'];
    if($passHolder->delete($del_id) == true) {
        redirect('passHolder.php', 'Pass Holder Deleted', 'success');
    } else {
        redirect('passHolder.php', 'Pass Holder Not Deleted', 'error');
    }
}

$template -> passHolderPasses = $passHolder->getAllPassHolderAndPasses();
$template -> parkingPasses = $parkingPass->getAllParkingPasses();

echo $template;