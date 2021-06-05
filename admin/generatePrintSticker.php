<?php
session_start();
include_once('../DBCon.php');
include_once('../query/stickerVerification.php');
$_SESSION["user_id"];
$_SESSION["username"];

$query = "SELECT * FROM sticker INNER JOIN user ON user.userID = sticker.userID WHERE status='VERIFIED'";

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

  <title>UMPVi - Generate Sticker</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
        <a class="nav-link" href="report.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link" href="merit.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Merit</span></a>
      </li>

  <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="trafficViolation.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Traffic Violation</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="viewStickerApplication.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Sticker Application</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="generatePrintSticker.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Generate Sticker</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="event.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Event</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="report.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Report</span></a>
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
            <h1 class="h3 mb-0 text-gray-800">Generate Sticker (QR Code)</h1>

            <table>
              
            </table>
           
          </div> 

      <!-- End of Main Content -->

      <form action="" method='POST'>
      <center>
        <table class="table table-striped table-bordered" style="text-align: center;">
          <thead>
            <tr>
              <th style="width: 2%;">No</th>
              <th style="width: 20%;">Applicant Name</th>
              <th style="width: 9%;">Matric Number</th>
              <th style="width: 9%;">Vehicle Name</th>
              <th style="width: 9%;">Registration Number</th>
              <th style="width: 9%;">Vehicle Color</th>
              <th style="width: 5%;">Status</th>
              <th style="width: 9%;">Vehicle Grant</th>
              <th style="width: 5%;">User Type</th>
              <th style="width: 23%;">Print Sticker</th>
            </tr>
          </thead>
                    <tbody>
            <?php if (mysqli_num_rows($result) > 0){
              $i = 1;
              while($row = mysqli_fetch_assoc($result)){ 
                $stickerID = $row["stickerID"];
                $vehicleGrant = $row["vehicleGrant"];
                ?>
                <tr stickerID='tr_<?= $stickerID ?>'>
                  <td style="width: 2%;"><?php echo $i; ?></td>
                  <td style="width: 20%;"><?php echo $row['userFullName']; ?></td>
                  <td style="width: 8%;"><?php echo $row['userMatricNum']; ?></td>
                  <td style="width: 8%;"><?php echo $row['vehicleBrandModel']; ?></td>
                  <td style="width: 8%;"><?php echo $row['vehicleRegNum']; ?></td>
                  <td style="width: 8%;"><?php echo $row['vehicleColor']; ?></td>
                  <td style="width: 5%;"><span class="badge badge-success"><?php echo $row['status']; ?></span></td>
                  <td style="width: 8%;"><img width="200px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($vehicleGrant); ?>" /></td>
                  <td style="width: 5%;"><?php echo $row['userType']; ?></td>
                  <td style="width: 20%;">
                    <a href="printSticker.php?id=<?=$row['userID']?>" target="_BLANK"><button type="button" name="verify" class="btn btn-success" value='<?= $userID ?>'>PRINT</button></a>

                    <a href="../query/deleteQrCode.php?id=<?=$row['userID']?>"><button type="button" name="verify" class="btn btn-success" value='<?= $userID ?>'>DELETE</button></a>
                  </td>
                  
                  
                </tr>
              <?php $i++;}} ?>
              <tr>
            </tbody>
          </table>
        </center>
      </form>


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
          <a class="btn btn-primary" href="../index.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
