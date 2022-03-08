<?php
include ('new_db_con.php');
$q = intval($_GET['q']);


if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"currency_db");
$sql="SELECT * FROM customer WHERE cus_tel = '".$q."'";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);

 echo json_encode($row);
mysqli_close($con);
?>
