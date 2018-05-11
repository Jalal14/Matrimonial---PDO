<?php require_once SERVER_ROOT."\\data\\admin_data_access.php"; ?>
<?php require_once SERVER_ROOT."\\data\\get_admin_data_access.php"; ?>

<?php
	function getNumberOfUser(){
		$number = getAllUserFromDb();
		return sizeof($number);
	}
	function getNumberOfActiveUser(){
		return getActiveUserFromDb();
	}
	function numOfRegistrationRequest(){
		$result = getAllRegistrationFromDb();
		if (isset($result)) {
			return sizeof($result);
		}
		return 0;
	}
	function getAllRegistrationRequest(){
		$result = getAllRegistrationFromDb();
		if (isset($result)) {
			return $result;
		}
		return null;
	}
	function getUserDetailsById($id){
		$userList = getUserDetailsByIdFromDb($id);
		if ($userList==null) {
			$userList = getAllUserFromDb();
			foreach ($userList as $users) {
				if ($users['uid'] == $id) {
					return $users;
				}
			}
		}
		return $userList;
	}
	function insertUser($user){
		$result = removeRegistrationFromDb($user);
		if ($result != 1) {
			return "Registration failed.try again";
		}
		$result = insertUserToDb($user);
		if ($result == 1) {
			return 1;
		}else{
			return "Registration failed.try again";
		}
	}
	function rejectRegistration($user){
		$result = removeRegistrationFromDb($user);
		if ($result = 1) {
			return 1;
		}
		return "Failed.try again";
	}
	/**function getHomeUsers()
	{
		$userList = getAllUserFromDb();
		return getRandomUsers($userList);
	}
	function getRandomUsers($userList)
	{
		$size = sizeof($userList);
		$len = 5;
		if ($size<5) {
			$len = $size;
		}
		$indices = [];
		foreach (range(0, $len - 1) as $i) {
		    while(in_array($num = mt_rand(0, $size-1), $indices));
		    $indices[] = $num;
		    $newUserList[] = $userList[$num];
		}
		return $newUserList;
	}
	function getSearchedUsers($entity)
	{

        if ($entity['minAge'] == null){
            $entity['minAge'] = 18;
        }
        if ($entity['maxAge'] == null){
            $entity['maxAge'] = 100;
        }
        if ($entity['minHeight'] == null){
            $entity['minHeight'] = 3;
        }
        if ($entity['maxHeight'] == null){
            $entity['maxHeight'] = 10;
        }
		return getSearchedUsersFromDb($entity);
	}
	function getUserDetailsById($id)
	{
		$userList = getAllUserFromDb();
		foreach ($userList as $users) {
			if ($users['uid'] == $id) {
				return $users;
			}
		}
	}
	function getAllHobby()
	{
		return getAllHobbyFromDb();
	}
	function getAllInterest()
	{
		return getAllInterestFromDb();
	}
	function getAllMusic()
	{
		return getAllMusicFromDb();
	}
	function getAllSport()
	{
		return getAllSportFromDb();
	}**/
?>
