<!DOCTYPE html>
<html>
<head>
	<title>Bảng xếp hạng</title>
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
					<li class="active"><a href="bangxephang.php">Bảng xếp hạng</a></li>
					<li><a href="lichthidau.php">Lịch thi đấu</a></li>
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
		<b style = "font-family: arial; font-size: 30px;">BẢNG XẾP HẠNG</b><br>
		<i style = "font-family: arial; font-size: 13px;">Kiểm tra 'Đang cược' và 'Lịch sử' để biết kết quả đã được cập nhật hay chưa</i><br><br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>XH</th>
					<th>Họ và Tên</th>
					<th>Số dư</th>
					<th>+/-</th>
				</tr>
			</thead>
			<tbody style="text-align: left;">
				<?php
				include("db.php");
				$table = mysqli_query($conn, "SELECT * FROM `customers` ORDER BY `moneyS` DESC, `money24h` DESC ");
				$tmp = 1;
				while ($customers = mysqli_fetch_assoc($table)) {
					if ($customers['isActive'] == 1 && $customers['isAdmin'] == 0) {
						if ($customers['money24h'] > 0) echo "<tr class = 'success'>";
						if ($customers['money24h'] < 0) echo "<tr class= 'danger'>";
						
						echo "<td>".$tmp."</td>";
						echo "<td>".$customers['name']."</td>";
						echo "<td>".$customers['moneyS']."</td>";
						echo "<td>".$customers['money24h']."</td>";
						echo "</tr>";
						$tmp++;
						
					}
				}
				?>
			</tbody>
		</table>
	</div>

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