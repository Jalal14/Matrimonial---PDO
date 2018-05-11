<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
	function getAllUserFromDb()
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM tbl_users");
		$userList = executeQuery($query);
		while ($user = $userList->fetch()) {
			$newUserList[]=$user;
		}
		return $newUserList;
	}
	function getActiveUserFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_users WHERE TIMESTAMPDIFF(DAY, tbl_users.last_login, curdate()) < 5");
		$result = executeQuery($query);
		return $result->rowCount();
	}
?>
