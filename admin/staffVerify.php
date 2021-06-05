<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>UMPVi - Staff Verification</title>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="backg"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Staff Verification</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="staffID"  aria-describedby="emailHelp" placeholder="Enter your ID">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="UserPass" id="exampleInputPassword" placeholder="Enter your password">
                    </div>
                    <input type="submit" value="Verify" class="btn btn-primary btn-user btn-block" name="verify">
                  
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>

<?php

$UserID = $_SESSION['UserID'];
$detail = $_SESSION['detail'];


if(isset($_POST['verify']))
{       
    $staffID = $_POST['staffID'];
    $UserPass = $_POST['UserPass'];
    

    include_once('../DBCon.php');

      $query = "SELECT * FROM user WHERE userMatricNum = '$staffID'";
      $result = mysqli_query($conn,$query);

      if (mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){

          $staffPass = $row["userPassword"];

          if($staffPass == $UserPass)
          {
            $query = "INSERT INTO trafficviolation VALUES(null,'$UserID', '$detail')";

            if (mysqli_query($conn, $query)) {
                  
            echo '<script>alert("Violation Registered")</script>';
            echo "<script type='text/javascript'> window.location='trafficViolation.php' </script>";
                  
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
    
            }
          }
          else{
            echo '<script>alert("Wrong Password")</script>';

          }
        

      }

      }
      else
      {
        echo '<script>alert("There is no staff with this ID")</script>';
      }
    

}



?>