<?php  
	include ("db.php"); //Connect

	$point1 = $_POST["point1"];
	$point2 = $_POST["point2"];

	$z = $_GET["idM"];


	$sql = "UPDATE matches SET `point1` = '$point1', `point2` = '$point2' WHERE MatchID = '$z'";
	
	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyM.php");

	}

	else {
		echo "Haven't Editted";
	}

	mysqli_close($conn);
?>