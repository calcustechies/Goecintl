<?php

$q = intval($_GET['q']);

include ('new_db_con.php');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

//rate query
$sql2="SELECT * FROM currency_rates where active='1' AND to_cy='".$q."' ORDER BY sr_no DESC";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);

//$row = mysqli_fetch_array($result);

 echo json_encode($row2);
mysqli_close($con);





?>