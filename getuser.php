<?php
	include'config.php';
//$f = intval($_GET['f']);
$t = intval($_GET['t']);
session_start();
$bh_id=$_SESSION['bh_id'];
//$sql="SELECT * FROM currency_rates WHERE bh_code = '".$bh_id."' AND to_cy='".$t."' ORDER BY sr_no DESC";
$sql="SELECT * FROM currency_rates WHERE to_cy='".$t."' ORDER BY sr_no DESC";
$result = mysqli_query($mysqli,$sql);

echo "<table class='table table-hover' style='width:95%''>

  <thead>
    <tr class='danger'>
    <th>Sl.No</th>
    <th>Currency</th>
		<th>Exchange Rate</th>
    <th>Purchase Rate</th>
    <th>Sell Rate</th>
    <th>From Date</th>
    <th>To Date</th>
    </tr>
  </thead>
  <tbody>";
	$i=1;
while($row = mysqli_fetch_array($result)) {

		//$frm_cc=$row["frm_cy"];
		$to_cc=$row["to_cy"];
		//$query46 = mysqli_query($mysqli,"SELECT * FROM currency WHERE cy_code='$frm_cc'");
		//$row46 = mysqli_fetch_assoc($query46);
		$query47 = mysqli_query($mysqli,"SELECT * FROM currency WHERE cy_code='$to_cc'");
		$row47 = mysqli_fetch_assoc($query47);

    echo "<tr>";
		echo "<td>" . $i . "</td>";
    //echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row47['cy_name'] . "</td>";
		echo "<td>" . $row['cy_ex_rate'] . "</td>";
    echo "<td>" . $row['cy_pur_rate'] . "</td>";
		echo "<td>" . $row['cy_sale_rate'] . "</td>";
    echo "<td>" . $row['from_date'] . "</td>";
    echo "<td>" . $row['to_date'] . "</td>";
    echo "</tr>";
		$i++;
}
echo "</tbody></table>";
?>
