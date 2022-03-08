<?php
include'config.php';
include'head.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!--search-->
 <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toUpperCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toUpperCase().indexOf(value) > -1)
                });
            });
            });
</script>


<div id="wrapper">
<?php include'side_bar.php'; ?>
<div id="page-wrapper" class="gray-bg dashbard-1">
     <div class="content-main">
		<!--banner-->
		 <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Edit Customer</span>
				</h2>
		</div>
		<!--//banner-->
 	 <!--gallery-->
	  <br/>
 	<div class="container">
	<input class="form-control" id="myInput" type="text" placeholder="Search..">
		<br/>
		
		<table class="table table-hover">
			<thead style="background-color:#33d28b;color:black">
			  <tr>
				<th>Sl.No</th>
				<th>Customer Code</th>
				<th>Customer Name</th>
				<th>ID/PP No</th>
				<th>Edit</th>
				<th>Black List</th>
			  </tr>
			</thead>
			<tbody  id="myTable">
			<?php

			$limit = 50;  
			if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
			$start_from = ($page-1) * $limit; 

			$sql1=" SELECT * FROM customer WHERE cus_blk='0' ORDER BY cus_name ASC LIMIT $start_from, $limit";

			$rs=mysqli_query($mysqli,$sql1);

			$i=1;
				while($row=mysqli_fetch_array($rs))
				{ ?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php  echo $row["cus_code"]; ?></td>
					<td><?php  echo $row["cus_name"]; ?></td>
					<td><?php  echo $row["cus_pp"]; ?></td>
					<td><a href="edit_cus.php?cus_code=<?php echo $row["cus_code"];?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<td><a href="cus_blk_edit.php?cus_code=<?php echo $row["cus_code"];?>"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
					</tr>

				<?php $i++;}
			?>
			</tbody>
		</table>

		<?php  
			$sql = "SELECT COUNT(cus_code) FROM customer";  
			$rs_result = mysqli_query($mysqli,$sql);  
			$row = mysqli_fetch_row($rs_result);  
			$total_records = $row[0];  
			$total_pages = ceil($total_records / $limit);  
			$pagLink = "<div class='pagination'>";  
			for ($i=1; $i<=$total_pages; $i++) {  
						$pagLink .= "<a href='cus_edit.php?page=".$i."'>".$i." | </a>";  
			};  
			echo $pagLink . "</div>";  
		?>




	</div>
</div>
</div>
</div>
<?php include'footer.php'; ?>

<?php

if(isset($_GET['cus_code']))
{
	$id = $_GET['cus_code'];
	$query2 = mysqli_query($mysqli,"UPDATE customer SET cus_blk='1' WHERE cus_code='$id'");
	if($query2){

		echo "<script>alert('Success');window.location='cus_edit.php';</script>";
		}
}
?>


