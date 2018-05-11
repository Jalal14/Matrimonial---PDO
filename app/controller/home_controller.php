<?php
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	//$indexUrl = APP_ROOT."/index.php?{controller}_index";
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\user_service.php";
?>
<?php
	switch ($action){
		case 'index':
			$suggestUserList = getHomeUsers();
			$genderList = getAllGender();
			$religionList = getAllReligion();
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$suggestUserList = searchedUsers($_POST);
			}
			break;
		default:
			break;
	}
	require_once $view;
?>
