<?php require_once SERVER_ROOT."\\data\\information_data_access.php"; ?>
<?php
	function getAllDegree(){
		return getAllDegreeFromDb();
	}
	function getDegreeById($id){
		$degreeList = getAllDegreeFromDb();
		foreach ($degreeList as $degree) {
			if ($degree['id']==$id) {
				return $degree;
			}
		}
	}
	function insertDegree($degree){
		if (hasDegreeInDb($degree)==1) {
			return 0;
		}
		if (insertDegreeToDb($degree)==1) {
			return 1;
		}
		return -1;
	}
	function updateDegree($degree){
		if (hasDegreeIdInDb($degree)==1) {
			if(updateDegreeInDb($degree)==1){
				return 1;
			}
			return -1;
		}
		return 0;	
	}
	function getAllHobby(){
		return getAllHobbyFromDb();
	}
	function getHobbyById($id){
		$hobbyList = getAllHobbyFromDb();
		foreach ($hobbyList as $hobby) {
			if ($hobby['id']==$id) {
				return $hobby;
			}
		}
	}
	function insertHobby($hobby){
		if (hasHobbyInDb($hobby)==1) {
			return 0;
		}
		if (insertHobbyToDb($hobby)==1) {
			return 1;
		}
		return -1;
	}
	function updateHobby($hobby){
		if (hasHobbyIdInDb($hobby)==1) {
			if(updateHobbyInDb($hobby)==1){
				return 1;
			}
			return -1;
		}
		return 0;	
	}
	function getAllInterest(){
		return getAllInterestFromDb();
	}
	function getInterestyById($id){
		$interestList = getAllInterestFromDb();
		foreach ($interestList as $interest) {
			if ($interest['id']==$id) {
				return $interest;
			}
		}
	}
	function insertInterest($interest){
		if (hasInterestInDb($interest)==1) {
			return 0;
		}
		if (insertInterestToDb($interest)==1) {
			return 1;
		}
		return -1;
	}
	function updateInterest($interest){
		if (hasInterestIdInDb($interest)==1) {
			if(updateInterestInDb($interest)==1){
				return 1;
			}
			return -1;
		}
		return 0;	
	}
	function getAllMusic(){
		return getAllMusicFromDb();
	}
	function getMusicById($id){
		$musicList = getAllMusicFromDb();
		foreach ($musicList as $music) {
			if ($music['id']==$id) {
				return $music;
			}
		}
	}
	function insertMusic($music){
		if (hasMusicInDb($music)==1) {
			return 0;
		}
		if (insertMusicToDb($music)==1) {
			return 1;
		}
		return -1;
	}
	function updateMusic($music){
		if (hasMusicIdInDb($music)==1) {
			if(updateMusicInDb($music)==1){
				return 1;
			}
			return -1;
		}
		return 0;	
	}
	function getAllSport(){
		return getAllSportFromDb();
	}
	function getSportById($id){
		$sportList = getAllSportFromDb();
		foreach ($sportList as $sport) {
			if ($sport['id']==$id) {
				return $sport;
			}
		}
	}
	function insertSport($sport){
		if (hasSportInDb($sport)==1) {
			return 0;
		}
		if (insertSportToDb($sport)==1) {
			return 1;
		}
		return -1;
	}
	function updateSport($sport){
		if (hasSportIdInDb($sport)==1) {
			if(updateSportInDb($sport)==1){
				return 1;
			}
			return -1;
		}
		return 0;		
	}
	function getAllFamilyType(){
		return getAllFamilyTypeFromDb();
	}
	function getFamilyTypeById($id){
		$familyTypeList = getAllFamilyTypeFromDb();
		foreach ($familyTypeList as $familyType) {
			if ($familyType['id']==$id) {
				return $familyType;
			}
		}
	}
	function insertFamilyType($familyType){
		if (hasFamilyTypeInDb($familyType)==1) {
			return 0;
		}
		if (insertFamilyTypeToDb($familyType)==1) {
			return 1;
		}
		return -1;
	}
	function updateFamilyType($familyType)
	{
		if (hasFamilyTypeIdInDb($familyType)==1) {
			if(updateFamilyTypeInDb($familyType)==1){
				return 1;
			}
			return -1;
		}
		return 0;	
	}
	function getAllComplexion(){
		return getAllComplexionFromDb();
	}
	function getComplexionById($id){
		$complexionList = getAllComplexionFromDb();
		foreach ($complexionList as $complexion) {
			if ($complexion['id']==$id) {
				return $complexion;
			}
		}
	}
	function insertComplexion($complexion){
		if (hasComplexionInDb($complexion)==1) {
			return 0;
		}
		if (insertComplexionToDb($complexion)==1) {
			return 1;
		}
		return -1;
	}
	function updateComplexion($complexion){
		if (hasComplexionIdInDb($complexion)==1) {
			if(updateComplexionInDb($complexion)==1){
				return 1;
			}
			return -1;
		}
		return 0;
		
	}
?>