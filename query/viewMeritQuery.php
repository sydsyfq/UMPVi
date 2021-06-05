<?php
$query = "SELECT penaltyID = '1', COUNT(*) FROM penalty INNER JOIN trafficViolation ON trafficViolation.penaltyID = penalty.penaltyID";
$result = mysqli_query($conn,$query);

$query = "SELECT * FROM penalty INNER JOIN trafficViolation ON trafficViolation.penaltyID = penalty.penaltyID WHERE penalty.penaltyID = '1'";
$result2 = mysqli_query($conn,$query);

$query = "SELECT * FROM trafficViolation INNER JOIN penalty ON trafficViolation.penaltyID = penalty.penaltyID INNER JOIN user ON trafficViolation.userID = user.userID WHERE user.userID = $userIDSession";
$result1 = mysqli_query($conn,$query);

$query = "SELECT * FROM meritAward INNER JOIN meritObedient ON meritAward.meritObedientID = meritObedient.meritObedientID INNER JOIN user ON meritAward.userMatricNum = user.userMatricNum WHERE user.userID = $userIDSession";
$result = mysqli_query($conn,$query);

$sum = "SELECT SUM(meritObedientPoint) as 'sumMerit' FROM meritAward INNER JOIN meritObedient ON meritAward.meritObedientID = meritObedient.meritObedientID INNER JOIN user ON meritAward.userMatricNum = user.userMatricNum WHERE user.userID = $userIDSession";
$res= mysqli_query($conn, $sum);
$sumResult=mysqli_fetch_array($res);

$sum1 = "SELECT SUM(penaltyMerit) as 'sumPenalty' FROM trafficViolation INNER JOIN penalty ON trafficViolation.penaltyID = penalty.penaltyID INNER JOIN user ON trafficViolation.userID = user.userID WHERE user.userID = $userIDSession";
$res1= mysqli_query($conn, $sum1);
$sumResult1=mysqli_fetch_array($res1);

$sum2 = "SELECT SUM(pointAwardTotal) as 'sumClaim' FROM pointAward INNER JOIN event ON pointAward.eventID = event.eventID INNER JOIN user ON pointAward.userID = user.userID WHERE user.userID = $userIDSession";
$res2= mysqli_query($conn, $sum2);
$sumResult2=mysqli_fetch_array($res2);

?>