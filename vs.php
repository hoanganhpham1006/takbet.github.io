<!DOCTYPE html>
<html>
<head>
	<title>Đặt cược</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<body>
	<?php  
		include ("global.php");
		$matchid = $_GET['matchid'];
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			
				<a class="navbar-brand" href="index.php" style="font-size: 200%; color: blue; font-family: verdana;">TAK BET</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="bangxephang.php">Bảng xếp hạng</a></li>
					<li class="active"><a href="lichthidau.php">Lịch thi đấu</a></li>
					<?php
						if ($admin == 1) echo "
						<li class='dropdown'>
							<a href='' class='dropdown-toggle' data-toggle='dropdown'>Quản lý<b class='caret'></b></a>
							<ul class='dropdown-menu'>
								<li><a href='quanlyC.php'>Quản lý Customers</a></li>
								<li><a href='quanlyM.php'>Quản lý Matches</a></li>
								<li><a href='quanlyB.php'>Quản lý Bet</a></li>
							</ul>
						</li>
						";  
					?>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a href="#">Link</a></li> -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <?php echo $name ?>/ Quản lý tài khoản<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="thongtintaikhoan.php">Thông tin tài khoản</a></li>
							<li><a href="dangcuoc.php">Đang cược</a></li>
							<li><a href="lichsu.php">Lịch sử</a></li>
							<li><a href="logout.php">Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<?php
		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID` = '$matchid' ");
		while ($matches = mysqli_fetch_assoc($table)) {
	?>
		<br>
		<div style="font-family:'Book Antiqua'; font-size: 30px;text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<b>
				<div class="row">
				  <div class="col-md-2"></div>
				  <div class="col-md-3">
				  	<?php  
				  		echo $matches['team1'];
				  	?>
				  </div>
				  <div class="col-md-1">
				  	<?php  
				  		echo "<i style = 'float: left; color:red'>".$matches['point1']."</i>";
				  		echo "<i style = 'float: right;color:red'>:</i>"
				  	?>
				  </div>
				  <div class="col-md-1">
				  	<?php  
				  		echo "<i style = 'color:red'>".$matches['point2']."</i>";
				  	?>
				  </div>
				  <div class="col-md-3">
				  	<?php  
				  		echo " ".$matches['team2'];
				  	?>
				  </div>
				  <div class="col-md-2"></div>
				</div>
			</b><br>
		</div>

	<?php
		}
		$sql = mysqli_query($conn, "SELECT bet.CustomerID, bet.whichTeam, bet.money, customers.name, customers.isAdmin FROM bet INNER JOIN customers ON bet.CustomerID = customers.CustomerID WHERE bet.MatchID = '$matchid' ");
		// $sql = mysqli_query($conn, "SELECT * FROM `bet` WHERE `MatchID` = '$matchid' ");
		while ($bet = mysqli_fetch_assoc($sql)) {
	?>

		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-8" style="height: 37px;">
		  		<table class="table table-hover">
		  			<tbody style="text-align: center;">
		  				<?php if( $bet['isAdmin'] == 0) { ?>
		  				<tr>
		  					<td width="30%">
		  						<?php  
		  							if ($bet['whichTeam'] == 1 ) echo $bet['name'];
		  						?>
		  					</td width="20%">
		  					<td style="border-right: solid 1px ">
		  						<?php  
		  							if ($bet['whichTeam'] == 1) echo $bet['money'];
		  						?>

		  					</td>
		  					<td width="30%">
		  						<?php  
		  							if ($bet['whichTeam'] == 2) echo $bet['name'];
		  						?>
		  					</td>
		  					<td width="20%">
		  						<?php  
		  							if ($bet['whichTeam'] == 2) echo $bet['money'];
		  						?>
		  					</td>
		  				</tr>
		  				<?php  } ?>
		  			</tbody>
		  		</table>
		  </div>
		  <div class="col-md-2"></div>
		</div>

	<?php  
		}
	?>
	<br><br>
	<?php if($admin == 0) { ?>
	<div class="row">
	  <div class="col-md-5"></div>
	  <div class="col-md-2" style="text-align: center;">
	  	<a class = "btn btn-danger" style="font-family:verdana; text-decoration: none; color: white;" href="bet.php?matchid=<?php echo $matchid ?>"><b>ĐẶT CƯỢC </b></a>
	  </div>
	  <div class="col-md-5"></div>
	</div>
	<?php } ?>

	<footer>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
			<hr border = "0px" width="100%" color = "blue" style="height: 5px; margin-top: 100px"/ >
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
			<b>Phạm Hoàng Anh</b><br>
			Học viện Công nghệ Bưu chính Viễn thông <br>
			SĐT: 0972999596<br>
			Email: hoanganh.pham.12327@gmail.com
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="right">
			<b>TAK BET</b><br>
			Hanoi, VietNam <br>
			Chuyên cung cấp dịch vụ Cá độ Bóng đá <br>
			Email: takbet@gmail.com
		</div>
		<br><br><br>
	</footer>

</body>

</html>