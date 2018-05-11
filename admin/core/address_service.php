<?php require_once SERVER_ROOT."\\data\\address_data_access.php" ?>
<?php
	function getAllPoliceStation()
	{
		return getAllPoliceStationFromDb();
	}
	function getAllDistrict()
	{
		return getAllDistrictFromDb();
	}
	function getAllDivision()
	{
		return getAllDivisionFromDb();
	}

	function getPoliceStationById($id){
		$psList = getAllPoliceStationFromDb();
		foreach ($psList as $ps) {
			if ($ps['id']==$id) {
				return $ps;
			}
		}
	}
	function insertPoliceStation($address){
		if (hasPoliceStationInDb($address)==1) {
			return 0;
		}
		if(insertPoliceStationToDb($address)==1){
			return 1;
		}
		return -1;
	}
	function updatePoliceStation($address){
		if (hasPoliceStationIdInDb($address)==1) {
			if (updatePoliceStationInDb($address)==1) {
				return 1;
			}
			return -1;
		}
		return 0;
	}
	/**function deletePoliceStation($address){
		if (hasPoliceStationIdInDb($address)==1) {
			if (deletePoliceStationInDb($address)==1) {
				return 1;
			}
			return -1;
		}
		return 0;
	}**/
	function getDistrictById($id){
		$districtList = getAllDistrictFromDb();
		foreach ($districtList as $district) {
			if ($district['id']==$id) {
				return $district;
			}
		}
	}
	function insertDistrict($address)
	{
		if (hasDistrictInDb($address)==1) {
			return 0;
		}
		if (insertDistrictToDb($address)==1) {
			return 1;
		}
		return -1;
	}
	function updateDistrict($address)
	{
		if (hasDistrictIdInDb($address)==1) {
			if(updateDistrictInDb($address)==1){
				return 1;
			}
			return -1;
		}
		return 0;
		
	}
	function insertDivision($address){
		if (hasDivisionInDb($address)==1) {
			return 0;
		}
		if (insertDivisionToDb($address)==1) {
			return 1;
		}
		return -1;
	}
	function getDivisionById($id){
		$divisionList = getAllDivisionFromDb();
		foreach ($divisionList as $division) {
			if ($division['id']==$id) {
				return $division;
			}
		}
	}
	function updateDivision($address)
	{
		if (hasDivisionIdInDb($address)==1) {
			if(updateDivisionInDb($address)==1){
				return 1;
			}
			return -1;
		}
		return 0;
		
	}

?>