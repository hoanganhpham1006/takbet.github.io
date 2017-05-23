<script>
function goBack() {
    window.history.back()
}
</script>

<link rel="stylesheet" href="css/bootstrap.min.css">

<?php 
	include ("db.php");
	$time = $_POST["time"];
	$team1 = $_POST["team1"];
	$point1 = $_POST["point1"];
	$point2 = $_POST["point2"];
	$team2 = $_POST["team2"];
	
	$sql = "INSERT INTO `matches`(`time`, `team1`, `team2`, `point1`, `point2` ) VALUES ('$time','$team1', '$team2', '$point1', '$point2')"; //Add value	
	if (mysqli_query($conn, $sql)) { //CHECK
	    
	    header("location: quanlyM.php");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
		

	mysqli_close($conn); //Disconnect

?>