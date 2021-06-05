<?php

session_start();
include_once('../DBCon.php');

if(isset($_GET['id'])){

$stickerID = $_GET['id'];
      $deleteDB = "DELETE from sticker WHERE stickerID=".$stickerID;
      mysqli_query($conn,$deleteDB);

      if (mysqli_query($conn, $deleteDB)) 
      {
        
        header('Location: ../admin/generatePrintSticker.php');
      } 
      else 
      {
        echo "Error: " . $deleteDB . "
        " . mysqli_error($conn);
      }

}
?>