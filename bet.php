<!DOCTYPE html>
<html>
<head>
	<title>Đặt cược</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/mycss.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
	<script src="js/js1.js" ></script>
</head>

<body>
	<?php  
		include ("global.php");
		$matchid = $_GET['matchid'];
		include ("db.php");
		$result = mysqli_query($conn, "SELECT * FROM `matches` WHERE `MatchID`='$matchid' && `isStart` = 0");
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
			header("location: index.php");
		}

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


	<div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">
	  	<form class="form-horizontal" method="POST" action="newbet.php?matchid=<?php echo $matchid ?>">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Tên đội</label>
		    <div class="col-sm-9">
		      	<select class="form-control" name="team" id="team">
					  <option><?php echo $matches['team1'] ?></option>
					  <option><?php echo $matches['team2'] ?></option>
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Số tiền</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" name="money" id="money" placeholder="Số tiền phải là bội của 10.000">
		      <span id="errormoney" class="error"></span>
		    </div>
		  </div>
		  <br><br>
		  <div class="form-group">
		    <div class="col-sm-offset-5 col-sm-9">
		      <button type="submit" class="btn btn-danger" onclick="return check_bet()">Xác nhận</button>
		    </div>
		  </div>
		</form>
	  </div>
	  <div class="col-md-2"></div>
	</div>

	<?php  
		}
	?>
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