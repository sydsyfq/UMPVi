
<?php

define("SERVER", "sql200.epizy.com");
define("USERNAME", "epiz_28803028");
define("PASSWORD", "wyPJ1ScyJGcihxU");
define("DBNAME", "epiz_28803028_umpvi");

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


mysqli_select_db($conn,"umpvi") or die( "Could not open products database");

?>