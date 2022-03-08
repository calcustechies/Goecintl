<?php 
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login.php');
	
    exit;
	}
include("config.php");
if(isset($_GET['id']))
{

$id = $_GET['id'];	
	$query = mysqli_query($mysqli,"DELETE FROM transaction WHERE tr_id='$id'");
	if($query){
					echo "<script>alert('SUCCESS');window.location.href='transaction.php';</script>";
					
					}
					else{
						
						echo "<script>alert('ERROR');window.location.href='transaction.php';</script>";
						
						}
	
	}

?>