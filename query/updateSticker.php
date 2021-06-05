<?php

if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $vehicleBrandModel = $_POST['vehicleBrandModel'];
        $vehicleRegNum = $_POST['vehicleRegNum'];
        $vehicleColor = $_POST['vehicleColor'];
        $vehicleType = $_POST['vehicleType'];

        $query = "UPDATE sticker SET vehicleBrandModel='$vehicleBrandModel', vehicleRegNum='$vehicleRegNum', vehicleColor='$vehicleColor', vehicleType='$vehicleType' WHERE stickerID='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }

        $query = "SELECT * FROM sticker WHERE stickerID='$id'";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);

            $stickerID = $row['stickerID'];
            $userID = $_SESSION['user_id'];
            $content = "printSticker.php?id=".$row['stickerID'];

            $sql = "UPDATE `qrcode` SET `sticker_id`='$stickerID',`content`='$content',`userID`='$userID' WHERE sticker_id='$id'";
                if (mysqli_query($conn, $sql))
                {
                    echo '<script language="javascript">';
                    echo 'location.href="applySticker.php"';
                    echo '</script>';
                } else {
                echo "Error: " . $verified . "
                " . mysqli_error($conn);
                }
    }

?>