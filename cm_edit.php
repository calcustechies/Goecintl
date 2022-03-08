<?php
include'config.php';
include'head.php';
?>
<div id="wrapper">
<?php include'side_bar.php'; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Edit/Freeze Currency</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<?php
		//$sql1=" SELECT * from currency where cy_frz='0' and bh_code='$bh_id'";
		//$sql2=" SELECT * from currency where cy_frz='1' and bh_code='$bh_id'";
                $sql1=" SELECT * from currency where cy_frz='0' ";
		$sql2=" SELECT * from currency where cy_frz='1' ";

		$rs=mysqli_query($mysqli,$sql1);
		$rs2=mysqli_query($mysqli,$sql2);

	?>

		<table class="table table-hover">
			<thead style="background-color:#33d28b;color:black">
			  <tr>
				<th>Sl.No</th>
				<th>Currency ID</th>
				<th>Currency Code</th>
				<th>Edit</th>
				<th>Freeze</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
				while($row=mysqli_fetch_array($rs))
				{ ?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php  echo $row["cy_code"]; ?></td>
					<td><?php  echo $row["cy_name"]; ?></td>
					<td><a href="edit_cm.php?cy_code=<?php echo $row["cy_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="cm_edit.php?cy_code=<?php echo $row["cy_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
					</tr>

				<?php $i++;}
			?>
			</tbody>
		</table>
		<br/>
		<table class="table table-hover">
			<thead  style="background-color:#d33461">
			  <tr>
				<th>Sl.No</th>
				<th>Currency ID</th>
				<th>Currency Code</th>
				<th>Edit</th>
				<th>Freeze</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
				while($row2=mysqli_fetch_array($rs2))
				{ ?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php  echo $row2["cy_code"]; ?></td>
					<td><?php  echo $row2["cy_name"]; ?></td>
					<td><a href="edit_cm.php?cy_code=<?php echo $row2["cy_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="cm_edit.php?cy_code=<?php echo $row2["cy_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
					</tr>

				<?php $i++;}
			?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php

if(isset($_GET['cy_code']))
{
	$id = $_GET['cy_code'];
	//freeze / defreeze
	$sql3=" SELECT cy_frz from currency where cy_code='$id'";
	$rs3=mysqli_query($mysqli,$sql3);
	$row3=mysqli_fetch_array($rs3);
	$frz=$row3['cy_frz'];
	if($frz == '0')
	{
		$query2 = mysqli_query($mysqli,"UPDATE currency SET cy_frz='1' WHERE cy_code='$id'");
	}
	else
	{
		$query3 = mysqli_query($mysqli,"UPDATE currency SET cy_frz='0' WHERE cy_code='$id'");
	}
	if($query2 || $query3){

		echo "<script>alert('Success');window.location='cm_edit.php';</script>";
		}
}
?>
