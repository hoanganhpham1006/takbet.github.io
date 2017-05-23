<?php 
	include ("db.php");
	
	$matchid = $_GET["idM"];
	
	$table = mysqli_query($conn, "SELECT bet.BetID, bet.MatchID, bet.CustomerID, bet.whichTeam, bet.money, bet.isCount, matches.team1, matches.team2, matches.point1, matches.point2, matches.isEnd, customers.name, customers.moneyS, customers.money24h FROM ((`bet` INNER JOIN matches ON bet.MatchID = matches.MatchID) INNER JOIN customers ON bet.CustomerID = customers.CustomerID ) WHERE matches.MatchID = '$matchid' ");
	while ($matches = mysqli_fetch_assoc($table)) {
		$id = $matches['CustomerID'];
		$money24h = $matches['moneyS'];
		if($matches['whichTeam'] == 1) {
			if ($matches['point1'] > $matches['point2']) {
				$a= $matches['moneyS'] + $matches['money'];
				$b = $a - $money24h;
				$sql = "UPDATE `customers` SET `moneyS` = '$a', `money24h` = '$b' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['point1'] < $matches['point2']) {
				$a = $matches['moneyS'] - $matches['money'];
				$b = $a - $money24h;
				$sql = "UPDATE `customers` SET `moneyS` = '$a', `money24h` = '$b' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
		if($matches['whichTeam'] == 2) {
			if ($matches['point1'] > $matches['point2']) {
				$a = $matches['moneyS'] - $matches['money'];
				$b = $a - $money24h;
				$sql = "UPDATE `customers` SET `moneyS` = '$a', `money24h` = '$b' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
			if ($matches['point1'] < $matches['point2']) {
				$a = $matches['moneyS'] + $matches['money'];
				$b = $a - $money24h;
				$sql = "UPDATE `customers` SET `moneyS` = '$a', `money24h` = '$b' WHERE `CustomerID` = '$id'";
				mysqli_query($conn, $sql);
			}
		}
	}

	$sql = "UPDATE `matches` SET `isEnd` = 1 WHERE MatchID = '$matchid'";

	if (mysqli_query($conn, $sql)) { //Check 
		header("location: quanlyM.php");
	}

	else {
		echo "Haven't Edited";
	}


	mysqli_close($conn); //Disconnect

?>