<?php
//	$serverName = "localhost";
//	$userName = "root";
//	$password = "";
//	$dbName = "matrimonial_db";
//
//	function executeNonQuery($query){
//		global $serverName, $userName, $password, $dbName;
//		$result = false;
//		$connection = mysqli_connect($serverName, $userName, $password, $dbName);
//		if($connection){
//			$result = mysqli_query($connection, $query);
//			mysqli_close($connection);
//		}
//		return $result;
//	}
//
//	function executeQuery($query){
//		return executeNonQuery($query);
//	}
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "matrimonial_db";
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "Error: ".$e->getMessage();
	}
	function executeNonQuery($stmt){
		$stmt->execute();
		$res = $stmt->rowCount();
		$conn = null;
		return $res;
	}
	function executeQuery($stmt){
		$res = $stmt->execute();
		$conn = null;
		return $stmt;
	}
?>
