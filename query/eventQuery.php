<?php

if(isset($_POST['addEvent'])) {

	$eventName = addslashes($_POST["eventName"]);
	$eventDate = addslashes($_POST["eventDate"]);
	$eventTimeStart = addslashes($_POST["eventTimeStart"]);
	$eventTimeEnd = addslashes($_POST["eventTimeEnd"]);

	$sql = "INSERT INTO event (eventName, eventDate, eventTimeStart, eventTimeEnd) VALUES ('$eventName', '$eventDate', '$eventTimeStart', '$eventTimeEnd')";
		if (mysqli_query($conn, $sql)) 
		{
			echo '<script>alert("Event Added!")</script>';
		}
	}

?>