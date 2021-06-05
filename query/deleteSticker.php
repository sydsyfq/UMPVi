<?php
if(isset($_POST['delete'])){

  if(isset($_POST['deleteData'])){
    foreach($_POST['deleteData'] as $deleteData){

      echo $deleteData;

      $deleteDB = "DELETE from sticker WHERE stickerID=".$deleteData;
      mysqli_query($conn,$deleteDB);
      if (mysqli_query($conn, $deleteDB)) {
        echo '<script language="javascript">';
        echo 'alert("Successfully Delete"); location.href="applySticker.php"';
        echo '</script>';
      } else {
        echo "Error: " . $deleteDB . "
        " . mysqli_error($conn);
      }
      
    }
  }
}
?>