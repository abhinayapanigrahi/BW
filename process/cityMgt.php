<?php
require_once("appMgt.php");

class citiesProcessor extends applicationProcessor  {			

	
	private function getCityById($cityID,$dbconn){

				
		$sql = "SELECT * FROM ".TABLE_CITY_MASTER." WHERE city_id = ".$cityID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	public function getAllCities($dbconn){		
		
		$sql_allCities =  "SELECT s.* FROM ".TABLE_CITY_MASTER." as s left join ".TABLE_STATE_MASTER." as c on c.state_id = s.state_id order by s.state_id, s.city ASC";
				
		$res = $this->queryExecuter($sql_allCities,$dbconn);
		if(empty($dbconn["getArr"])){
			return $res; 
		}else{
			$tmpArr = array();
			while($obj = mysql_fetch_assoc($res)){
				array_push($tmpArr,$obj);
			}
			return $tmpArr;
		}
	}
	
	public function getCityListForStateID($params,$dbconn){
		$stateID = $params->getStateId();
					
		$sql_Login =  "SELECT * FROM ".TABLE_CITY_MASTER. " ORDER BY city ASC WHERE state_id = ".$stateID;
		
		$res = $this->queryExecuter($sql_Login,$dbconn);
		if(empty($dbconn["getArr"])){
			return $res; 
		}else{
			$tmpArr = array();
			while($obj = mysql_fetch_assoc($res)){
				array_push($tmpArr,$obj);
			}
			return $tmpArr;
		}
	}
	
	public function addNewCity($params,$dbconn)
	{
		$stateID 		=	$params->getStateId();
		$cityName 		=	$params->getCityName();

		$sql =  "INSERT INTO ".TABLE_CITY_MASTER." (state_id,city) VALUES ('".$stateID."','".$cityName."')";		
		$res = $this->NoNqueryExecuter($sql,$dbconn);
	
	}
		
	public function updateCity($params,$dbconn){
	
		$stateID 		=	$params->getStateId();
		$cityID		=	$params->getCityId();
		$cityName 		=	$params->getCityName();
	
		$sql_updateCity = "UPDATE ".TABLE_CITY_MASTER." SET city='".$cityName."' ,state_id='".$stateID."' WHERE city_id = ".$cityID;
		$res = $this->NoNqueryExecuter($sql_updateCity,$dbconn);

	}
	
		
}
?>