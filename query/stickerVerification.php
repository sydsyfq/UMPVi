<?php 

if(isset($_POST['verify'])){

	$stickerID = addslashes($_POST["verify"]);

			$verified = "UPDATE sticker SET status='VERIFIED' WHERE stickerID=".$stickerID;
			mysqli_query($conn,$verified);
			if (mysqli_query($conn, $verified)) {
				echo '<script language="javascript">';
				echo 'alert("Verified");';
				echo '</script>';
			} else {
				echo "Error: " . $verified . "
				" . mysqli_error($conn);
			}
			
			$query = "SELECT * FROM sticker ORDER BY stickerID DESC LIMIT 1";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);

			$stickerID = $row['stickerID'];
			$userID = $_SESSION['user_id'];
			$content = "printSticker.php?id=".$row['stickerID'];

			$sql = "INSERT INTO `qrcode`(`sticker_id`, `content`, `userID`) VALUES ('$stickerID','$content','$userID')";
				if (mysqli_query($conn, $sql))
				{
					echo '<script language="javascript">';
					echo 'location.href="viewStickerApplication.php"';
					echo '</script>';
				} else {
				echo "Error: " . $verified . "
				" . mysqli_error($conn);
				}
			
		
	}

?>