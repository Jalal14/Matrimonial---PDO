<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
    function insertUserToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_users VALUES(null, :fname, :mname, :lname, :uname, :dob, :blood, :gender, :email, :number1,null, :password, :propic,null,null,null, :religion,null,null,null,null,'0000-00-00 00:00:00')");
        $query->bindParam(":fname", $user['fname']);
        $query->bindParam(":mname", $user['mname']);
        $query->bindParam(":lname", $user['lname']);
        $query->bindParam(":uname", $user['uname']);
        $query->bindParam(":dob", $user['dob']);
        $query->bindParam(":blood", $user['blood']);
        $query->bindParam(":gender", $user['gender']);
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":number1", $user['number1']);
        $query->bindParam(":password", $user['password']);
        $query->bindParam(":propic", $user['propic']);
        $query->bindParam(":religion", $user['religion']);
        return executeNonQuery($query);
    }
    function removeRegistrationFromDb($user){
        global $conn;
        $query = $conn->prepare("DELETE FROM tbl_registration_req WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function isEmailExistInDb($user)
    {
        global $conn;
        $query = $conn->prepare("SELECT uname FROM tbl_admin WHERE email= :email");
        $query->bindParam(":email", $user['email']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function isValidDOBInDb($user)
    {
        global $conn;
        $query = $conn->prepare("SELECT uname FROM tbl_admin WHERE email= :email AND dob= :dob");
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":dob", $user['dob']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function recoverPasswordInDb($user)
    {
        global $conn;
        $query = $conn->prepare("UPDATE tbl_admin SET password= :password WHERE email= :email");
        $query->bindParam(":password", $user['password']);
        $query->bindParam(":email", $user['email']);
        return executeNonQuery($query);
    }
    function isValidAdminInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_admin_details WHERE uname= :uname AND password= :password");
        $query->bindParam(":uname", $user['uname']);
        $query->bindParam(":password", $user['password']);
    	$result = executeQuery($query);
        return $result->rowCount();
  	}
    function updateAdminInfoToDb($user)
    {
        global $conn;
        $query = $conn->prepare("UPDATE tbl_admin SET fname= :fname,mname= :mname,lname= :lname,gender= :gender,blood= :blood,email= :email,number1= :number1,number2= :number2 WHERE aid= :uid");
        $query->bindParam(":fname", $user['fname']);
        $query->bindParam(":mname", $user['mname']);
        $query->bindParam(":lname", $user['lname']);
        $query->bindParam(":gender", $user['gender']);
        $query->bindParam(":blood", $user['blood']);
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":number1", $user['number1']);
        $query->bindParam(":number2", $user['number2']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function updatePasswordToDb($user,$pass)
    {
        global $conn;
        $query = $conn->prepare("UPDATE tbl_admin SET password= :pass WHERE uname= :uname");
        $query->bindParam(":pass", $pass);
        $query->bindParam(":uname", $user['uname']);
        return executeNonQuery($query);
    }
    function updatePropicToDb($user, $propic)
    {
        global $conn;
        $query = $conn->prepare("UPDATE tbl_admin SET propic= :propic WHERE uname= :uname");
        $query->bindParam(":propic", $propic);
        $query->bindParam(":uname", $user['uname']);
        return executeNonQuery($query);
    }
?>