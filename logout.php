<?php  
	session_start();
	if ($_SESSION["id"] ==  "") {
		header("location: login.php");
	}
	else {
		$_SESSION["id"] = "";
		header("location: login.php");
	}
		
?>