<?php
include("./conf/config.inc.php");
$patientID = $_SESSION['userID'];
$patres = $scad->getUserDetails($patientID);
echo json_encode($patres);
?>