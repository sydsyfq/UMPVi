<?php
session_start();
ob_start();
include_once('DBCon.php');
include_once('query/applyStickerQuery.php');
include_once('query/deleteSticker.php');
include_once('query/updateSticker.php');

$userIDSession = $_SESSION["user_id"];

$query = "SELECT * FROM sticker WHERE userID = $userIDSession";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UMPVi - Apply Sticker</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="report.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UMPVi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="applySticker.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="applySticker.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Apply Sticker</span></a>
      </li>

  <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="viewMerit.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Merit</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="point.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Claim Point</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="event.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Event</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"];?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Apply Sticker</h1>

            <table>
              
            </table>
           
          </div> 

      <!-- End of Main Content -->

      <form action="" method="POST" enctype="multipart/form-data">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <input type="text" name="userID" value="$_SESSION['user_id']>" hidden="hidden">
            <th scope="col">Vehicle Brand and Model: </th>
            <td><input style="width: 500px;" type="text" name="vehicleBrandModel" required="required" placeholder="Eg: Proton X70"></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Vehicle Registration Number: </th>
            <td><input style="text-transform:uppercase; width: 500px;" on keyup="javascript:this.value=this.value.toUpperCase();"type="text" name="vehicleRegNum" required="required" placeholder="Eg: VAR 4224"></td>
          </tr>
          <tr>
            <th scope="row">Vehicle Colour: </th>
            <td><input style="width: 500px;" type="text" name="vehicleColor" required="required" placeholder="Eg: Black";"></td>
          </tr>
          <tr>
            <th scope="row">Vehicle Type: </th>
            <td>
              <select name="vehicleType" id="vehicleType" required="required" style="width: 500px;">
                <option value="" selected="selected" disabled="disabled">Select Type</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Car">Car</option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row">Vehicle Grant (.jpg / .jpeg / .png file only): </th>
            <td><input style="width: 500px;" type="file" name="vehicleGrant" id="file" required="required" onchange="return fileValidation()"></td>
          </tr>
          <tr>
            <th scope="row" colspan="2">
              <button type="submit" name="applySticker" class="btn btn-primary">Apply Sticker</button>
            </th>
          </tr>
        </tbody>
      </table>
    </form>

    <center>
      <form action="" method="POST">
        <table class="table table-striped table-bordered" style="text-align: center;">
          <thead>
            <tr>
              <td colspan="9">Sticker Application</td>
            </tr>
            <tr>
              <th scope="col">Number</th>
              <th scope="col">Vehicle Name</th>
              <th scope="col">Registration Number</th>
              <th scope="col">Vehicle Color</th>
              <th scope="col">Vehicle Type</th>
              <th scope="col">Status</th>
              <th scope="col">Vehicle Grant</th>
              <th scope="col">Delete</th>
              <th scope="col">Edit</th>
            </tr>
          </thead>
          <tbody>
            <?php if (mysqli_num_rows($result) > 0){
              $i = 1;
              while($row = mysqli_fetch_assoc($result)){
                $vehicleGrant = $row["vehicleGrant"]; 
                $stickerID = $row["stickerID"];
                ?>
                <tr stickerID='tr_<?= $stickerID ?>'>
                  <td scope="row"><?php echo $i; ?></td>
                  <td scope="row" hidden="hidden"><?php echo $row['stickerID']; ?></td>
                  <td scope="row"><?php echo $row['vehicleBrandModel']; ?></td>
                  <td scope="row"><?php echo $row['vehicleRegNum']; ?></td>
                  <td scope="row"><?php echo $row['vehicleColor']; ?></td>
                  <td scope="row"><?php echo $row['vehicleType']; ?></td>
                  <?php if ($row['status'] === 'NOT VERIFIED') { ?>
                  <td scope="row"><span class="badge badge-primary"><?php echo $row['status']; ?></span></td>
                  <?php } else { ?>
                  <td scope="row"><span class="badge badge-success"><?php echo $row['status']; ?></span></td>
                  <?php } ?>
                  <td scope="row"><img width="200px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($vehicleGrant); ?>"/></td>
                  <?php if ($row['status'] === 'NOT VERIFIED') { ?>
                  <td scope="row"><input type='checkbox' name='deleteData[]' value='<?= $stickerID ?>'></td>
                  <td><button type="button" class="btn btn-success editbtn"> EDIT </button></td>
                  <?php } else { ?>
                  <td scope="row"><input type='checkbox' name='deleteData[]' value='<?= $stickerID ?>' disabled="disabled"></td>
                  <td><button type="button" class="btn btn-success editbtn" disabled="disabled"> EDIT </button></td>
                  <?php } ?>                  
                </tr>
              <?php $i++;}}else{?>
                <tr>
                  <td scope="row" colspan="9">No sticker application yet</td>
                </tr>
              <?php } ?>
                <tr>
                <th scope="row" colspan="9">
                  <button type="submit" name="delete" class="btn btn-danger">Delete Row(s)</button>
                </th>
              </tr>
            </tbody>
          </table>
        </form>
      </center>

      <!-- ####################################### EDIT POP UP ##################################################### -->

      <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Edit Sticker Application </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="" method="POST">

            <div class="modal-body">

                <input hidden type="text" name="update_id" id="update_id">

                <div class="form-group">
                    <label> Vehicle Brand and Model</label>
                    <input type="text" name="vehicleBrandModel" id="vehicleBrandModel" class="form-control" placeholder="Enter Vehicle Brand and Model" required="required">
                </div>

                <div class="form-group">
                    <label> Vehicle Registration Number </label>
                    <input type="text" name="vehicleRegNum" id="vehicleRegNum" class="form-control" placeholder="Enter Vehicle Registration Number" required="required">
                </div>

                <div class="form-group">
                    <label> Vehicle Colour </label>
                    <input type="text" name="vehicleColor" id="vehicleColor" class="form-control" placeholder="Enter Vehicle Colour" required="required">
                </div>

                <div class="form-group">
                    <label> Vehicle Type </label>
                    <select name="vehicleType" id="vehicleType" required="required" class="form-control">
                      <option value="" selected="selected" disabled="disabled">Select Type</option>
                      <option value="Motorcycle">Motorcycle</option>
                      <option value="Car">Car</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- ############################################################################################################# -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[1]);
            $('#vehicleBrandModel').val(data[2]);
            $('#vehicleRegNum').val(data[3]);
            $('#vehicleColor').val(data[4]);
    });
});

        function fileValidation() { 
            var fileInput =  
                document.getElementById('file'); 
              
            var filePath = fileInput.value; 
          
            // Allowing file type 
            var allowedExtensions =  
                    /(\.jpg|\.jpeg|\.png)$/i; 
              
            if (!allowedExtensions.exec(filePath)) { 
                alert('Invalid file type'); 
                fileInput.value = ''; 
                return false; 
            }  
            else  
            { 
              
                // Image preview 
                if (fileInput.files && fileInput.files[0]) { 
                    var reader = new FileReader(); 
                    reader.onload = function(e) { 
                        document.getElementById( 
                            'imagePreview').innerHTML =  
                            '<img src="' + e.target.result 
                            + '"/>'; 
                    }; 
                      
                    reader.readAsDataURL(fileInput.files[0]); 
                } 
            } 
        } 
    </script> 