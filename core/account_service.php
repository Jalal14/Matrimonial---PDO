<?php require_once SERVER_ROOT."\\data\\account_data_access.php" ?>
<?php require_once SERVER_ROOT."\\data\\get_user_data_access.php" ?>
<?php require_once SERVER_ROOT."\\core\\validation_service.php"; ?>

<?php
	function searchedUsers($entity)
	{
		return getSearchedUsersFromDb($entity);	
	}
	function registerUser($user){
		$result = isEmpty($user);
		if (isset($result)) {
			return $result;
		}
		$result = matchPassword($user['password'], $user['confirmPassword']);
		if (isset($result)) {
			return $result;
		}
		$result = isValidEmail($user['email']);
		if (isset($result)) {
			return $result;
		}
		$registrationList = getAllRegistrationFromDb();
		if (isset($registrationList)) {
			foreach ($registrationList as $registration) {
				if ($registration['uname']==$user['uname']) {
					return "Username already exist, please try another one.";
				}
				if ($registration['email']==$user['email']) {
					return "Email already exist, please try another one.";
				}
			}
		}
		$userList = getAllUserFromDb();
		if (isset($userList)) {
			foreach ($userList as $newUser) {
				if ($newUser['uname']==$user['uname']) {
					return "Username already exist, please try another one.";
				}
				if ($newUser['email']==$user['email']) {
					return "Email already exist, please try another one.";
				}
			}
		}
		$result = insertRegistrationToDb($user);
		if ($result==1) {
			return "Registration successful,please login.";
		}
		return "An error occured, please try agin.";
	}
	function isValidUser($user){
		$isValid = isValidUserInDb($user);
	    if ($isValid==1) {
			$_SESSION['loggedUser'] = getUserDetailsByUsernameFromDb($user);
			$_SESSION['loggedUser']['gender'] = getUserGenderFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['religion'] = getUserReligionFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['blood'] = getUserBloodFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['complexion'] = getUserComplexionFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['marital_status'] = getUserMaritalStatusFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['per_address'] = getUserPerAddressFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['pr_address'] = getUserPrAddressFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['education'] = getUserEducationFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['job'] = getUserJobByIdFromDb($_SESSION['loggedUser']);
	    }else{
	    	$registrationList = getAllRegistrationFromDb();
			if (isset($registrationList)) {
				foreach ($registrationList as $registration) {
					if ($registration['uname']==$user['uname']) {
						return 0;
					}
				}
			}
	    }
	    return $isValid;
	}
	function permitLogin($user){
		return permitLoginInDB($user);
	}
	function isRegistrationReq($user){
	    return isRegistrationReqInDb($user);
    }
	function updateUserInfo($user){
		$result = isValidUpdateInfo($user);
		if (isset($result)) {
			return $result;
		}
		$result = updateUserInfoToDb($user);
		if ($result==1) {
			$_SESSION['loggedUser'] = getUserDetailsByUsernameFromDb($user);
			$_SESSION['loggedUser']['gender'] = getUserGenderFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['religion'] = getUserReligionFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['blood'] = getUserBloodFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['complexion'] = getUserComplexionFromDb($_SESSION['loggedUser']);
			$_SESSION['loggedUser']['marital_status'] = getUserMaritalStatusFromDb($_SESSION['loggedUser']);
			return "Information successfully updated.";
		}
		return "Error occured during changing info,try again.";
	}
	function updateUserPerAddress($user){
		if ($user['per_police_station'] == null){
		    return "Select police station";
        }
		if (hasUserPerAddressInDb($user)==1) {
			$result = updateUserPerAddressToDb($user);
			$_SESSION['loggedUser']['per_address'] = getUserPerAddressFromDb($_SESSION['loggedUser']);
			if ($result==1) {
				return "Permanent address successfully updated.";
			}
		}else{
			$result = insertUserPerAddressToDb($user);
			if ($result==1) {
				return "Permanent address successfully updated.";
			}
		}
		return "Error occured during changing permanent address,try again.";
	}
	function updateUserPrAddress($user){
        if ($user['pr_police_station'] == null){
            return "Select police station";
        }
		if (hasUserPrAddressInDb($user)==1) {
			$result = updateUserPrAddressToDb($user);
			$_SESSION['loggedUser']['pr_address'] = getUserPrAddressFromDb($_SESSION['loggedUser']);
			if ($result==1) {
				return "Present address successfully updated.";
			}
		}else{
			$result = insertUserPrAddressToDb($user);
			$_SESSION['loggedUser']['pr_address'] = getUserPrAddressFromDb($_SESSION['loggedUser']);
			if ($result==1) {
				return "Present address successfully updated.";
			}
		}
		return "Error occured during changing permanent address,try again.";
	}
	function updateUserEducation($user){
	    if ($user['degree'] == null){
	        return "Select degree";
        }
		if (hasUserEducationInDb($user)==1) {
			$result = updateUserEducationToDb($user);
			$_SESSION['loggedUser']['education'] = getUserEducationFromDb($user);
			if ($result==1) {
				return "Education information successfully updated.";
			}
		}else{
			$result = insertUserEducationToDb($user);
			$_SESSION['loggedUser']['education'] = getUserEducationFromDb($user);
			if ($result==1) {
				return "Education information successfully updated.";
			}
		}
		return "Error occured during changing permanent address,try again.";
	}
	function updateUserJob($user){
		if (hasUserJobInDb($user)==1) {
			$result = updateUserJobToDb($user);
			$_SESSION['loggedUser']['job'] = getUserJobByIdFromDb($user);
			if ($result == 1) {
				$result = updateUserIncomeToDb($user);
				$_SESSION['loggedUser']['job'] = getUserJobByIdFromDb($user);
				if ($result==1) {
					return "Job information successfully updated.";
				}
			}
		}else{
			$result = insertUserJobToDb($user);
			$_SESSION['loggedUser']['job'] = getUserJobByIdFromDb($user);
			if ($result==1) {
				$result = updateUserIncomeToDb($user);
				$_SESSION['loggedUser']['job'] = getUserJobByIdFromDb($user);
				if ($result==1) {
					return "Job information successfully updated.";
				}
			}
		}
		return "Error occured during changing information,try again.";
	}
	function getUserJobById($user){
		return getUserJobByIdFromDb($user);
	}
	function updateUserFamilyInfo($user){
		if ($user['family_type'] == ''){
		    return 'Please select family type';
        }
		if (hasUserFamilyInDb($user)==1) {
			$result = updateUserFamilyToDb($user);
			$_SESSION['loggedUser']['family']=getUserFamilyInfoFromDb($user);
			if ($result==1) {
				return "Family information successfully updated.";
			}
		}else{
			echo $result = insertUserFamilyToDb($user);
			$_SESSION['loggedUser']['family']=getUserFamilyInfoFromDb($user);
			if($result == 1){
				return "Family information successfully updated.";
			}
		}
		return "Update failed, please try again.";
	}
	function getAllReligion(){
		$religionList = getAllReligionFromDb();
		foreach ($religionList as $religion) {
			$newReligionList[]=$religion;
		}
		return $newReligionList;
	}
	function getAllGender(){
		$genderList = getAllGenderFromDb();
		foreach ($genderList as $gender) {
			$newGenderList[] = $gender;
		}
		return $newGenderList;
	}
	function getAllBloodGroup(){
		$bloodList = getAllBloodGroupFromDb();
		foreach ($bloodList as $blood) {
			$newBloodList[] = $blood;
		}
		return $newBloodList;
	}
	function getAllComplexion(){
		$complexionList = getAllComplexionFromDb();
		foreach ($complexionList as $complexion) {
			$newComplexionList[] = $complexion;
		}
		return $newComplexionList;
	}
    function getAllMaritalStatus(){
        $maritalList = getAllMaritalStatusFromDb();
		foreach ($maritalList as $marital) {
			$newMaritalList[] = $marital;
		}
		return $newMaritalList;
    }
    function getAllPoliceStation(){
        $psList = getAllPoliceStationFromDb();
		foreach ($psList as $ps) {
			$newpsList[] = $ps;
		}
		return $newpsList;
    }
    function getAllDistrict(){
        $districtList = getAllDistrictFromDb();
		foreach ($districtList as $district) {
			$newDistrictList[] = $district;
		}
		return $newDistrictList;
    }
    function getAllDivision(){
        $divisionList = getAllDivisionFromDb();
		foreach ($divisionList as $division) {
			$newDivisionList[] = $division;
		}
		return $newDivisionList;
    }
    function getAllDegree(){
        $degreeList = getAllDegreeFromDb();
		foreach ($degreeList as $degree) {
			$newDegreeList[] = $degree;
		}
		return $newDegreeList;
    }
	function updatePropic($user, $propic){
		$propic = "propic/".$propic;
		if (updatePropicToDb($user, $propic) == 1) {
			$_SESSION['loggedUser']['propic']=$propic;
			return "Profle picture changed.";
		}
		return "Error occured.";
	}
	function updatePassword($user,$oldPass,$newPass){
		$dbUser = getUserDetailsByUsernameFromDb($user);
		if ($dbUser['password'] == $oldPass) {
			$result = updatePasswordToDb($user,$newPass);
			if ($result==1) {
				$_SESSION['loggedUser']['password'] = $newPass;
				return "Password changed.";
			}
			return "Error occured during changing password,try again.";
		}
		return "Wrong password.";
	}
	function recoverPassword($user){
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
