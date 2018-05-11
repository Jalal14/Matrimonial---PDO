<?php require_once SERVER_ROOT."\\data\\family_data_access.php"; ?>

<?php
	function getUserFamilyInfo($user){
		$result = getUserFamilyInfoFromDb($user);
		$_SESSION['loggedUser']['family'] = $result;
		return $result;
	}
?>
