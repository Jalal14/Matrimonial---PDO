<?php
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\admin_service.php";
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	session_start();
?>


<?php
	if (isset($_SESSION['loggedAdmin'])) {
		$number = numOfRegistrationRequest();
	}
	switch ($action) {
  		case 'login':
	        $admin = array('uname' => '', 'password' => '' );
	        if ($_SERVER['REQUEST_METHOD']=='POST') {
				$errorMsg='';
	            $admin['uname']=$_POST['uname'];
	            $admin['password']=$_POST['password'];
				$isValid = isValidAdmin($admin);
				if ($isValid == 1) {
					header("location: ".APP_ROOT."/?admin_dashboard");
					//header("location: ".APP_ROOT."?admin_full-profile");
				}else {
					$errorMsg='Wrong username or password';
				}
	        }
			break;
		case 'logout':
			session_unset();
			session_destroy();
			header("location: ".APP_ROOT);
			break;
		case 'profile-picture':
			$errorMsg='';
			if (isset($_SESSION['loggedAdmin'])) {
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$location = SERVER_ROOT."\\asset\\propic\\";
					$loggedAdmin = $_SESSION['loggedAdmin'];
					$fileName = explode('.', $_FILES['propic']['name']);
					$tempName = $_FILES['propic']['tmp_name'];
					$propic = $loggedAdmin['uname'].".".$fileName[1];
					if(!empty($fileName)) {
						if (move_uploaded_file($tempName, $location.$propic)) {
							$errorMsg = updatePropic($loggedAdmin, $propic);
							header("location: ".APP_ROOT."/?admin_full-profile");
						}else {
							$errorMsg='An error occured,please try again';
						}
					}
				}
			}else {
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-info':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg='';
				$genderList = getAllGender();
				$bloodList = getAllBloodGroup();
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$updateAdmin['uid']=$_SESSION['loggedAdmin']['aid'];
					$updateAdmin['uname']=$_SESSION['loggedAdmin']['uname'];
					$updateAdmin['fname'] = $_POST['fname'];
					$updateAdmin['mname'] = $_POST['mname'];
					$updateAdmin['lname'] = $_POST['lname'];
					$updateAdmin['dob'] = $_POST['dob'];
					$updateAdmin['gender'] = $_POST['gender'];
					$updateAdmin['blood'] = $_POST['blood'];
					$updateAdmin['email'] = $_POST['email'];
					$updateAdmin['number1'] = $_POST['number1'];
					$updateAdmin['number2'] = $_POST['number2'];
					$errorMsg = updateAdminInfo($updateAdmin);
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'change-password':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				if ($_SERVER['REQUEST_METHOD']=='POST') {
					$oldPass = $_POST['oldPass'];
					$newPass1 = $_POST['newPass1'];
					$newPass2 = $_POST['newPass2'];
					if ($newPass1 == $newPass2) {
						$errorMsg = updatePassword($_SESSION['loggedAdmin'],$oldPass,$newPass1);
					}else{
						$errorMsg = "Password does not matched.";
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