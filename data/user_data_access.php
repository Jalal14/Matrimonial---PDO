<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function insertSearchDataInDb($user,$entities){
		global $conn;
		$counter = 1;
		$total = sizeof($entities);
        $queryString = "INSERT INTO  tbl_search VALUES(null, :uid,";
        foreach ($entities as $entity) {
        	if ($entity == null) {
        		$entity = "null";
        	}
        	$queryString = $queryString.$entity;
        	if ($counter < $total) {
        		$queryString = $queryString. ",";
        	}
        	$counter= $counter + 1;
        }
        if (!isset($entities['gender'])) {
            $queryString = $queryString.",null";
        }
        $queryString = $queryString. ")";
        $query = $conn->prepare($queryString);
        $query->bindParam(":uid",$user['uid']);
        return executeNonQuery($query);
	}
	function addToFavoriteInDb($uid, $favoriteUser){
	    global $conn;
	    $query = $conn->prepare("INSERT INTO tbl_favorite VALUES(null ,:uid, :favoriteUser, :time)");
	    $query->bindParam(":uid", $uid);
	    $query->bindParam(":favoriteUser", $favoriteUser);
	    $time = date("Y-m-d");
	    $query->bindParam(":time", $time);
		return executeNonQuery($query);
	}
	function removeFromFavoriteInDb($uid, $favoriteUser){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_favorite WHERE uid= :uid AND favorite_user= :favoriteUser");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":favoriteUser", $favoriteUser);
		return executeNonQuery($query);
	}
    function isFriendReqSentInDb($uid, $friendUser){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_friend_req WHERE sender= :uid AND send_to= :friendUser");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":friendUser", $friendUser);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function isFriendInDb($uid, $friendUser){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_friend WHERE (send_to= :uid AND sender= :friendUser) OR (sender= :uid AND send_to= :friendUser)");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":friendUser", $friendUser);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function numOfFriendReqInDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_friend_req WHERE send_to= :uid");
        $query->bindParam(":uid", $uid);
        $result = executeQuery($query);
        return $result->rowCount();
    }
	function sendFriendReqInDb($uid, $friendUser){
	    global $conn;
	    $query = $conn->prepare("INSERT INTO tbl_friend_req VALUES(null, :uid, :friendUser, :date)");
	    $query->bindParam(":uid", $uid);
	    $query->bindParam(":friendUser", $friendUser);
	    $time = date("Y-m_d");
	    $query->bindParam(":date",$time);
		return executeNonQuery($query);
	}
	function cancelFriendReqInDb($uid, $friendUser){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_friend_req WHERE sender= :uid AND send_to= :friendUser");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":friendUser", $friendUser);
		return executeNonQuery($query);
	}
    function acceptFriendRequestInDb($uid, $friend){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_friend VALUES(null, :uid, :friend, :date)");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":friend", $friend);
        $date = date("Y-m-d");
        $query->bindParam(":date", $date);
        return executeNonQuery($query);
    }
	function unFriendInDb($uid, $favoriteUser){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_friend WHERE (send_to= :uid  AND sender= :favoriteUser) OR (sender= :uid AND send_to= :favoriteUser)");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":favoriteUser", $favoriteUser);
        return executeNonQuery($query);
	}
	function sendMessageTODb($message){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_message VALUES(null, :sender, :send_to, :time, :message,0)");
        $query->bindParam(":sender", $message['sender']);
        $query->bindParam(":send_to", $message['send_to']);
        $query->bindParam(":time", $message['time']);
        $query->bindParam(":message", $message['message']);
		return executeNonQuery($query);
	}
	function seenMessageInDb($uid, $sender){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_message SET is_seen=1 WHERE send_to= :uid");
        $query->bindParam(":uid", $uid);
		executeNonQuery($query);
	}
	function getUnseenMessageFromDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT COUNT(*) AS number,sender FROM tbl_message WHERE send_to= :uid AND is_seen=0 GROUP BY sender");
        $query->bindParam(":uid", $uid);
		$result = executeQuery($query);
		if ($result->rowCount() == 0) {
			return null;
		}
		while ($message = $result->fetch()){
		    $newMessages[] = $message;
        }
//		foreach ($result as $message) {
//			$newMessages[] = $message;
//		}
		return $newMessages;
	}
	function getAllMessageByIdFromDb($uid, $sender){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_message WHERE (sender= :uid AND send_to= :sender) OR (sender= :sender AND send_to= :uid) ORDER BY ID");
        $query->bindParam(":uid", $uid);
        $query->bindParam(":sender", $sender);
        $result = executeQuery($query);
		if ($result->rowCount() == 0) {
			return null;
		}
		while ($message = $result->fetch()){
			$messages[] = $message;
		}
		return $messages;
	}
	function hasUserHobbiesInDb($uid){global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_user_hobby WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
        $result = executeQuery($query);
		return $result->rowCount();
	}
	function insertUserHobbiesToDb($uid,$user){
	    global $conn;
        $counter = 1;
        $queryString = "INSERT INTO tbl_user_hobby VALUES ";
		foreach ($user['hobbies'] as $hobby) {
			$queryString = $queryString."( :uid,".$hobby.")";
			if ($counter<sizeof($user['hobbies'])) {
				$queryString = $queryString." , ";
			}
			$counter++;
		}
		$query = $conn->prepare($queryString);
		$query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function deleteUserHobbiesByIdInDb($uid){
	    global $conn;
	    $query = $conn->prepare("DELETE FROM tbl_user_hobby WHERE uid= :uid");
	    $query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function hasUserInterestsInDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_user_interest WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
		$result = executeQuery($query);
		return $result->rowCount();
	}
	function insertUserInterestsToDb($uid,$user){
	    global $conn;
        $counter = 1;
        $queryString = "INSERT INTO tbl_user_interest VALUES ";
		foreach ($user['interests'] as $interest) {
			$queryString = $queryString."( :uid,".$interest.")";
			if ($counter<sizeof($user['interests'])) {
				$queryString = $queryString." , ";
			}
			$counter++;
		}
		$query = $conn->prepare($queryString);
		$query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function deleteUserInterestsByIdInDb($uid){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_user_interest WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function hasUserMusicsInDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_user_music WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
		$result = executeQuery($query);
		return $result->rowCount();
	}
	function insertUserMusicsToDb($uid,$user){
	    global $conn;
        $counter = 1;
        $queryString = "INSERT INTO tbl_user_music VALUES ";
		foreach ($user['musics'] as $music) {
			$queryString = $queryString."( :uid,".$music.")";
			if ($counter<sizeof($user['musics'])) {
				$queryString = $queryString." , ";
			}
			$counter++;
		}
		$query = $conn->prepare($queryString);
		$query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function deleteUserMusicsByIdInDb($uid){
	    global $conn;
	    $query = $conn->prepare("DELETE FROM tbl_user_music WHERE uid= :uid");
	    $query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function hasUserSportsInDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_sports WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
		$result = executeQuery($query);
		return $result->rowCount();
	}
	function insertUserSportsToDb($uid,$user){
	    global $conn;
        $counter = 1;
        $queryString = "INSERT INTO tbl_user_sports VALUES ";
		foreach ($user['sports'] as $sport) {
			$queryString = $queryString."( :uid,".$sport.")";
			if ($counter<sizeof($user['sports'])) {
				$queryString = $queryString." , ";
			}
			$counter++;
		}
		$query = $conn->prepare($queryString);
		$query->bindParam(":uid", $uid);
		return executeNonQuery($query);
	}
	function deleteUserSportsByIdInDb($uid){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_user_sports WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
        return executeNonQuery($query);
	}
?>
