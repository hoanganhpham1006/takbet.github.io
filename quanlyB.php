<!DOCTYPE html>
<html>
<head>
	<title>Bets</title>
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
		<b style = "font-family: arial; font-size: 30px;">QUẢN LÝ BETS</b><br>
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="text-align: center;">BetID</th>
					<th style="text-align: center;">Match</th>
					<th style="text-align: center;">CustomerID</th>
					<th style="text-align: center;">Name</th>
					<th style="text-align: center;">Team</th>
					<th style="text-align: center;">Money</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
						<?php
						include("db.php");
						$result = mysqli_query($conn, "SELECT bet.BetID, bet.MatchID, bet.CustomerID, bet.whichTeam, bet.money, bet.isCount, matches.team1, matches.team2, matches.point1, matches.point2, matches.isEnd, customers.name FROM ((`bet` INNER JOIN matches ON bet.MatchID = matches.MatchID) INNER JOIN customers ON bet.CustomerID = customers.CustomerID ) WHERE matches.isEnd = 0 ORDER BY bet.MatchID, bet.BetID ");
				
						while ($bet = mysqli_fetch_assoc($result)) {
								if($bet['money'] == 0) echo "<tr class ='danger';>";
								else echo "<tr>";
								echo "<td>".$bet['BetID']."</td>";					
								echo "<td>".$bet['team1']." &nbsp &nbsp ".$bet['point1']." : ".$bet['point2']." &nbsp &nbsp ".$bet['team2']."</td>";
								echo "<td>".$bet['CustomerID']."</td>";
								echo "<td>".$bet['name']."</td>";
								if ($bet['whichTeam'] == 1) echo "<td>".$bet['team1']."</td>";
								else echo "<td>".$bet['team2']."</td>";
								echo "<td>".$bet['money']."</td>";
								echo "<td> <a style ='text-decoration: none' href = 'deleteB.php?idB=".$bet['BetID']."'> DELETE </a> </td>";
								echo "</tr>";
								
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
		
	</footer>

</body>

</html>