<?php include_once 'config/init.php' ?>

<?php
$parkingspace = new ParkingSpace;
$rate = new Rate;
$template = new Template('templates/insertParkingSpaceTemplate.php');
$template -> title = 'ParkingSpaces';

if(isset($_POST['submit'])){
    
    //Create Array
    $data = array();
    $data['Lot_ID'] = $_POST['Lot_ID'];
    $data['Space_Type'] = $_POST['Space_Type'];

    if($parkingspace->insertSpace($data)){
        redirect('insertparkingspace.php', 'Space has been inserted', 'success');
    } else {
        redirect('insertparkingspace.php', 'Space has not been inserted', 'error' );
    }

}
$template -> allRates = $rate->getAllRates();
$template -> parkingspaces = $parkingspace->getAllDistinctLotIDs();
$template -> spacetypes = $parkingspace->getAllDistinctSpaceTypes();
$template -> spaces2 = $parkingspace->getAllSpaces();

echo $template;
