<?php

if(isset($_POST['scan'])) {


    echo "<script type='text/javascript'> window.location='../QrScan/index.php' </script>";

	
	}

if(isset($_POST['penalty'])) {

	session_start();

	$userID = addslashes($_POST["userID"]);
	$penaltyID = addslashes($_POST["penaltyID"]);

	$_SESSION['UserID']=$userID;
    $_SESSION['detail']=$penaltyID;
    echo "<script type='text/javascript'> window.location='../admin/staffVerify.php' </script>";

	
	}

?>