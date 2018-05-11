<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getAllDegreeFromDb(){
	    global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_degree");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $degreeList[] = $row;
        }
        return $degreeList;
    }
    function hasDegreeInDb($degree){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_degree WHERE degree=lower(:degree)");
        $query->bindParam(":degree", $degree['degree']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasDegreeIdInDb($degree){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_degree WHERE id= :id");
	    $query->bindParam(":id", $degree['id']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
    function updateDegreeInDb($degree){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_degree SET degree= :degree WHERE id= :id");
        $query->bindParam(":degree", $degree['degree']);
        $query->bindParam(":id", $degree['id']);
		return executeNonQuery($query);
	}
	function insertDegreeToDb($degree){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_degree VALUES(null,:degree)");
        $query->bindParam(":degree", $degree['degree']);
		return executeNonQuery($query);
	}
	function getAllHobbyFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_hobby");
        $result =  executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $hobbyList[] = $row;
        }
        return $hobbyList;
    }
    function hasHobbyInDb($hobby){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_hobby WHERE name=lower(:name)");
	    $query->bindParam(":name", $hobby['name']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasHobbyIdInDb($hobby){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_hobby WHERE id= :name");
        $query->bindParam(":id", $hobby['id']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
    function updateHobbyInDb($hobby){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_hobby SET name= :name WHERE id= :id");
        $query->bindParam(":name", $hobby['name']);
        $query->bindParam(":id", $hobby['id']);
		return executeNonQuery($query);
	}
	function insertHobbyToDb($hobby){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_hobby VALUE(NULL, :name)");
        $query->bindParam(":name", $hobby['name']);
		return executeNonQuery($query);
	}
	function getAllInterestFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_interest");
        $result =  executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $interestList[] = $row;
        }
        return $interestList;
    }
    function hasInterestInDb($interest){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_interest WHERE name=lower( :name)");
	    $query->bindParam(":name", $interest['name']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasInterestIdInDb($interest){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_interest WHERE id= :id");
	    $query->bindParam(":id",$interest['id']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
    function updateInterestInDb($interest){
	    global $conn;
	    $query = $conn->prepare("UPDATE tbl_interest SET name= :name WHERE id= :id");
	    $query->bindParam(":name", $interest['name']);
	    $query->bindParam(":id", $interest['id']);
		return executeNonQuery($query);
	}
	function insertInterestToDb($interest){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_interest VALUES(null, :name)");
        $query->bindParam(":name", $interest['name']);
		return executeNonQuery($query);
	}
    function getAllMusicFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_music");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $musicList[] = $row;
        }
        return $musicList;
    }
    function hasMusicInDb($music){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_music WHERE name=lower( :name)");
        $query->bindParam(":name", $music['name']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasMusicIdInDb($music){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_music WHERE id= :id");
        $query->bindParam(":id", $music['id']);
		$result = executeQuery($query);
        return $result->rowCount();
	}
    function updateMusicInDb($music){
        global $conn;
        $query = $conn->prepare("UPDATE tbl_music SET name= :name WHERE id= :id");
        $query->bindParam(":name", $music['name']);
        $query->bindParam(":id", $music['id']);
		return executeNonQuery($query);
	}
	function insertMusicToDb($music){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_music VALUES(null,:name)");
        $query->bindParam(":name", $music['name']);
		return executeNonQuery($query);
	}
    function getAllSportFromDb(){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_sports");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $sportList[] = $row;
        }
        return $sportList;
    }
    function hasSportInDb($sport){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_sports WHERE name=lower( :name)");
        $query->bindParam(":name", $sport['name']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasSportIdInDb($sport){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_sports WHERE id= :id");
        $query->bindParam(":id", $sport['id']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
    function updateSportInDb($sport)
	{
        global $conn;
        $query = $conn->prepare("UPDATE tbl_sports SET name= :name WHERE id= :id");
        $query->bindParam(":id", $sport['id']);
        $query->bindParam(":name", $sport['name']);
		return executeNonQuery($query);
	}
	function insertSportToDb($sport){
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_sports VALUES(null,:name)");
        $query->bindParam(":name", $sport['name']);
		return executeNonQuery($query);
	}
	function getAllFamilyTypeFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_family_type");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $typeList[] = $row;
        }
        return $typeList;
    }
	function hasFamilyTypeInDb($familyType){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_family_type WHERE type=lower( :type)");
	    $query->bindParam(":type", $familyType['type']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasFamilyTypeIdInDb($familyType){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_family_type WHERE id= :id");
        $query->bindParam(":id", $familyType['id']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
    function updateFamilyTypeInDb($familyType)
	{
	    global $conn;
	    $query = $conn->prepare("UPDATE tbl_family_type SET type= :type WHERE id= :id");
	    $query->bindParam(":type", $familyType['type']);
	    $query->bindParam(":id", $familyType['id']);
		return executeNonQuery($query);
	}
	function insertFamilyTypeToDb($familyType)
	{
        global $conn;
        $query = $conn->prepare("INSERT INTO tbl_family_type VALUES(null, :type)");
        $query->bindParam(":type", $familyType['type']);
        return executeNonQuery($query);
	}
	function getAllComplexionFromDb(){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_complexion");
        $result = executeQuery($query);
        if ($result->rowCount() == 0){
            return null;
        }
        while ($row = $result->fetch()){
            $complexionList[] = $row;
        }
        return $complexionList;
    }
	function hasComplexionInDb($complexion){
	    global $conn;
	    $query = $conn->prepare("SELECT * FROM tbl_complexion WHERE type=lower( :type)");
	    $query->bindParam(":type", $complexion['type']);
		$result = executeQuery($query);
        return $result->rowCount();
    }
    function hasComplexionIdInDb($complexion){
        global $conn;
        $query = $conn->prepare("SELECT * FROM tbl_complexion WHERE id= :id");
        $query->bindParam(":id", $complexion['id']);
        $result = executeQuery($query);
        return $result->rowCount();
	}
    function updateComplexionInDb($complexion)
	{
        global $conn;
        $query = $conn->prepare("UPDATE tbl_complexion SET type= :type WHERE id= :id");
        $query->bindParam(":id", $complexion['id']);
        $query->bindParam(":type", $complexion['type']);
		return executeNonQuery($query);
	}
	function insertComplexionToDb($complexion)
	{
	    global $conn;
	    $query = $conn->prepare("INSERT INTO tbl_complexion VALUES(null,:type)");
	    $query->bindParam(":type", $complexion['type']);
		return executeNonQuery($query);
	}
?>