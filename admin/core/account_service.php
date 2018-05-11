<?php require_once SERVER_ROOT."\\data\\account_data_access.php" ?>
<?php require_once SERVER_ROOT."\\data\\get_admin_data_access.php" ?>

<?php
	function isValidAdmin($user){
		$isValid = isValidAdminInDb($user);
	    if ($isValid==1) {
			$_SESSION['loggedAdmin'] = getAdminDetailsByUsernameFromDb($user);
	    }
	    return $isValid;
	}
	function updateAdminInfo($user)
	{
		$result = updateAdminInfoToDb($user);
		$_SESSION['loggedAdmin'] = getAdminDetailsByUsernameFromDb($user);
		if ($result==1) {
			return "Information successfully updated.";
		}
		return "Error occured during changing info,try again.";
	}
	function getAllGender()
	{
		$genderList = getAllGenderFromDb();
		foreach ($genderList as $gender) {
			$newGenderList[] = $gender;
		}
		return $newGenderList;
	}
	function getAllBloodGroup()
	{
		$bloodList = getAllBloodGroupFromDb();
		foreach ($bloodList as $blood) {
			$newBloodList[] = $blood;
		}
		return $newBloodList;
	}
	function updatePropic($user, $propic)
	{
		$propic = "propic/".$propic;
		if (updatePropicToDb($user, $propic) == 1) {
            $_SESSION['loggedAdmin'] = getAdminDetailsByUsernameFromDb($user);
			return "Profle picture changed.";
		}
		return "Error occured.";
	}
	function updatePassword($user,$oldPass,$newPass)
	{
		$dbUser = getAdminDetailsByUsernameFromDb($user);
		if ($dbUser['password'] == $oldPass) {
			$result = updatePasswordToDb($user,$newPass);
			if ($result==1) {
				$_SESSION['loggedAdmin']['password'] = $newPass;
				return "Password changed.";
			}
			return "Error occured during changing password,try again.";
		}
		return "Wrong password.";
	}
	function recoverPassword($user)
	{
		if (isEmailExistInDb($user)==1 && isValidDOBInDb($user) ==1) {
			$result = recoverPasswordInDb($user);
			if ($result==1) {
				return "Password changed";
			}
			return "Error occured in database";
		}
		return "Incorrect information.";
	}
?>
