<?php 
	include ("db.php");
	
	$betid = $_GET["idB"];
	
	
	$sql = "DELETE FROM `bet`  WHERE `BetID`='$betid'";

	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyB.php");
	}

	else {
		echo "Haven't Deleted";
	}


	mysqli_close($conn); //Disconnect

?>