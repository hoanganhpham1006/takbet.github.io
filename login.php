<!DOCTYPE html>
<html>
<head>

	<title>Đăng nhập</title>

	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
</head>
<body style="margin-top: 50px; text-align: center;">

	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
		<!-- Can le -->
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
			<b style="font-size: 26px; color: blue; font-family: verdana"> ĐĂNG NHẬP TAK BET </b>
			<form action = "checklogin.php" method="post" class="form-horizontal" style="margin-top: 50px;">
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Tài khoản</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="acc" name = "acc" placeholder="Tên tài khoản">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				   
				     <div class="checkbox">
				       <label>
				         <input type="checkbox"> Remember me
				       </label>
				   
				    </div>
				  </div>
				  <div class="form-group">
				   
				     <input type="submit" class="btn btn-primary" id="login" name="login" value="Đăng nhập">
				     <a class="btn btn-primary" href="Register.php">Đăng ký</a>
				   </div>
				

			</form>

	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<!-- Can le -->
	</div>

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
		
	</footer>
</body>
</html>