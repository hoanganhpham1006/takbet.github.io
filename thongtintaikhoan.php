<!DOCTYPE html>
<html>
<head>
	<title>Thông tin tài khoản</title>
		<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
	<meta charset="utf-8">
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
		<b style = "font-family: arial; font-size: 30px;">THÔNG TIN TÀI KHOẢN</b><br>
		<br> <br> <br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Account</th>
					<th>Tên chủ tài khoản</th>
					<th>Số điện thoại </th>
					<th>Số dư TK</th>
					<th>Loại </th>
				</tr>
			</thead>
			<tbody>
				<?php
				include("db.php");
				$sql = mysqli_query($conn, "SELECT * FROM `customers` WHERE `CustomerID` = '$id' ");
				while ($customers = mysqli_fetch_assoc($sql)) {	
						echo "<tr style = 'text-align: left'>";	
						echo "<td>".$customers['CustomerID']."</td>";					
						echo "<td>".$customers['acc']."</td>";
						echo "<td>".$customers['name']."</td>";
						echo "<td>".$customers['phone']."</td>";
						if ($customers['isAdmin'] == 0) {
							echo "<td>".$customers['moneyS']."</td>";
						}
						else {
							echo "<td> None </td>";
						}

						if ($customers['isAdmin'] == 0) {
							echo "<td> Thành viên </td>";
						}
						else {
							echo "<td> ADMIN </td>";
						}
						echo "</tr>";
						$old_pass = $customers['pass'];		
				}
				?>
			</tbody>
		</table>
		<br><br>
		<b style="font-size: 14px">Đổi mật khẩu</b> <br><br>

		<form  method="post" class="form-horizontal" role="form" action = "newpass.php">
			<div class="form-group">
				<label class="col-sm-5 control-label">Mật khẩu hiện tại</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="opass" name = "opass" placeholder="Tên tài khoản">
				</div>
			</div>
			<span id="erroropass" class="error"></span> 

			<div class="form-group">
				<label class="col-sm-5 control-label">Mật khẩu mới</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="npass" name="npass" placeholder="Password">
				</div>
			</div>
			<span id="errornpass" class="error"></span> 

			<div class="form-group">
				<label class="col-sm-5 control-label">Nhập lại lần 2</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="npass1" name="npass1" placeholder="Password">
				</div>
			</div>
			<span id="errornpass1" class="error"></span> 
			   
			<input type="submit" class="btn btn-primary" value="Submit" onclick="return check_pass()">
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
		<br><br><br>
	</footer>

</body>

</html>

<script type="text/javascript">
function check_pass() {
	var check = 0;
	var opass = document.getElementById("opass").value;
	if (opass != <?php echo $old_pass ?>){
		check = 1;
		document.getElementById("erroropass").innerHTML = "Mật khẩu không đúng <br> <br>";
	}
	else {
		document.getElementById("erroropass").innerHTML = "";
	}

	var npass = document.getElementById("npass").value;
	if (npass == ""){
		check = 1;
		document.getElementById("errornpass").innerHTML = "Nhập Mật khẩu mới! <br> <br>";
	}
	else {
		document.getElementById("errornpass").innerHTML = "";
	}

	var pass1 = document.getElementById("npass1").value;
	if (pass1 != npass) {
		check = 1;
		document.getElementById("errornpass1").innerHTML = "Mật khẩu không khớp! <br> <br>";
	}
	else {
		document.getElementById("errornpass1").innerHTML = "";
	}


	if (check == 0) {
		return true;
	}
	else return false;
}

</script>