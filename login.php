<?php
	session_start();
	include('config.php');
	date_default_timezone_set("Asia/Kolkata");
	if(isset($_POST['log']))
	{
		$user_name = trim($_POST['user_name']);
		$pass_word = trim($_POST['pass_word']);
		$branch_id = trim($_POST['branch_id']);
		$query = "SELECT * FROM users WHERE user_nam='$user_name' AND pass_wor='$pass_word' and bh_code='$branch_id' ";
		$result = mysqli_query($mysqli,$query)or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);

		if( $num_row ==1 ) //if only one row exists then login
		{
		$_SESSION['username']=$row['user_nam']; // session of username
		$_SESSION['user_code']=$row['us_code']; // session of user code
		$_SESSION['bh_id']=$row['bh_code']; // session of branch id
		$_SESSION['des']=$row['us_des']; // session of des
		header("Location: index.php"); // locate into index page he exit
	}else {
		  echo  "<font color='red'>Invalid Username/Password !</font>";
	}
	}
	$query11 = "SELECT * FROM branch";
	$rs11=mysqli_query($mysqli,$query11);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="css1/style.css">


</head>

<body>
  <body class="align">

  <div class="grid">

    <form action="" method="POST" class="form login" >
	  <div class="form__field">
		<label for="sel1">Branch:</label>
		<select name="branch_id" id="login__username" class="form__input form-control">
			<?php
					while($rs=mysqli_fetch_array($rs11))
					{ 

					?>
						<option value="<?php echo $rs["bh_code"]; ?>"><?php  echo $rs["bh_name"]; ?></option>
			<?php } ?>
		<!--<input id="login__username" type="text" name="branch_id" class="form__input" placeholder="Branch ID" required>-->
		</select>
      </div>
      <div class="form__field">
        <input id="login__username" type="text" name="user_name" class="form__input" placeholder="Username" required>
      </div>

      <div class="form__field">
        <input id="login__password" type="password" name="pass_word" class="form__input" placeholder="Password" required>
      </div>

      <div class="form__field">
        <input type="submit" value="Login" name="log" >
      </div>
    </form>

  </div>


</body>

</body>
</html>
