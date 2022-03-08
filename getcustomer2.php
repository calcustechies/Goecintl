<?php

$q = intval($_GET['q']);

include ('new_db_con.php');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"currency_db");
$sql="SELECT * FROM customer WHERE cus_pp = '".$q."'";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);

 echo json_encode($row);
mysqli_close($con);
?>