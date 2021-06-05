<?php
$userID = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Sticker</title>
</head>
<body onload="printSticker()">
<div style="text-align: center;margin: auto;position: relative; display: block; margin-left: auto; margin-right: auto;">
<img style="display: block; margin-left: auto; margin-right: auto;" src="https://chart.apis.google.com/chart?chs=400x400&cht=qr&chl=<?=$userID?>&choe=UTF-8">
<label style="font-size: 50px;display: block; margin-left: auto; margin-right: auto; margin-top: 0px;"><?=$userID?></label>
</div>

<script>
function printSticker() {
  window.print();
  setTimeout(function () { window.close(); }, 100);
}
</script>
</body>
</html>