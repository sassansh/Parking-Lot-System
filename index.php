<?php
    include 'db_config/db_connect.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    CloseCon($conn);
?>