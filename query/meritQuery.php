<?php

if(isset($_POST['award'])) {

	$userMatricNum = addslashes($_POST["userMatricNum"]);
	$meritObedientID = addslashes($_POST["meritObedientID"]);

	$sql = "INSERT INTO meritAward (userMatricNum,meritObedientID) VALUES ('$userMatricNum','$meritObedientID')";
		if (mysqli_query($conn, $sql)) 
		{
			echo '<script>alert("Merit Awarded!")</script>';
		}
	}

?>