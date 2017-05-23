<!DOCTYPE html>
<html>
<head>
	<title> Edit Info </title>
</head>

<body>
	<?php
		$id1 = $_GET["id"];
		include ("global.php");
		include("globalAdmin.php");
	?>
	<div class="row">
	  <div class="col-md-12" style="text-align: center;">
	  <b>EDIT CUSTOMERS ID: <?php echo $id1 ?>	</b> <br><br>

	  </div>
	</div>

	<div class="row">

		<div class="col-md-12" style="text-align: center;">
		  	<form class="form-horizontal"  method="post" action ="edit_com.php?id1=<?php echo $id1; ?>">

			  	<div class="form-group">
				    <label>Số dư</label>
		
				    <input type="text" class="form-control" name = "money" id="money" placeholder="MONEY">
	
			  	</div>
			  	<br>
			  	<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <input type="submit" class="btn btn-primary" value="Save">
				    </div>
				</div>

			</form>
		</div>

	</div>


	<footer>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	
			<hr border = "0px" width="100%" color = "blue" style="height: 5px; margin-top: 10px"/ >
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;" >
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