<!DOCTYPE html>
<html>
<head>
	<title>Lịch Thi Đấu</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/mycss.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>

<body>
	<?php  
		include ("global.php");
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

	<div style="text-align: center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<b style = "font-family: arial; font-size: 30px;">LỊCH THI ĐẤU</b><br>
		<i style = "font-family: arial; font-size: 13px;">Sẽ luôn được cập nhật ngay sau khi chúng tôi tính toán kèo thành công</i><br><br>
		
	</div>

	<?php
		include("db.php");
		$table = mysqli_query($conn, "SELECT * FROM `matches` WHERE `isStart` = 0 ");
		while ($matches = mysqli_fetch_assoc($table)) {
	?>
		<div class="row" style="padding: 10px 0px 10px 0px; width: 100%">
			<div class="col-md-2"></div>
			<div class="col-md-2" style="font-size: 16px; text-align: left; font-family:'Book Antiqua' "><?php echo $matches['time'] ?></div>
			<div class="col-md-8"></div>
		</div>

		<div class="row" style="padding: 0px 0px 10px 0px;width: 100%">
			<div class="col-md-2"></div>
			<div class="col-md-3" style="font-size: 20px; text-align: center;background-color: lightblue;font-family:'Book Antiqua'"><b><?php echo $matches['team1'] ?></b></div>
			<div class="col-md-2" style="font-size: 20px; text-align: center;background-color: lightblue;font-family:'Book Antiqua'"><b><a href="vs.php?matchid=<?php echo $matches['MatchID']?>" class="error">VS</a></b></div>
			<div class="col-md-3" style="font-size: 20px; text-align: center;background-color: lightblue;font-family:'Book Antiqua'"><b><?php echo $matches['team2'] ?></b></div>
			<div class="col-md-2"></div>
		</div>
	<?php } ?>
	<footer>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
			<hr border = "0px" width="100%" color = "blue" style="height: 5px; margin-top: 100px"/ >
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" align="left">
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