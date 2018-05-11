<?php
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	$indexUrl = APP_ROOT."/index.php?{controller}_index";
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\admin_service.php";
	require_once SERVER_ROOT."\\core\\address_service.php";
	require_once SERVER_ROOT."\\core\\information_service.php";
	session_start();
?>
<?php
	if (isset($_SESSION['loggedAdmin'])) {
		$number = numOfRegistrationRequest();
	}
	else{
		header("location: ".APP_ROOT);
	}
	switch ($action) {
      	case 'dashboard':
			if (isset($_SESSION['loggedAdmin'])) {
					$numOfUser = getNumberOfUser();
					$numOfActiveUser = getNumberOfActiveUser();
				}else {
					header("location: ".APP_ROOT);
				}
			break;
		case 'full-profile':
			if (!isset($_SESSION['loggedAdmin'])) {
				header("location: ".APP_ROOT);
			}
			break;
		case 'registration-request':
			$userReqList = getAllRegistrationRequest();
			if ($_SERVER['REQUEST_METHOD']=="POST") {
				$searchedUser=getUserDetailsById($_POST['userId']);
				$searchedUser['propic'] = 'defaultpic/user.png';
				if (isset($_POST['accept'])) {
					$errorMsg = insertUser($searchedUser);
					if ($errorMsg = 1) {
						header("location: ".APP_ROOT."/?admin_registration-request");
					}
				}else if (isset($_POST['reject'])) {
					$errorMsg = rejectRegistration($searchedUser);
				}
			}
			break;
		case 'public-profile':
			$errorMsg = '';
			if (count($_GET)>0) {
				$key = array_keys($_GET)[1];
				$searchedUser=getUserDetailsById($key);
			}
			if ($_SERVER['REQUEST_METHOD']=="POST") {
				$searchedUser['propic'] = 'defaultpic/user.png';
				if (isset($_POST['accept'])) {
					$errorMsg = insertUser($searchedUser);
				}else if (isset($_POST['reject'])) {
					$errorMsg = rejectRegistration($searchedUser);
				}
			}
			break;
		case 'police-station':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$policeStationList = getAllPoliceStation();
				$districtList = getAllDistrict();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$address['name'] = $_POST['name'];
					$address['district'] = $_POST['district'];
					$result = insertPoliceStation($address);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_police-station");
					}else if ($result==0) {
						$errorMsg = "Police station already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-police-station':
			if (isset($_SESSION['loggedAdmin'])) {
				$key = array_keys($_GET)[1];
				$address['id']=$key;
				$policeStation = getPoliceStationById($key);
				$districtList = getAllDistrict();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$address['name'] = $_POST['name'];
						$address['district'] = $_POST['district'];
						$result = updatePoliceStation($address);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_police-station");
						}else if ($result == 0) {
							$errorMsg = "Police station not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'district':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$districtList = getAllDistrict();
				$divisionList = getAllDivision();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$address['name'] = $_POST['name'];
					$address['division'] = $_POST['division'];
					$result = insertDistrict($address);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_district");
					}else if ($result==0) {
						$errorMsg = "District already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-district':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$address['id']=$key;
				$district = getDistrictById($key);
				$divisionList = getAllDivision();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$address['name'] = $_POST['name'];
						$address['division'] = $_POST['division'];
						$result = updateDistrict($address);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_district");
						}else if ($result == 0) {
							$errorMsg = "District not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'division':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$divisionList = getAllDivision();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$address['name'] = $_POST['name'];
					$result = insertDivision($address);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_division");
					}else if ($result==0) {
						$errorMsg = "Divison already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-division':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$address['id']=$key;
				$division = getDivisionById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$address['name'] = $_POST['name'];
						$result = updateDivision($address);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_division");
						}else if ($result == 0) {
							$errorMsg = "Division not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'degree':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$degreeList = getAllDegree();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$degree['degree'] = $_POST['degree'];
					$result = insertDegree($degree);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_degree");
					}else if ($result==0) {
						$errorMsg = "Degree name already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-degree':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$degree['id']=$key;
				$degree = getDegreeById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['degree'])) {
						$degree['degree'] = $_POST['degree'];
						$result = updateDegree($degree);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_degree");
						}else if ($result == 0) {
							$errorMsg = "Degree name not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'hobby':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$hobbyList = getAllHobby();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$hobby['name'] = $_POST['name'];
					$result = insertHobby($hobby);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_hobby");
					}else if ($result==0) {
						$errorMsg = "Hobby name already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-hobby':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$hobby['id']=$key;
				$hobby = getHobbyById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$hobby['name'] = $_POST['name'];
						$result = updateHobby($hobby);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_hobby");
						}else if ($result == 0) {
							$errorMsg = "Hobby name not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'interest':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$interestList = getAllInterest();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$interest['name'] = $_POST['name'];
					$result = insertInterest($interest);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_interest");
					}else if ($result==0) {
						$errorMsg = "Interest name already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-interest':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$interest['id']=$key;
				$interest = getInterestyById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$interest['name'] = $_POST['name'];
						$result = updateInterest($interest);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_interest");
						}else if ($result == 0) {
							$errorMsg = "Interest name not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'music':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$musicList = getAllMusic();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$music['name'] = $_POST['name'];
					$result = insertMusic($music);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_music");
					}else if ($result==0) {
						$errorMsg = "Music name already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}	
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-music':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$music['id']=$key;
				$music = getMusicById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$music['name'] = $_POST['name'];
						$result = updateMusic($music);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_music");
						}else if ($result == 0) {
							$errorMsg = "Music name not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'sport':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$sportList = getAllSport();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$sport['name'] = $_POST['name'];
					$result = insertSport($sport);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_sport");
					}else if ($result==0) {
						$errorMsg = "Sport name already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-sport':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$sport['id']=$key;
				$sport = getSportById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['name'])) {
						$sport['name'] = $_POST['name'];
						$result = updateSport($sport);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_sport");
						}else if ($result == 0) {
							$errorMsg = "Sport name not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'family-type':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$typeList = getAllFamilyType();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$type['type'] = $_POST['type'];
					$result = insertFamilyType($type);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_family-type");
					}else if ($result==0) {
						$errorMsg = "Family type already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-family-type':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$type['id']=$key;
				$type = getFamilyTypeById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['type'])) {
						$type['type'] = $_POST['type'];
						$result = updateFamilyType($type);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_family-type");
						}else if ($result == 0) {
							$errorMsg = "Family type not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'complexion':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$typeList = getAllComplexion();
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					$type['type'] = $_POST['type'];
					$result = insertComplexion($type);
					if ($result==1) {
						header("location: ".APP_ROOT."/?admin_complexion");
					}else if ($result==0) {
						$errorMsg = "Complexion type already exist,please update";
					}else{
						$errorMsg = "Error occured,please try again.";
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		case 'update-complexion':
			if (isset($_SESSION['loggedAdmin'])) {
				$errorMsg = '';
				$key = array_keys($_GET)[1];
				$type['id']=$key;
				$type = getComplexionById($key);
				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['type'])) {
						$type['type'] = $_POST['type'];
						$result = updateComplexion($type);
						if ($result == 1) {
							header("location: ".APP_ROOT."/?admin_complexion");
						}else if ($result == 0) {
							$errorMsg = "Complexion type not found.";
						}else{
							$errorMsg = "Error occured, please try again.";
						}
					}
				}
			}else{
				header("location: ".APP_ROOT);
			}
			break;
		default:
			if (isset($_SESSION['loggedAdmin'])) {
				header("location: ".APP_ROOT."/?admin_dashboard");
			}else{
				header("location: ".APP_ROOT);
			}
			break;
	}
	require_once $view;
?>
