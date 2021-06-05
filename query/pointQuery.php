<?php

if(isset($_POST['claim'])) {

	$result = mysqli_query($conn,"SELECT * FROM user WHERE username='" . $_POST["username"] . "' and userPassword = '". $_POST["userPassword"]."' and userType = 'Admin'");

	$row  = mysqli_fetch_array($result);
  	if(is_array($row)) {
    $eventID = addslashes($_POST["eventID"]);
    $userID = $_SESSION['user_id'];
	$pointAwardTotal = addslashes($_POST["pointAwardTotal"]);
	$sql = "INSERT INTO pointAward (eventID,pointAwardTotal,userID) VALUES ('$eventID','$pointAwardTotal','$userID')";

    if (mysqli_query($conn, $sql)) 
		{
			echo '<script>alert("Successfully Applied")</script>';
		}
	}
	else{
		echo '<script>alert("Wrong username or password")</script>';
	}
}