<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
    function insertRegistrationToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_registration_req VALUES(null, :fname, :mname, :lname, :uname, :dob, :blood, :gender, :email, :religion, :contact, :password)");
        $query->bindParam(":fname", $user['fname']);
        $query->bindParam(":mname", $user['mname']);
        $query->bindParam(":lname", $user['lname']);
        $query->bindParam(":uname", $user['uname']);
        $query->bindParam(":dob", $user['dob']);
        $query->bindParam(":blood", $user['blood']);
        $query->bindParam(":gender", $user['gender']);
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":religion", $user['religion']);
        $query->bindParam(":contact", $user['contact']);
        $query->bindParam(":password", $user['password']);
        return executeNonQuery($query);
    }
    function isEmailExistInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT uname FROM tbl_users WHERE email= :email");
        $query->bindParam(":email", $user['email']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function isValidDOBInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT uname FROM tbl_users WHERE email= :email  AND dob= :dob");
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":dob", $user['dob']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function permitLoginInDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET last_login= :date WHERE uname= :uname");
        $time = date("Y-m-d h:i:s");
        $query->bindParam(":date", $time);
        $query->bindParam(":uname", $user['uname']);
        return executeNonQuery($query);
    }
    function isRegistrationReqInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT uname FROM tbl_registration_req WHERE uname= :uname AND password=:pass");
        $query->bindParam(":uname", $user['uname']);
        $query->bindParam(":pass", $user['password']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function recoverPasswordInDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET password= :password WHERE email= :email");
        $query->bindParam(":password", $user['password']);
        $query->bindParam(":email", $user['email']);
        return executeNonQuery($query);
    }
    function isValidUserInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_users WHERE uname= :uname AND password= :password");
        $query->bindParam(":uname", $user['uname']);
        $query->bindParam(":password", $user['password']);
    	$result = executeQuery($query);
        return $result->rowCount();
  	}
    function updateUserInfoToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET fname= :fname,mname= :mname,lname= :lname,gender= :gender,dob= :dob,email= :email,number1= :number1,number2= :number2,height= :height, weight= :weight,complexion= :complexion, religion= :religion,marital_status= :marital_status,children= :children,bio= :bio WHERE uid= :uid");
        $query->bindParam(":fname", $user['fname']);
        $query->bindParam(":mname", $user['mname']);
        $query->bindParam(":lname", $user['lname']);
        $query->bindParam(":gender", $user['gender']);
        $query->bindParam(":dob", $user['dob']);
        $query->bindParam(":email", $user['email']);
        $query->bindParam(":number1", $user['number1']);
        $query->bindParam(":number2", $user['number2']);
        $query->bindParam(":height", $user['height']);
        $query->bindParam(":weight", $user['weight']);
        $query->bindParam(":complexion", $user['complexion']);
        $query->bindParam(":religion", $user['religion']);
        $query->bindParam(":marital_status", $user['marital_status']);
        $query->bindParam(":children", $user['children']);
        $query->bindParam(":bio", $user['bio']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function updatePasswordToDb($user,$pass){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET password= :pass WHERE uname= :uname");
        $query->bindParam(":pass", $pass);
        $query->bindParam(":uname", $user['uname']);
        return executeNonQuery($query);
    }
    function hasUserPerAddressInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_per_address_details WHERE per_uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function updateUserPerAddressToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_per_address SET per_house= :per_house,per_road= :per_road,per_area= :per_area,per_police_station= :per_police_station WHERE per_uid= :uid");
        $query->bindParam(":per_house", $user['per_house']);
        $query->bindParam(":per_road", $user['per_road']);
        $query->bindParam(":per_area", $user['per_area']);
        $query->bindParam(":per_police_station", $user['per_police_station']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function insertUserPerAddressToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_per_address VALUES(:uid, :per_house, :per_road, :per_area, :per_police_station");
        $query->bindParam(":uid", $user['uid']);
        $query->bindParam(":per_house", $user['per_house']);
        $query->bindParam(":per_road", $user['per_road']);
        $query->bindParam(":per_area", $user['per_area']);
        $query->bindParam(":per_police_station", $user['per_police_station']);
        return executeNonQuery($query);
    }
    function hasUserPrAddressInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_pr_address_details WHERE pr_uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function updateUserPrAddressToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_pr_address SET pr_house= :pr_house,pr_road= :pr_road,pr_area= :pr_area,pr_police_station= :pr_police_station WHERE pr_uid= :uid");
        $query->bindParam(":pr_house", $user['pr_house']);
        $query->bindParam(":pr_road", $user['pr_road']);
        $query->bindParam(":pr_area", $user['pr_area']);
        $query->bindParam(":pr_police_station", $user['pr_police_station']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function insertUserPrAddressToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_pr_address VALUES(:uid, :pr_house, :pr_road, :pr_area, :pr_police_station");
        $query->bindParam(":uid", $user['uid']);
        $query->bindParam(":pr_house", $user['pr_house']);
        $query->bindParam(":pr_road", $user['pr_road']);
        $query->bindParam(":pr_area", $user['pr_area']);
        $query->bindParam(":pr_police_station", $user['pr_police_station']);
        return executeNonQuery($query);
    }
    function hasUserEducationInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM view_user_education WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function insertUserEducationToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_education VALUES(:uid, :degree, :institution, :field, :passing_year");
        $query->bindParam(":uid", $user['uid']);
        $query->bindParam(":degree", $user['degree']);
        $query->bindParam(":institution", $user['institotion']);
        $query->bindParam(":field", $user['field']);
        $query->bindParam(":passing_year", $user['passing_year']);
        return executeNonQuery($query);
    }
    function updateUserEducationToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_education SET degree= :degree,institution= :institution,field= :field,passing_year= :passing_year WHERE uid= :uid");
        $query->bindParam(":degree", $user['degree']);
        $query->bindParam(":institution", $user['institotion']);
        $query->bindParam(":field", $user['field']);
        $query->bindParam(":passing_year", $user['passing_year']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function hasUserJobInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_job WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function insertUserJobToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_job VALUES(:uid, :designation, :company, :joinning_date");
        $query->bindParam(":uid", $user['uid']);
        $query->bindParam(":designation", $user['designation']);
        $query->bindParam(":company", $user['company']);
        $query->bindParam(":joinning_date", $user['joinning_date']);
        return executeNonQuery($query);
    }
    function updateUserJobToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_job SET designation= :designation,company= :company,joinning_date= :joinning_date WHERE uid= :uid");
        $query->bindParam(":designation", $user['designation']);
        $query->bindParam(":company", $user['company']);
        $query->bindParam(":joinning_date", $user['joinning_date']);
        $query->bindParam(":uid", $user['uid']);
        $res = executeNonQuery($query);
        return executeNonQuery($query);
    }
    function updateUserIncomeToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET annual_income= :annual_income WHERE uid= :uid");
        $query->bindParam(":annual_income", $user['annual_income']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function hasUserFamilyInDb($user){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_family WHERE uid= :uid");
        $query->bindParam(":uid", $user['uid']);
        $result = executeQuery($query);
        return $result->rowCount();
    }
    function insertUserFamilyToDb($user){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_family VALUES( :uid, :family_type, :father_name, :father_occupation, :father_income, :mother_name, :mother_occupation, :mother_income, :contact, :siblings");
        $query->bindParam(":uid", $user['uid']);
        $query->bindParam(":family_type", $user['family_type']);
        $query->bindParam(":father_name", $user['father_name']);
        $query->bindParam(":father_occupation", $user['father_occupation']);
        $query->bindParam(":father_income", $user['father_income']);
        $query->bindParam(":mother_name", $user['mother_name']);
        $query->bindParam(":mother_occupation", $user['mother_occupation']);
        $query->bindParam(":mother_income", $user['mother_income']);
        $query->bindParam(":contact", $user['contact']);
        $query->bindParam(":siblings", $user['siblings']);
        return executeNonQuery($query);
    }
    function updateUserFamilyToDb($user){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_family SET type=:family_type,father_name=:father_name,father_occupation=:father_occupation,father_income=:father_income,mother_name=:mother_name,mother_occupation=:mother_occupation,mother_income=:mother_income,contact=:contact,siblings=:siblings WHERE uid=:uid");
        $query->bindParam(":family_type", $user['family_type']);
        $query->bindParam(":father_name", $user['father_name']);
        $query->bindParam(":father_occupation", $user['father_occupation']);
        $query->bindParam(":father_income", $user['father_income']);
        $query->bindParam(":mother_name", $user['mother_name']);
        $query->bindParam(":mother_occupation", $user['mother_occupation']);
        $query->bindParam(":mother_income", $user['mother_income']);
        $query->bindParam(":contact", $user['contact']);
        $query->bindParam(":siblings", $user['siblings']);
        $query->bindParam(":uid", $user['uid']);
        return executeNonQuery($query);
    }
    function updatePropicToDb($user, $propic){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_users SET propic= :propic WHERE uname= :uname");
        $query->bindParam(":propic", $propic);
        $query->bindParam(":uname", $user['uname']);
        return executeNonQuery($query);
    }
?>