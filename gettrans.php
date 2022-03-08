<?php
	include'config.php';
//$f = intval($_GET['f']);

$frm = $_GET['frm'];
$to = $_GET['to'];
session_start();
$bh_id=$_SESSION['bh_id'];


$sql="SELECT * FROM transaction WHERE bh_code = '".$bh_id."' AND trans_date BETWEEN '".$frm."' AND '".$to."' ORDER BY sr_no DESC";
$result = mysqli_query($mysqli,$sql);

echo "
<table class='table table-hover' style='width:95%''>

  <thead>
    <tr class='danger'>
    <th>Sl.No</th>
    <th>Customer</th>
		<th>Date</th>
    <th>Time</th>
    <th>Currency</th>
    <th>From Amount</th>
    <th>To Amount</th>
	<th>Delete</th>
    </tr>
  </thead>
  <tbody>";
	$i=1;
while($row = mysqli_fetch_array($result)) {

		$f_cy=$row['from_cy'];
		$query46 = mysqli_query($mysqli,"SELECT cy_name FROM currency WHERE cy_code='$f_cy'");
		$row46 = mysqli_fetch_assoc($query46);
		$c_id=$row['cus_id'];
		$query47 = mysqli_query($mysqli,"SELECT cus_name FROM customer WHERE cus_code='$c_id'");
		$row47 = mysqli_fetch_assoc($query47);

    echo "<tr>";
		echo "<td>" . $i . "</td>";
    //echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row47['cus_name'] . "</td>";
		echo "<td>" . $row['trans_date'] . "</td>";
    echo "<td>" . $row['trans_time'] . "</td>";
		echo "<td>" . $row46['cy_name'] . "</td>";
    echo "<td>" . $row['frm_amt'] . "</td>";
    echo "<td>" . $row['to_amt'] . "</td>";
	 echo "<td class='text-center'><a href='delete_trans.php?id=".$row['tr_id']."' ><i class='fa fa-trash-o'></i></a></td>";
    echo "</tr>";
		$i++;
}
echo "</tbody></table>";
?>
<style>
	.fa-trash-o {
	color: blue;
	}
	
	i.fa-trash-o:hover{
		color: red;
	}
</style>

<script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {

                $('#from_date').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
					  $(document).ready(function () {

                $('#to_date').datepicker({
                    format: "yyyy/mm/dd"
                });


            });
        </script>

