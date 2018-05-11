<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getUserDetailsByUsernameFromDb($user){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM view_registration WHERE uname=:uname");
	    $query->bindParam(":uname", $user['uname']);
    	$rows = executeQuery($query);
    	while ($row = $rows->fetch()){
            $newUser=$row;
        }
        return $newUser;
    }
    function getAllRegistrationFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_registration_req");
        $result = executeQuery($query);
        if ($result->rowCount()==0) {
            return null;
        }
        while($rows = $result->fetch()){
            $newRegistration[] = $rows;
        }
        return $newRegistration;
    }
    function getUserDetailsByIdFromDb($uid){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM view_registration WHERE uid=:uid");
	    $query->bindParam(":uid", $uid);
        $userList = executeQuery($query);
        if ($userList->rowCount() == 0) {
            return null;
        }
        while($user = $userList->fetch()) {
            $newUser=$user;
        }
        return $newUser;
    }
    function getAllUserFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM view_registration");
		$userList = executeQuery($query);
		while ($user = $userList->fetch()) {
			$newUserList[]=$user;
		}
		return $newUserList;
	}
    function getAllSearchdeDataByIdFromDb($uid, $tbl){
	    global $conn;
        $queryString = "SELECT * FROM view_".$tbl." WHERE uid=:uid GROUP BY ".$tbl." HAVING counter = (SELECT MAX(counter) FROM view_".$tbl.")";
        $query = $conn->prepare($queryString);
        $query->bindParam(":uid", $uid);
        $result = executeQuery($query);
        if ($result->rowCount() == 0) {
            return null;
        }
        while ($searched = $result->fetch()) {
            $searchData[] = $searched;
        }
        return $searchData;
    }
    function getAllRelGenDataByIdFromDb($uid, $tbl){
	    global $conn;
        $queryString = "SELECT * , COUNT(*) AS counter FROM tbl_search WHERE uid= :uid AND ".$tbl." IS NOT null GROUP BY ".$tbl." ORDER BY counter DESC";
        $query = $conn->prepare($queryString);
        $query->bindParam(":uid", $uid);
        $result = executeQuery($query);
        if ($result->rowCount() == 0) {
            return null;
        }
        while ($searched = $result->fetch()) {
            $searchData[] = $searched;
        }
        return $searchData;
    }
    function getSuggestedUsersFromDb($user, $favoriteList){
	    global $conn;
        $queryString = "SELECT * FROM view_registration WHERE uid NOT IN(:uid";
        if (isset($favoriteList)) {
            foreach ($favoriteList as $favorite) {
                 $queryString = $queryString.",".$favorite['favorite_user'];
             }
        }
        $queryString = $queryString.")";
        $query = $conn->prepare($queryString);
        $query->bindParam(":uid", $user['uid']);
        $userList = executeQuery($query);
        while ($user = $userList->fetch()) {
            $newUserList[]=$user;
        }
        return $newUserList;
    }
    function getSearchedUsersFromDb($entity){
	    global $conn;
        $condition = 0;
        $queryString = "SELECT * FROM view_registration WHERE ";
        if ($entity['minAge'] != null){
            $queryString = $queryString." age>=".$entity['minAge'];
            $condition++;
        }
        if ($entity['maxAge'] != null){
            $queryString = $queryString." AND age<=".$entity['maxAge'];
        }
        if ($entity['minHeight'] != null){
            if ($condition > 0) {
                $queryString = $queryString." AND ";
            }
            $condition++;
            $queryString = $queryString." height>=".$entity['minHeight'];
        }
        if ($entity['maxHeight'] != null){
            $queryString = $queryString." AND height<=".$entity['maxHeight'];
        }
        if ($entity['religion']!=null) {
            if ($condition > 0) {
                $queryString = $queryString." AND ";
            }
            $condition++;
            $queryString = $queryString." religion=".$entity['religion'];;
            $condition = true;
        }
        if (isset($entity['gender'])) {
            if ($condition > 0) {
                $queryString = $queryString." AND ";
            }
            $condition++;
            $queryString = $queryString." gender=".$entity['gender'];
        }
        if ($condition==0) {
            $queryString = $queryString." 1";
        }
        $query = $conn->prepare($queryString);
        $userList = executeQuery($query);
        if ($userList->rowCount() == 0) {
            return null;
        }
        while ($user = $userList->fetch()) {
            $newUserList[]=$user;
        }
        return $newUserList; 
    }
    function getPreviousSearchedByHeightFromDb($section,$min, $max,$gender, $religion){
	    global $conn;
        $queryString = "SELECT * FROM view_registration WHERE ".$section.">= :min AND ".$section."<= :max AND gender= :gender AND religion= :religion";
        $query = $conn->prepare($queryString);
        $query->bindParam(":min", $min);
        $query->bindParam(":max", $max);
        $query->bindParam(":gender", $gender);
        $query->bindParam(":religion", $religion);
        $result = executeQuery($query);
        if ($result->rowCount() == 0) {
            $queryString = "SELECT * FROM view_registration WHERE ".$section.">= :min OR ".$section."<= :max AND gender= :gender AND religion= :religion";
            $query = $conn->prepare($queryString);
            $query->bindParam(":min", $min);
            $query->bindParam(":max", $max);
            $query->bindParam(":gender", $gender);
            $query->bindParam(":religion", $religion);
            $result = executeQuery($query);
        }
        if ($result->rowCount() == 0) {
            return null;
        }
        while ($searched =  $result->fetch()) {
            $newSearched[] = $searched;
        }
        return $newSearched;
    }
    function getFavoriteListFromDb($uid){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_favorite WHERE uid= :uid");
	    $query->bindParam(":uid", $uid);
        $favoriteList = executeQuery($query);
        if ($favoriteList->rowCount() == 0) {
            return null;
        }
        while ($favorite = $favoriteList->fetch()) {
            $newFavoriteList[] = $favorite;
        }
        return $newFavoriteList;
    }
    function getInterestedUserListFromDb($uid){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_favorite WHERE favorite_user= :uid");
	    $query->bindParam(":uid", $uid);
        $favoriteList = executeQuery($query);
        if ($favoriteList->rowCount() == 0) {
            return null;
        }
        while ($favorite = $favoriteList->fetch()) {
            $newFavoriteList[] = $favorite;
        }
        return $newFavoriteList;
    }
    function getAllFavoriteUserDetails($favorite){
	    global $conn;
        $counter = 1;
        $queryString = "SELECT * FROM view_registration WHERE uid IN(";
        foreach ($favorite as $fav) {
            $queryString = $queryString.$fav['favorite_user'];
            if ($counter<sizeof($favorite)) {
                $queryString = $queryString.",";
            }
            $counter++;
        }
        $queryString = $queryString.")";
        $query = $conn->prepare($queryString);
        $userList = executeQuery($query);
        if ($userList->rowCount() == 0) {
            return null;
        }
        while ($user = $userList->fetch()) {
            $newUserList[]=$user;
        }
        return $newUserList;
    }
    function getFriendReqListFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_friend_req");
        $friendReqList = executeQuery($query);
        if ($friendReqList->rowCount() == 0) {
            return null;
        }
        while ($friendReq = $friendReqList->fetch()) {
            $newFriendReqList[] = $friendReq;
        }
        return $newFriendReqList;
    }
    function getFriendListFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_friend");
        $friendList = executeQuery($query);
        if ($friendList->rowCount() == 0) {
            return null;
        }
        while ($friend = $friendList->fetch()) {
            $newFriendList[] = $friend;
        }
        return $newFriendList;
    }
	function getUserGenderFromDb($user){
	    global $conn;
	    $query = $conn->prepare("SELECT tbl_gender.* FROM tbl_users, tbl_gender WHERE tbl_users.gender=tbl_gender.id AND uid= :uid");
	    $query->bindParam(":uid", $user['uid']);
        $genderList = executeQuery($query);
        while ($gender = $genderList->fetch()) {
            return $gender;
        }
    }
    function getUserReligionFromDb($user){
	    global $conn;
	    $query = $conn->prepare("SELECT tbl_religion.* FROM tbl_users, tbl_religion WHERE tbl_users.religion=tbl_religion.id AND uid= :uid");
	    $query->bindParam(":uid", $user['uid']);
        $religionList = executeQuery($query);
        while ($religion = $religionList->fetch()) {
            return $religion;
        }
    }
    function getUserBloodFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT tbl_blood.* FROM tbl_users, tbl_blood WHERE tbl_users.blood=tbl_blood.id AND uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $bloodList = executeQuery($query);
        while ($blood = $bloodList->fetch()) {
            return $blood;
        }
    }
    function getUserComplexionFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT tbl_complexion.* FROM tbl_users, tbl_complexion WHERE tbl_users.complexion=tbl_complexion.id AND uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $complexionList = executeQuery($query);
        while ($complexion = $complexionList->fetch()) {
            return $complexion;
        }
    }
    function getUserMaritalStatusFromDb($user){
	    global $conn;
	    $query = $conn->prepare("SELECT tbl_marital_status.* FROM tbl_users, tbl_marital_status WHERE tbl_users.marital_status=tbl_marital_status.id AND uid= :uid");
	    $query->bindParam(":uid", $user['uid']);
        $maritalList = executeQuery($query);
        while ($marital = $maritalList->fetch()) {
            return $marital;
        }
    }
    function getUserPerAddressFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_per_address_details WHERE per_uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $per_addressList = executeQuery($query);
        while ($per_address = $per_addressList->fetch()) {
            return $per_address;
        }
    }
    function getUserPrAddressFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_pr_address_details WHERE pr_uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $pr_addressList = executeQuery($query);
        while ($pr_address = $pr_addressList->fetch()) {
            return $pr_address;
        }
    }
    function getUserEducationFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_education WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $educationList = executeQuery($query);
        while ($education = $educationList->fetch()) {
            return $education;
        }
    }
    function getUserJobByIdFromDb($user){
	    global $conn;
	    $query = $conn->prepare("SELECT tbl_job.*, tbl_users.annual_income FROM tbl_job,tbl_users WHERE tbl_users.uid=tbl_job.uid AND tbl_job.uid=:uid");
	    $query->bindParam(":uid", $user['uid']);
        $jobList = executeQuery($query);
        while ($job = $jobList->fetch()) {
            return $job;
        }
    }
    function getAllReligionFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_religion");
        $result = executeQuery($query);
        while ($rel = $result->fetch()){
            $religionList[] = $rel;
        }
        return $religionList;
    }
    function getAllGenderFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_gender");
        $result = executeQuery($query);
        while ($gen= $result->fetch()){
            $genderList[] = $gen;
        }
        return $genderList;
    }
    function getAllBloodGroupFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_blood");
        $result = executeQuery($query);
        while ($blood= $result->fetch()){
            $bloodList[] = $blood;
        }
        return $bloodList;
    }
    function getAllComplexionFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_complexion");
        $result = executeQuery($query);
        while ($complexion= $result->fetch()){
            $complexionList[] = $complexion;
        }
        return $complexionList;
    }
    function getAllMaritalStatusFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_marital_status");
        $result = executeQuery($query);
        while ($status= $result->fetch()){
            $statusList[] = $status;
        }
        return $statusList;
    }
    function getAllFamilyTypeFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_family_type");
        $result = executeQuery($query);
        while ($type = $result->fetch()){
            $typeList[] = $type;
        }
        return $typeList;
    }
    function getUserFamilyInfoFromDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_family_details WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $familyList = executeQuery($query);
        while ($family = $familyList->fetch()) {
            return $family;
        }
    }
    function getAllPoliceStationFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_police_station");
        $result = executeQuery($query);
        while ($ps = $result->fetch()){
            $psList[] = $ps;
        }
        return $psList;
    }
    function getAllDistrictFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_district");
        $result = executeQuery($query);
        while ($district = $result->fetch()){
            $districtList[] = $district;
        }
        return $districtList;
    }
    function getAllDivisionFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_division");
        $result = executeQuery($query);
        while ($division = $result->fetch()){
            $divisionList[] = $division;
        }
        return $divisionList;
    }
    function getAllDegreeFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_degree");
        $result = executeQuery($query);
        while ($degree = $result->fetch()){
            $degreeList[] = $degree;
        }
        return $degreeList;
    }
    function getAllHobbiesFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_hobby");
        $result = executeQuery($query);
        while ($hobby = $result->fetch()){
            $hobbyList[] = $hobby;
        }
        return $hobbyList;
    }
    function getAllInterestsFromDb(){
	    global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_interest");
        $interests = executeQuery($query);
        while ($interest = $interests->fetch()) {
            $newInterestList[]= $interest;
        }
        return $newInterestList;
    }
    function getAllMusicsFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_music");
        $result = executeQuery($query);
        while ($music = $result->fetch()){
            $musicList[] = $music;
        }
        return $musicList;
    }
    function getAllSportsFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_sports");
        $result = executeQuery($query);
        while ($sport = $result->fetch()){
            $sportList[] = $sport;
        }
        return $sportList;
    }
    function getHobbiesByUidFromDb($uid){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM view_user_hobby WHERE uid= :uid");
	    $query->bindParam(":uid", $uid);
        $hobbies = executeQuery($query);
        if ($hobbies->rowCount() == 0){
            return null;
        }
        while ($hobby = $hobbies->fetch()){
            $newHobbyList[]= $hobby;
        }
        return $newHobbyList;
    }
    function getInterestsByUidFromDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_interest WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
        $interests = executeQuery($query);
        if ($interests->rowCount() == 0){
            return null;
        }
        while ($interest = $interests->fetch()){
            $userInterest[] = $interest;
        }
        return $userInterest;
    }
    function getMusicsByUidFromDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_music WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
        $musics = executeQuery($query);
        if ($musics->rowCount() == 0){
            return null;
        }
        while ($music = $musics->fetch()){
            $userMusic[]= $music;
        }
        return $userMusic;
    }
    function getSportsByUidFromDb($uid){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_sports WHERE uid= :uid");
        $query->bindParam(":uid", $uid);
        $sports = executeQuery($query);
        if ($sports->rowCount() == 0){
            return null;
        }
        while ($sport = $sports->fetch()){
            $userSport[]= $sport;
        }
        return $userSport;
    }
?>