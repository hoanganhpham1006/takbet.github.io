<!DOCTYPE html>
<html>
<head>
	<title>Matches</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>
<body>
	<?php  
		include ("global.php");
		include("globalAdmin.php");

	?>
	<!-- Navigation -->
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
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ MATCHES</b><br>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Thời gian</th>
					<th>Team1</th>
					<th>Point1</th>
					<th>Point2</th>
					<th>Team2</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody style="text-align: left;">
				<?php
				include("db.php");
				$table = mysqli_query($conn, "SELECT * FROM `matches`  WHERE `isEnd` = 0");
		
				while ($matches = mysqli_fetch_assoc($table)) {
				
						if ($matches['isStart'] == 1) echo "<tr class = 'success'>";
						else echo "<tr>";			
						echo "<td>".$matches['MatchID']."</td>";
						echo "<td>".$matches['time']."</td>";
						echo "<td>".$matches['team1']."</td>";
						echo "<td>".$matches['point1']."</td>";
						echo "<td>".$matches['point2']."</td>";
						echo "<td>".$matches['team2']."</td>";
						echo "<td> <a style ='text-decoration: none' href = 'end.php?idM=".$matches['MatchID']."'> END </a> </td>";
						echo "<td> <a style ='text-decoration: none' href = 'editM.php?idM=".$matches['MatchID']."'> EDIT </a> </td>";
						echo "<td> <a style ='text-decoration: none' href = 'deleteM.php?idM=".$matches['MatchID']."'> DELETE </a> </td>";
						echo "</tr>";
			
						
					
				}
				?>
			</tbody>
		</table>
		<br><br>
		<b style="font-size: 14px">Add Match</b> <br><br>

		<form  method="post" class="form-inline" role="form" action = "newmatch.php">
			<div class="form-group">
				<div class="">
					<input type="datetime" class="form-control" id="time" name = "time" placeholder="YYYY-MM-DD HH:MM:SS">
				</div>
			</div>

			<div class="form-group">
			    <input type="text" class="form-control" id="team1" name="team1" placeholder="Team 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="point1" name="point1" placeholder="Point 1">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="ponit2" name="point2" placeholder="Point 2">
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="team2" name="team2" placeholder="Team2">
			</div>

			   
			<input type="submit" class="btn btn-primary" value="Submit">
		</form>
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
		
	</footer>

</body>

</html>