<?php require_once SERVER_ROOT."\\data\\user_data_access.php"; ?>
<?php require_once SERVER_ROOT."\\data\\get_user_data_access.php"; ?>

<?php
	function getHomeUsers(){
		$userList = getAllUserFromDb();
		return getRandomUsers($userList);
	}
	function getSuggestedUsers($user){
		$favoriteList = getFavoriteListFromDb($user['uid']);
		$suggestedUsers = getSuggestedUsersFromDb($user, $favoriteList);
		return getRandomUsers($suggestedUsers);
	}
	function getSearchedUsers($user,$entity){
		insertSearchDataInDb($user,$entity);
		return getSearchedUsersFromDb($entity);	
	}
	function getPreviousSearched($user){
		$results = getAllSearchdeDataByIdFromDb($user['uid'], "min_age");
		if (isset($results)) {
			foreach ($results as $result) {
				$min_age = $result['min_age'];
			}
		}
		$results = getAllSearchdeDataByIdFromDb($user['uid'], "max_age");
		if (isset($results)) {
			foreach ($results as $result) {
				$max_age = $result['max_age'];
				break;
			}
		}
		$results = getAllSearchdeDataByIdFromDb($user['uid'], "min_height");
		if (isset($results)) {
			foreach ($results as $result) {
				$min_height = $result['min_height'];
			}
		}
		$results = getAllSearchdeDataByIdFromDb($user['uid'], "max_height");
		if (isset($results)) {
			foreach ($results as $result) {
				$max_height = $result['max_height'];
				break;
			}
		}
		$results = getAllRelGenDataByIdFromDb($user['uid'], "religion");
		if (isset($results)) {
			foreach ($results as $result) {
				$religion = $result['religion'];
				break;
			}
		}
		$results = getAllRelGenDataByIdFromDb($user['uid'], "gender");
		if (isset($results)) {
			foreach ($results as $result) {
				$gender = $result['gender'];
				break;
			}
		}
		if (isset($min_height) && isset($max_height)) {
			$results = getPreviousSearchedByHeightFromDb("height",$min_height, $max_height,$gender, $religion);
			foreach ($results as $result) {
				$preSearched['height'] = $result;
			}
		}
		if (isset($min_age) && isset($max_age)) {
			$results = getPreviousSearchedByHeightFromDb("age",$min_age, $max_age,$gender, $religion);
			foreach ($results as $result) {
				$preSearched['age'] = $result;
			}
		}
		if (isset($preSearched)) {
			return $preSearched;
		}
		return null;
	}
	function getRandomUsers($userList){
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
	function isFavoriteUser($uid,$favoriteUser){
		$favoriteList = getAllFavoriteUsersById($uid);
		if (!isset($favoriteList)) {
			return false;
		}
		foreach ($favoriteList as $favorite) {
			if ($favorite['uid'] == $favoriteUser) {
				return true;
			}
		}
		return false;
	}
	function getAllFavoriteUsersById($uid){
		$result = getFavoriteListFromDb($uid);
		if (isset($result)) {
			foreach ($result as $favUser) {
				if ($favUser['uid'] == $uid) {
					$newFavoriteList[] = getUserDetailsByIdFromDb($favUser['favorite_user']);
				}
			}
		}
		if (isset($newFavoriteList)) {
			return $newFavoriteList;
		}
		return null;
	}
	function getAllInterestedUsersById($uid){
		$result = getInterestedUserListFromDb($uid);
		if (isset($result)) {
			foreach ($result as $favUser) {
				$newFavoriteList[] = getUserDetailsByIdFromDb($favUser['uid']);
			}
		}
		if (isset($newFavoriteList)) {
			return $newFavoriteList;
		}
		return null;
	}
	function addToFavorite($uid, $favoriteUser){
		$favoriteList = getFavoriteListFromDb($uid);
		if (isset($favoriteList)) {
			foreach ($favoriteList as $favorite) {
				if ($favorite['favorite_user'] == $favoriteUser) {
					return "User already in your favorite list.";
				}
			}
		}
		$result = addToFavoriteInDb($uid, $favoriteUser);
		if ($result==1) {
			return "Successfully added to favorite list.";
		}
		return "Error occured.";
	}
	function removeFromFavorite($uid, $favoriteUser){
		$favoriteList = getFavoriteListFromDb($uid);
		if (isset($favoriteList)) {
			foreach ($favoriteList as $favorite) {
				if ($favorite['favorite_user'] == $favoriteUser) {
					$result = removeFromFavoriteInDb($uid, $favoriteUser);
					if ($result==1) {
						return "Successfully removed from favorite list.";
					}
				}
			}
		}else{
			return "Error occured.";
		}
		return "User not in your favorite list.";
	}
	function isFriendReqSent($uid,$friendUser){
		$isReqSent = isFriendReqSentInDb($uid, $friendUser);
		if ($isReqSent==1) {
			return true;
		}
		return false;
	}
	function isFriend($uid,$friendUser){
		$isFriend = isFriendInDb($uid, $friendUser);
		if ($isFriend==1) {
			return true;
		}
		return false;
	}
	function getAllFriendReqSentById($uid){
		$result = getFriendReqListFromDb();
		if (isset($result)) {
			foreach ($result as $favUser) {
				if ($favUser['sender'] == $uid) {
					$newFavoriteList[] = getUserDetailsByIdFromDb($favUser['send_to']);
				}
			}
		}
		
		if (isset($newFavoriteList)) {
			return $newFavoriteList;
		}
		return null;
	}
	function getAllFriendReqById($uid){
		$result = getFriendReqListFromDb();
		if (isset($result)) {
			foreach ($result as $favUser) {
				if ($favUser['send_to'] == $uid) {
					$newFavoriteList[] = getUserDetailsByIdFromDb($favUser['sender']);
				}
			}
		}
		if (isset($newFavoriteList)) {
			return $newFavoriteList;
		}
		return null;
	}
	function numOfFriendReq($uid){
		return numOfFriendReqInDb($uid);
	}
	function sendFriendReq($uid, $friendUser){
		if (isFriendReqSent($uid,$friendUser)) {
			return "You sent a friend request, please wait for response.";
		}
		if (isFriend($uid,$friendUser)) {
			return "Already in your friend list.";
		}
		$result = sendFriendReqInDb($uid, $friendUser);
		if ($result==1) {
			return "Friend request sent.";
		}
		return "Error occured.";
	}
	function cancelFriendReq($uid, $friendUser){
		if (!isFriendReqSent($uid,$friendUser)) {
			return "You didn't send request.";
		}
		$result = cancelFriendReqInDb($uid, $friendUser);
		if ($result==1) {
			return "Request cancel.";
		}
		return "Error occured.";
	}
	function acceptFriendRequest($uid, $friendUser){
		if (isFriend($uid, $friendUser)) {
			return "You are already friend";
		}
		$result = cancelFriendReqInDb($friendUser, $uid);
		if ($result == 1) {
			$result = acceptFriendRequestInDb($friendUser, $uid);
			if ($result==1) {
				return "You are now friend.";
			}
		}
		return "Error occured";
	}
	function rejectFriendRequest($uid, $friendUser){
		if (isFriendReqSentInDb($friendUser, $uid)) {
			$result = cancelFriendReqInDb($friendUser, $uid);
			if ($result == 1) {
				return "Friend request rejected.";
			}
		}
		return "Error occured";
	}
	function unFriend($uid, $friendUser){
		if (isFriend($uid, $friendUser)) {
			if (unFriendInDb($uid, $friendUser)==1) {
				return "You just removed from your friend list";
			}
		}
		return "User not in your friend list.";
	}
	function getAllFriendById($uid){
		$result = getFriendListFromDb();
		if (isset($result)) {
			foreach ($result as $favUser) {
				if ($favUser['send_to'] == $uid) {
					$newFriendList[] = getUserDetailsByIdFromDb($favUser['sender']);
				}else if ($favUser['sender'] == $uid) {
					$newFriendList[] = getUserDetailsByIdFromDb($favUser['send_to']);
				}
			}
		}
		if (isset($newFriendList)) {
			return $newFriendList;
		}
		return null;
	}
	function sendMessage($message){
		return sendMessageToDb($message);
	}
	function getUnseenMessage($uid){
		return getUnseenMessageFromDb($uid);
	}
	function getAllMessageById($uid, $sender){
		seenMessageInDb($uid, $sender);
		return getAllMessageByIdFromDb($uid, $sender);
	}
	function updateUserHobbiesById($uid,$user){
		$result = hasUserHobbiesInDb($uid);
		if ($result>0) {
			$rowDeleted = deleteUserHobbiesByIdInDb($uid);
			$_SESSION['loggedUser']['hobbies']= getHobbiesByUidFromDb($uid);
			if ($rowDeleted>0) {
				$result = insertUserHobbiesToDb($uid,$user);
				$_SESSION['loggedUser']['hobbies']= getHobbiesByUidFromDb($uid);
				if ($result>0) {
					return "Successfully updated";
				}
			}
		}else{
			$result = insertUserHobbiesToDb($uid,$user);
			$_SESSION['loggedUser']['interests']= getHobbiesByUidFromDb($uid);
			if ($result>0) {
				return "Successfully updated";
			}
		}
		return "Error occured, please try again.";
	}
	function updateUserInterestsById($uid,$user){
		$result = hasUserInterestsInDb($uid);
		if ($result>0) {
			$rowDeleted = deleteUserInterestsByIdInDb($uid);
			$_SESSION['loggedUser']['interests']= getInterestsByUid($uid);
			if ($rowDeleted>0) {
				$result = insertUserInterestsToDb($uid,$user);
				$_SESSION['loggedUser']['interests']= getInterestsByUid($uid);
				if ($result>0) {
					return "Successfully updated";
				}
			}
		}else{
			$result = insertUserInterestsToDb($uid,$user);
			$_SESSION['loggedUser']['interests']= getInterestsByUid($uid);
			if ($result>0) {
				return "Successfully updated";
			}
		}
		return "Error occured, please try again.";
	}
	function updateUserMusicsById($uid,$user){
		$result = hasUserMusicsInDb($uid);
		if ($result>0) {
			$rowDeleted = deleteUserMusicsByIdInDb($uid);
			$_SESSION['loggedUser']['musics']= getMusicsByUid($uid);
			if ($rowDeleted>0) {
				$result = insertUserMusicsToDb($uid,$user);
				$_SESSION['loggedUser']['musics']= getMusicsByUid($uid);
				if ($result>0) {
					return "Successfully updated";
				}
			}
		}else{
			$result = insertUserMusicsToDb($uid,$user);
			$_SESSION['loggedUser']['musics']= getMusicsByUid($uid);
			if ($result>0) {
				return "Successfully updated";
			}
		}
		return "Error occured, please try again.";
	}
	function updateUserSportsById($uid,$user){
		$result = hasUserSportsInDb($uid);
		if ($result>0) {
			$rowDeleted = deleteUserSportsByIdInDb($uid);
			$_SESSION['loggedUser']['sports']= getSportsByUid($uid);
			if ($rowDeleted>0) {
				$result = insertUserSportsToDb($uid,$user);
				$_SESSION['loggedUser']['sports']= getSportsByUid($uid);
				if ($result>0) {
					return "Successfully updated";
				}
			}
		}else{
			$result = insertUserSportsToDb($uid,$user);
			$_SESSION['loggedUser']['sports']= getSportsByUid($uid);
			if ($result>0) {
				return "Successfully updated";
			}
		}
		return "Error occured, please try again.";
	}
	function getHobbiesByUid($uid){
		return  getHobbiesByUidFromDb($uid);
	}
	function getInterestsByUid($uid){
		return getInterestsByUidFromDb($uid);
	}
	function getMusicsByUid($uid){
		return getMusicsByUidFromDb($uid);
	}
	function getSportsByUid($uid){
		return getSportsByUidFromDb($uid);
	}
	function getAllHobbies(){
		return getAllHobbiesFromDb();
	}
	function getAllInterests(){
		return getAllInterestsFromDb();
	}
	function getAllMusics(){
		return getAllMusicsFromDb();
	}
	function getAllSports(){
		return getAllSportsFromDb();
	}
?>
