<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
		<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/jquery-2.1.1.min.js" ></script>
	<script src = "js/javascript.js"></script>
	<meta charset="utf-8">

</head>
<body>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form action="newacc.php" method="post" role="form">
			<legend style="text-align: center; font-family: verdana; font-size: 30px; color: blue;" >Đăng ký Tài khoản TAK BET</legend>
		
			<div class="form-group">
				<label for="">Tên tài khoản</label>
				<input type="text" name="acc" class="form-control" id="acc" placeholder="Tên tài khoản (Ít nhất 6 ký tự)" >
			</div>
			<span id="erroracc" class="error"></span> 

			<div class="form-group">
				<label for="">Mật khẩu</label>
				<input type="text" name="pass" class="form-control" id="pass" placeholder="Password(Không được rỗng)" >
			</div>
			<span id="errorpass1" class="error"></span>

			<div class="form-group">
				<label for="">Nhập lại Mật khẩu</label>
				<input type="text" class="form-control" id="repass" placeholder="Nhập lại mật khẩu">
			</div>
			<span id="errorpass2" class="error"></span>

			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input type="text" name="phone" class="form-control" id="phone" placeholder="Số điện thoại liên hệ (Mục đích liên hệ)" pattern="[0-9]{10,11}">
			</div>
			<span id="errorphone" class="error"></span>

			<div class="form-group">
				<label for="">Tên đầy đủ</label>
				<input type="text" name ="name" class="form-control" id="name" placeholder="Họ và tên đầy đủ của bạn (Mục đích liên hệ)" >
			</div>
			<span id="errorname" class="error"></span>
		
			
		
			<input type="submit" class="btn btn-primary" value="Submit" onclick="return check_submit()">
			<input type="reset" class="btn btn-primary" value="Reset">
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