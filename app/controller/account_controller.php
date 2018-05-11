<?php
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\user_service.php";
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	session_start();
?>
<?php
	if (isset($_SESSION['loggedUser'])) {
		$request = numOfFriendReq($_SESSION['loggedUser']['uid']);
		$unseen = getUnseenMessage($_SESSION['loggedUser']['uid']);
	}
	switch ($action) {
  		case 'login':
	        $user = array('uname' => '', 'password' => '' );
	        if ($_SERVER['REQUEST_METHOD']=='POST') {
				$errorMsg='';
	            $user['uname']=$_POST['uname'];
	            $user['password']=$_POST['password'];
	            if ($user['uname']==null || $user['password']==null) {
	            	$errorMsg = "Username or password can not be empty.";
	            }else{
	            	$isValid = isValidUser($user);
					if ($isValid == 1) {
						$login = permitLogin($user);
						if ($login == 1) {
							header("location: ".APP_ROOT."/?user_dashboard");
						}
						$errorMsg='An error occured,please try again';
					}else if ($isValid==0) {
					    $registrationReq = isRegistrationReq($user);
					    if ($registrationReq == 1) {
                            $errorMsg = "Your account is not approved yet by admin, please wait.";
                        }else{
                            $errorMsg='Wrong username or password';
                        }
					}
	            }
	        }
			break;
		case 'logout':
			session_unset();
			session_destroy();
			header("location: ".APP_ROOT."/?account_login");
			break;
		case 'registration':
			$errorMsg = '';
			$genderList = getAllGender();
			$bloodList = getAllBloodGroup();
			$religionList = getAllReligion();
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$newUser['fname'] = $_POST['fname'];
				$newUser['mname'] = $_POST['mname'];
				$newUser['lname'] = $_POST['lname'];
				$newUser['uname'] = $_POST['uname'];
				$newUser['dob'] = $_POST['dob'];
				$newUser['blood'] = $_POST['blood'];
				$newUser['gender'] = $_POST['gender'];
				$newUser['email'] = $_POST['email'];
				$newUser['contact'] = $_POST['contact'];
				$newUser['religion'] = $_POST['religion'];
				$newUser['password'] = $_POST['password'];
				$newUser['confirmPassword'] = $_POST['confirmPassword'];
				$errorMsg = registerUser($newUser);
			}
			break;
		case 'profile-picture':
			$errorMsg='';
			if (isset($_SESSION['loggedUser'])) {
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$location = SERVER_ROOT."\\asset\\propic\\";
					$loggedUser = $_SESSION['loggedUser'];
					$fileName = explode('.', $_FILES['propic']['name']);
					$tempName = $_FILES['propic']['tmp_name'];
					if ($fileName[1] == 'JPG' || $fileName[1] == 'jpg' || $fileName[1] == 'PNG' || $fileName[1] == 'png') {
                        $propic = $loggedUser['uname'] . "." . $fileName[1];
                        if (!empty($fileName)) {
                            if (move_uploaded_file($tempName, $location . $propic)) {
                                $errorMsg = updatePropic($loggedUser, $propic);
                                header("location: " . APP_ROOT . "/?account_profile-picture");
                            } else {
                                $errorMsg = 'An error occured,please try again';
                            }
                        }
                    }
                    else{
                        $errorMsg = 'Choose .jpg or .png as profile picture.';
                    }
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-info':
			if (isset($_SESSION['loggedUser'])) {
				$errorMsg='';
				$religionList = getAllReligion();
				$genderList = getAllGender();
				$bloodList = getAllBloodGroup();
				$complexionList = getAllComplexion();
				$maritalList = getAllMaritalStatus();
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateUser['uid']=$_SESSION['loggedUser']['uid'];
					$updateUser['uname']=$_SESSION['loggedUser']['uname'];
					$updateUser['fname'] = $_POST['fname'];
					$updateUser['mname'] = $_POST['mname'];
					$updateUser['lname'] = $_POST['lname'];
					$updateUser['dob'] = $_POST['dob'];
					$updateUser['gender'] = $_POST['gender'];
					$updateUser['religion'] = $_POST['religion'];
					$updateUser['height'] = $_POST['height'];
					$updateUser['weight'] = $_POST['weight'];
					$updateUser['blood'] = $_POST['blood'];
					$updateUser['email'] = $_POST['email'];
					$updateUser['number1'] = $_POST['number1'];
					$updateUser['number2'] = $_POST['number2'];
					$updateUser['complexion'] = $_POST['complexion'];
					$updateUser['marital_status'] = $_POST['marital_status'];
					$updateUser['children'] = $_POST['children'];
					$updateUser['bio']=$_POST['bio'];
					$errorMsg = updateUserInfo($updateUser);
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-per-address':
			if (isset($_SESSION['loggedUser'])) {
				$policeStationList = getAllPoliceStation();
				$districtList = getAllDistrict();
				$divisionList = getAllDivision();
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateUser['uid']=$_SESSION['loggedUser']['uid'];
					$updateUser['per_house'] = $_POST['per_house'];
					$updateUser['per_road'] = $_POST['per_road'];
					$updateUser['per_area'] = $_POST['per_area'];
					$updateUser['per_police_station'] = $_POST['per_police_station'];
					$updateUser['per_district'] = $_POST['per_district'];
					$updateUser['per_division'] = $_POST['per_division'];
					$errorMsg = updateUserPerAddress($updateUser);
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-pr-address':
			if (isset($_SESSION['loggedUser'])) {
				$policeStationList = getAllPoliceStation();
				$districtList = getAllDistrict();
				$divisionList = getAllDivision();
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateUser['uid']=$_SESSION['loggedUser']['uid'];
					$updateUser['pr_house'] = $_POST['pr_house'];
					$updateUser['pr_road'] = $_POST['pr_road'];
					$updateUser['pr_area'] = $_POST['pr_area'];
					$updateUser['pr_police_station'] = $_POST['pr_police_station'];
					$updateUser['pr_district'] = $_POST['pr_district'];
					$updateUser['pr_division'] = $_POST['pr_division'];
					$errorMsg = updateUserPrAddress($updateUser);
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-occupation':
			if (isset($_SESSION['loggedUser'])) {
				$_SESSION['loggedUser']['job'] = getUserJobById($_SESSION['loggedUser']);
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateUser['uid']=$_SESSION['loggedUser']['uid'];
					$updateUser['designation'] = $_POST['designation'];
					$updateUser['company'] = $_POST['company'];
					$updateUser['joinning_date'] = $_POST['joinning_date'];
					$updateUser['annual_income']=$_POST['annual_income'];
					$errorMsg = updateUserJob($updateUser);
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-education':
			if (isset($_SESSION['loggedUser'])) {
				$degreeList = getAllDegree();
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateUser['uid']=$_SESSION['loggedUser']['uid'];
					$updateUser['degree'] = $_POST['degree'];
					$updateUser['field'] = $_POST['field'];
					$updateUser['institution'] = $_POST['institution'];
					$updateUser['passing_year'] = $_POST['passing_year'];
					$errorMsg = updateUserEducation($updateUser);
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'family-info':
			if (isset($_SESSION['loggedUser'])){
					$familyTypeList = getAllfamilyTypeFromDb();
					$loggedUser['family'] = getUserFamilyInfoFromDb($_SESSION['loggedUser']);
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						$newUser['uid'] = $_SESSION['loggedUser']['uid'];
						$newUser['family_type'] = $_POST['family_type'];
						$newUser['father_name'] = $_POST['father_name'];
						$newUser['father_occupation'] = $_POST['father_occupation'];
						$newUser['father_income'] = $_POST['father_income'];
						$newUser['mother_name'] = $_POST['mother_name'];
						$newUser['mother_occupation'] = $_POST['mother_occupation'];
						$newUser['mother_income'] = $_POST['mother_income'];
						$newUser['contact'] = $_POST['contact'];
						$newUser['siblings'] = $_POST['siblings'];
						$errorMsg = updateUserFamilyInfo($newUser);
					};
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'change-password':
			if (isset($_SESSION['loggedUser'])) {
				$errorMsg = '';
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$oldPass = $_POST['oldPass'];
					$newPass1 = $_POST['newPass1'];
					$newPass2 = $_POST['newPass2'];
					if ($oldPass==null || $newPass1==null || $newPass2==null) {
						$errorMsg = "Field cannot be empty.";
					}
					else if ($newPass1 != $newPass2) {
						$errorMsg = "Password does not matched.";
					}
					else if ($newPass1 == $newPass2) {
						$errorMsg = updatePassword($_SESSION['loggedUser'],$oldPass,$newPass1);
					}else{
						$errorMsg = "Error occured.";
					}
				}

			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'recover-password':
			$errorMsg='';
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$recover_user['email'] = $_POST['email'];
				$recover_user['dob'] = $_POST['dob'];
				$recover_user['password'] = $_POST['password'];
				if ($recover_user['password'] != $_POST['password2']) {
					$errorMsg = "Password does not match.";
					break;
				}
				$errorMsg = recoverPassword($recover_user);
			}
			break;
		default:

			break;
	}
	require_once $view;
?>