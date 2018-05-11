<?php
	define("APP_NAME", "matrimonial/admin");
	define("APP_ROOT", "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]/".APP_NAME);
	define("SERVER_ROOT", __dir__);
	define("ERROR_VIEW", SERVER_ROOT."\\app\\view\\error.php");
	define("ASSET_ROOT", "/test/app/view/asset");
	define("VIEW_ROOT", "/test/app/view");
	$controller = 'account';
	$action = 'login';
	if (count($_GET)>0) {
		$key = array_keys($_GET)[0];
		$path = explode("_", $key);
		if (count($path)==2) {
			$controller = $path[0];
			$action = $path[1];
		}
	}
	$file = SERVER_ROOT."\\app\\controller\\".$controller."_controller.php";
	if (file_exists($file)) {
		include_once $file;
	}else{
		include_once ERROR_VIEW;
	}
?>
