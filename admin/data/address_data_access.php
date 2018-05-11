<?php require_once SERVER_ROOT."\\data\\account_data_access.php" ?>
<?php
	function hasPoliceStationInDb($address)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM tbl_police_station WHERE name=lower(:name)");
		$query->bindParam(":name", $address['name']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
	function hasPoliceStationIdInDb($address){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_police_station WHERE id= :id");
        $query->bindParam(":id", $address['id']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
    function getAllPoliceStationFromDb()
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_police_station ORDER BY name");
        $result = executeQuery($query);
        while ($ps = $result->fetch()) {
        	$newPSList[]=$ps;
        }
        return $newPSList;
    }
	function insertPoliceStationToDb($address)
	{
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_police_station VALUES(null, :name, :district)");
        $query->bindParam(":name", $address['name']);
        $query->bindParam(":district", $address['district']);
		return executeNonQuery($query);
	}
	function updatePoliceStationInDb($address)
	{
        global $conn;
        $query = $conn->prepare("UPDATE tbl_police_station SET name= :name, district= :district WHERE id= :id");
        $query->bindParam(":name", $address['name']);
        $query->bindParam(":district", $address['district']);
        $query->bindParam(":id", $address['id']);
		return executeNonQuery($query);
	}
	function hasDistrictInDb($address){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_district WHERE name=lower(:name)");
        $query->bindParam(":name", $address['name']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
	function hasDistrictIdInDb($address){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_district WHERE id= :id");
        $query->bindParam(":id", $address['id']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
    function getAllDistrictFromDb()
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_district ORDER BY name");
        $result = executeQuery($query);
        while ($district = $result->fetch()) {
            $newDistrictList[]=$district;
        }
        return $newDistrictList;
    }
	function insertDistrictToDb($address){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_district VALUES(null, :name, :division)");
        $query->bindParam(":name", $address['name']);
        $query->bindParam(":division", $address['division']);
        return executeNonQuery($query);
	}
	function updateDistrictInDb($address){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_district SET name= :name, division= :division WHERE id= :id");
        $query->bindParam(":name", $address['name']);
        $query->bindParam(":division", $address['division']);
        $query->bindParam(":id", $address['id']);
        return executeNonQuery($query);
	}
	function hasDivisionInDb($address){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_division WHERE name=lower(:name)");
        $query->bindParam(":name", $address['name']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
	function hasDivisionIdInDb($address){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_division WHERE id= :id)");
        $query->bindParam(":id", $address['id']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
	function insertDivisionToDb($address){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_division VALUES(null, :name)");
        $query->bindParam(":name", $address['name']);
		return executeNonQuery($query);
	}
	function updateDivisionInDb($address){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_division SET name= :name WHERE id= :id");
        $query->bindParam(":name", $address['name']);
        return executeNonQuery($query);
	}
	function getAllDivisionFromDb()
    {
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_division ORDER BY name");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($division = $result->fetch()) {
        	$newDivisionList[]=$division;
        }
        return $newDivisionList;
    }


?>
