<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getAdminDetailsByUsernameFromDb($user)
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_admin_details WHERE uname= :uname");
        $query->bindParam(":uname", $user['uname']);
    	$rows = executeQuery($query);
        while($row = $rows->fetch()) {
            $newUser=$row;
        }
        return $newUser;
    }
    function getAllRegistrationFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM view_registration_req");
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
        $query = $conn->prepare("SELECT * FROM view_registration_req WHERE uid= :uid");
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
    function getAllGenderFromDb()
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_gender");
        $result = executeQuery($query);
        while ($row = $result->fetch()){
            $genderList[] = $row;
        }
        return $genderList;
    }
    function getAllBloodGroupFromDb()
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_blood");
        $result = executeQuery($query);
        while ($row = $result->fetch()){
            $bloodList[] = $row;
        }
        return $bloodList;
    }
?>