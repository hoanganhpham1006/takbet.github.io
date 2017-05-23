<?php  

	date_default_timezone_set('Asia/Bangkok');
	$a = date("Y-m-d H:i:s");

	include("db.php");

	$table = mysqli_query($conn, "SELECT * FROM `matches` WHERE `isStart` = 0 ");
			
	while ($matches = mysqli_fetch_assoc($table)) {
		$idM = $matches['MatchID'];
		if ($a > $matches['time']) {
			$sql = "UPDATE matches SET `isStart` = 1 WHERE MatchID = '$idM'";
			mysqli_query($conn, $sql);
		}
	}
?>