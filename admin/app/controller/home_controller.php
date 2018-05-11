<?php
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	//$indexUrl = APP_ROOT."/index.php?{controller}_index";
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\admin_service.php";
?>
<?php
	if (isset($_SESSION['loggedAdmin'])) {
		$number = numOfRegistrationRequest();
	}
	switch ($action) {
		case 'index':
			$suggestUserList = getHomeUsers();
			$genderList = getAllGender();
			$religionList = getAllReligion();
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$suggestUserList = getSearchedUsers($_POST);
			}
			break;
		default:
			break;
	}
	//require_once $view;
?>
