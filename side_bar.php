<?php
	session_start();
	include('config.php');
	if (empty($_SESSION['username'])) {
		header('Location: login.php');
		exit;
		date_default_timezone_set("Asia/Muscat");
	}
	if(isset($_SESSION['username'])){
		$uname=$_SESSION['username'];
		$bh_id=$_SESSION['bh_id'];
		$user_code=$_SESSION['user_code'];
		$des=$_SESSION['des'];
	}

	//Query For User Rights
if(isset($_SESSION['user_code']))
{
		$user_rts_code=$_SESSION['user_code'];
		$rights_query = "SELECT dsh_brd as a1,
		b_m as b1,
		b_m_create as b11,
		b_m_edit as b12,
		purchase as c1,
		sales as c2,
		c_m as d1,
		c_m_create as  d11,
		c_m_edit as d12,
		c_m_rates as d13,
		cus_m as f1,
		cus_m_create as f11,
		cus_m_edit as f12,
		cus_m_black as f13,
		u_m as g1,
		u_m_create as g11,
		u_m_edit as g12,
		u_m_des as g13,
		u_m_rights as g14,
		reports as h1,
		tr_h as h11,
		re_b as h12,
		ledger as h13,
		topsheet as h14,
		transaction as l1,
		utili as i1,
		utili_calc as i11,
		utili_backup as i12,
		settings as j1,
		set_ch_pass as j11,
		voucher as k1
		FROM rights WHERE user_rts_code = '$user_rts_code'";

		$rights = mysqli_query($mysqli,$rights_query);
		if (mysqli_num_rows($rights)>0) {

				while($row = mysqli_fetch_assoc($rights)) {

							$a1 = $row["a1"];
							$b1 = $row["b1"];
								$b11 = $row["b11"];
								$b12 = $row["b12"];
							$c1 = $row["c1"];
							$c2 = $row["c2"];
							$d1 = $row["d1"];
								$d11 = $row["d11"];
								$d12 = $row["d12"];
								$d13 = $row["d13"];
							$f1 = $row["f1"];
								$f11 = $row["f11"];
								$f12 = $row["f12"];
								$f13 = $row["f13"];
							$g1 = $row["g1"];
								$g11 = $row["g11"];
								$g12 = $row["g12"];
								$g13 = $row["g13"];
								$g14 = $row["g14"];
							$h1 = $row["h1"];
								$h11 = $row["h11"];
								$h12 = $row["h12"];
								$h13 = $row["h13"];
								$h14 = $row["h14"];
							$i1 = $row["i1"];
								$i11 = $row["i11"];
								$i12 = $row["i12"];
							$j1 = $row["j1"];
								$j11 = $row["j11"];
							$k1 = $row["k1"];
							$l1 = $row["l1"];

				}
		}else
		{
    		echo "0 results";
		}

}

?>
<nav class="navbar-default navbar-static-top" role="navigation">
		<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1> <a class="navbar-brand" href="index.php">Currency Exchange</a></h1>
		</div>
		<div class=" border-bottom">
        	<div class="full-left">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
				</section>
				<!--
				<form class=" navbar-left-right">
					<input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
					<input type="submit" value="" class="fa fa-search">
				</form>
			-->
				<div class="clearfix"> </div>
			</div>
            <!-- Brand and toggle get grouped for better mobile display -->

			<!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
				<ul class=" nav_1">
					<li class="dropdown">
		      	<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown">
							<span class=" name-caret">
							<?php
								echo $bh_id."|".$uname; 
							?>
							</span>
					  </a>
		      </li>
		     </ul>
		    </div><!-- /.navbar-collapse -->
			<div class="clearfix">
			</div>
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label"><b>Dashboard</b></span> </a>
                    </li>

										<!-- Branch Master -->

										<?php if($b1 == '1') {?>
                    <li>
		                    <a href="#" class=" hvr-bounce-to-right">
													<i class="fa fa-sitemap nav_icon"></i>
													<span class="nav-label"><b>Branch Master</b></span>
													<span class="fa arrow"></span>
												</a>
		                    <ul class="nav nav-second-level">
														<?php if($b11 == '1') {?>
		                       	<li>
																<a href="bm_create.php" class=" hvr-bounce-to-right">
																	<i class="fa fa-plus-circle nav_icon"></i>
																	<font color="green">Create</font>
																</a>
														</li>
														<?php } ?>
														<?php if($b12 == '1') {?>
		                        <li>
																<a href="bm_edit.php" class=" hvr-bounce-to-right">
																	<i class="fa fa-pencil-square nav_icon"></i>
																	<font color="green">Edit/Freeze</font>
																</a>
														</li>
														<?php } ?>
							   			</ul>
                    </li>
									<?php } ?>

									<!--Currency Master -->

									<?php if($d1 == '1') {?>
										<li>
                        <a href="#" class=" hvr-bounce-to-right">
														<i class="fa fa-money nav_icon"></i> <span class="nav-label"><b>Currency Master</b></span><span class="fa arrow"></span>
												</a>
                        <ul class="nav nav-second-level">
														<?php if($d11 == '1') {?>
                            <li>
																<a href="cm_create.php" class=" hvr-bounce-to-right">
																	<i class="fa fa-plus-square nav_icon"></i>
																	<font color="green">Create</font>
																</a>
														</li>
														<?php } ?>
														<?php if($d12 == '1') {?>
					                  <li>
															<a href="cm_edit.php" class=" hvr-bounce-to-right"><i class="fa fa-pencil-square nav_icon"></i><font color="green">Edit/Freeze</font></a>
														</li>
														<?php } ?>
														<?php if($d13 == '1') {?>
														<li>
															<a href="c_rates.php" class=" hvr-bounce-to-right"><i class="fa fa-history nav_icon"></i><font color="green">Currency Rates& History  </font></a>
														</li>
														<?php } ?>
										   	</ul>
                  	</li>
										<?php } ?>

										<!-- Purchase -->
										<?php if($c1 == '1') {?>
										<li>
												<a href="purchase.php" class=" hvr-bounce-to-right">
													<i class="fa fa-shopping-cart nav_icon"></i>
													<span class="nav-label"><b>Purchase</b></span>
												</a>
					          </li>
										<?php } ?>

										<!-- Sales -->
										<?php if($c2 == '1') {?>
										<li>
												<a href="sales.php" class=" hvr-bounce-to-right">
													<i class="fa fa-shopping-cart nav_icon"></i>
													<span class="nav-label"><b>Sales</b></span>
												</a>
					          </li>
										<?php } ?>

										<!-- Customer Master -->
										<?php if($f1 == '1') {?>
                    <li>
												<a href="#" class=" hvr-bounce-to-right">
													<i class="fa fa-user nav_icon"></i>
													<span class="nav-label"><b>Customer Master</b></span>
													<span class="fa arrow"></span>
												</a>
						            <ul class="nav nav-second-level">
													<?php if($f11 == '1') {?>
						               <li>
															<a href="cus_create.php" class=" hvr-bounce-to-right"><i class="fa fa-plus-circle nav_icon"></i><font color="green">Create</font></a>
													 </li>
													 <?php } ?>
													 <?php if($f12 == '1') {?>
						                <li>
																<a href="cus_edit.php" class=" hvr-bounce-to-right"><i class="fa fa-pencil nav_icon"></i><font color="green">Edit</font></a>
														</li>
														<?php } ?>
														<?php if($f13 == '1') {?>
														<li>
																<a href="cus_blk_list.php" class=" hvr-bounce-to-right"><i class="fa fa-ban nav_icon"></i><font color="green">Black List</font></a>
														</li>
														<?php } ?>
												</ul>
                    </li>
										<?php } ?>

										<!-- User Master -->
										<?php if($g1 == '1') {?>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right">
													<i class="fa fa-user-secret nav_icon"></i>
													<span class="nav-label"><b>User Master</b></span>
													<span class="fa arrow"></span>
												</a>
					              <ul class="nav nav-second-level">
														<?php if($g11 == '1') {?>
					                  <li>
															 	<a href="ur_create.php" class=" hvr-bounce-to-right"><i class="fa fa-plus-circle nav_icon"></i><font color="green">Create</font></a>
														</li>
														<?php } ?>
														<?php if($g12 == '1') {?>
					                  <li>
																<a href="ur_edit.php" class=" hvr-bounce-to-right"><i class="fa fa-pencil nav_icon"></i><font color="green">Edit/Freeze</font></a>
														</li>
														<?php } ?>
														<?php if($g13 == '1') {?>
														<li>
																<a href="ur_des.php" class=" hvr-bounce-to-right"><i class="fa fa-user-md nav_icon"></i><font color="green">Designation</font></a>
														</li>
														<?php } ?>
														<?php if($g14 == '1') {?>
														<li>
																<a href="rights.php" class=" hvr-bounce-to-right"><i class="fa fa-legal nav_icon"></i><font color="green">User Rights</font></a>
														</li>
														<?php } ?>
										   </ul>
                    </li>
										<?php } ?>

										<!-- Reports -->
										<?php if($h1 == '1') {?>
										<li>
                        <a href="#" class=" hvr-bounce-to-right">
													<i class="fa fa-file nav_icon"></i>
													<span class="nav-label"><b>Reports</b></span>
													<span class="fa arrow"></span>
												</a>
                        <ul class="nav nav-second-level">
													<?php if($h11 == '1') {?>
                            <li>
															<a href="reports.php" class=" hvr-bounce-to-right">
																<i class="fa fa-history nav_icon"></i>
																<font color="green">Transaction History</font>
															</a>
														</li>
														<?php } ?>
														<?php if($h12 == '1') {?>
	                            <li>
																<a href="reprintmenu.php" class=" hvr-bounce-to-right">
																	<i class="fa fa-history nav_icon"></i>
																	<font color="green">Reprint Bill</font>
																</a>
															</li>
															<?php } ?>
															<?php if($h13 == '1') {?>
		                            <li>
																	<a href="ledger.php" class=" hvr-bounce-to-right">
																		<i class="fa fa-history nav_icon"></i>
																		<font color="green">Ledger</font>
																	</a>
																</li>
																<?php } ?>
																<?php if($h13 == '1') {?>
		                           								 <li>
																	<a href="topsheet.php" class=" hvr-bounce-to-right">
																		<i class="fa fa-database nav_icon"></i>
																		<font color="green">Top Sheet</font>
																	</a>
																</li>
																<?php } ?>
                        </ul>
                    </li>
										<?php } ?>

										<!-- Utilities -->
										<?php if($i1 == '1') {?>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-wrench nav_icon"></i> <span class="nav-label"><b>Utilities</b></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
														<?php if($i11 == '1') {?>
                            <li>
																<a href="calc.php" class=" hvr-bounce-to-right">
																		<i class="fa fa-calculator nav_icon"></i>
																		<font color="green">Calculator</font>
																</a>
														</li>
														<?php } ?>
														<?php if($i12 == '1') {?>
                            <li>
															<a href="backup/backup.php" class=" hvr-bounce-to-right">
																<i class="fa fa-database nav_icon"></i>
																<font color="green">Backup</font>
															</a>
														</li>
														<?php } ?>
                        </ul>
                    </li>
										<?php } ?>
					
					<?php if($k1 == '1') {?>
					<li>
                        <a href="voucher.php" class=" hvr-bounce-to-right">
							<i class="fa fa-clipboard nav_icon"></i>
							<span class="nav-label"><b>Voucher</b></span>
						</a>
                    </li>
					<?php } ?>
					<?php if($l1 == '1') {?>
					<li>
					<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-book nav_icon"></i> <span class="nav-label"><b>Transactions</b></span><span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
						<li>
					    	<a href="transaction.php" class=" hvr-bounce-to-right" >
								<i class="fa fa-trash-o nav_icon"></i>
								<font color="green">Delete Transactions</font>
							</a>
						</li>
						<li>
					    	<a href="del_transaction.php" class=" hvr-bounce-to-right" >
								<i class="fa fa-recycle nav_icon"></i>
								<font color="green">Deleted Transactions</font>
							</a>
						</li>
						</ul>
                    </li>
					<?php } ?>
										<!-- Settings -->
										<?php if($j1 == '1') {?>
                    <li>
                        <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label"><b>Settings</b></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
														<?php if($j11 == '1') {?>
                            <li>
															<a href="change_pass.php" class=" hvr-bounce-to-right">
																	<i class="fa fa-eraser nav_icon"></i>
																	<font color="green">Change Password</font>
															</a>
														</li>
														<?php } ?>
                        </ul>
                    </li>
										<?php } ?>

										<li>
                        <a href="logout.php" class=" hvr-bounce-to-right">
														<i class="fa fa-sign-out nav_icon"></i>
														<span class="nav-label"><b>Logout</b></span>
												</a>
                    </li>

					</ul>
				</div>
			</div>
		</div>
		
</nav>
