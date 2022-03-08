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
				<span>Edit/Freeze Branch</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">

	<?php
		$sql1=" SELECT * from branch where bh_frz='0'";
		$sql2=" SELECT * from branch where bh_frz='1'";
		$rs=mysqli_query($mysqli,$sql1);
		$rs2=mysqli_query($mysqli,$sql2);

	?>
		<br/>
    <div class="table-responsive">
		<table class="table table-hover">
			<thead style="background-color:#33d28b;color:black">
			  <tr>
				<th>Sl.No</th>
				<th>Branch Code</th>
				<th>Branch Name</th>
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
					<td><?php  echo $row["bh_code"]; ?></td>
					<td><?php  echo $row["bh_name"]; ?></td>
					<td>
						<a href="edit_bm.php?bh_code=<?php echo $row["bh_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
					</td>
					<td>
            <a href="bm_edit.php?bh_code=<?php echo $row["bh_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a>
          </td>
					</tr>

				<?php $i++;}
			?>
			</tbody>
		</table>
  </div>
    <br/>
    <div class="table-responsive">
		<table class="table table-hover">
			<thead  style="background-color:#d33461">
			  <tr>
				<th>Sl.No</th>
				<th>Branch Code</th>
				<th>Branch Name</th>
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
					<td><?php  echo $row2["bh_code"]; ?></td>
					<td><?php  echo $row2["bh_name"]; ?></td>
					<td>
						<a href="edit_bm.php?bh_code=<?php echo $row2["bh_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
					</td>
					<td><a href="bm_edit.php?bh_code=<?php echo $row2["bh_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
					</tr>

				<?php $i++;}
			?>
			</tbody>
		</table>
  </div>

	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php

if(isset($_GET['bh_code']))
{
	$id = $_GET['bh_code'];
	//freeze / defreeze
	$sql3=" SELECT bh_frz from branch where bh_code='$id'";
	$rs3=mysqli_query($mysqli,$sql3);
	$row=mysqli_fetch_array($rs3);
	$frz=$row['bh_frz'];
	if($frz == '0')
	{
		$query2 = mysqli_query($mysqli,"UPDATE branch SET bh_frz='1' WHERE bh_code='$id'");
	}else
	{
		$query3 = mysqli_query($mysqli,"UPDATE branch SET bh_frz='0' WHERE bh_code='$id'");
	}
	if($query2 || $query3){

		echo "<script>alert('Success');window.location='bm_edit.php';</script>";

		}
}
?>
