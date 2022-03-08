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
				<span>Customer Black List</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
 	<div class="container">
		<?php
		$sql1=" SELECT * from customer where cus_blk='1'";

		$rs=mysqli_query($mysqli,$sql1);

	?>
		<br/>
		<table class="table table-hover">
			<thead style="background-color:#d33461">
			  <tr>
				<th>Sl.No</th>
				<th>Customer Code</th>
				<th>Customer Name</th>
				<th>ID/PP No</th>
				<th>Edit</th>
				<th>Black List</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
				while($row=mysqli_fetch_array($rs))
				{ ?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php  echo $row["cus_code"]; ?></td>
					<td><?php  echo $row["cus_name"]; ?></td>
					<td><?php  echo $row["cus_pp"]; ?></td>
					<td><a href="edit_cus.php?cus_code=<?php echo $row["cus_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="cus_blk_list.php?cus_code=<?php echo $row["cus_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
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

if(isset($_GET['cus_code']))
{
	$id = $_GET['cus_code'];	
	$query2 = mysqli_query($mysqli,"UPDATE customer SET cus_blk='0' WHERE cus_code='$id'");
	if($query2){
		
		echo "<script>alert('Success');window.location='cus_blk_list.php';</script>";
		}
}
?>