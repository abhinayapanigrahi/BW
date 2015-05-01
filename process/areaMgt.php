<?php
require_once("appMgt.php");

class areasProcessor extends applicationProcessor  {			

	
	private function getAreaById($areaID,$dbconn){

				
		$sql = "SELECT * FROM ".TABLE_AREA_MASTER." WHERE area_id = ".$areaID;
		$res = $this->queryExecuter($sql,$dbconn);
		
		return $res;
	}		
	
	public function getAllAreas($dbconn){		
		
		$sql_allAreas =  "SELECT s.* FROM ".TABLE_AREA_MASTER." as s left join ".TABLE_CITY_MASTER." as c on c.city_id = s.city_id order by s.city_id, s.area ASC";
				
		$res = $this->queryExecuter($sql_allAreas,$dbconn);
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
	
	public function getAreaListForCityID($params,$dbconn){
		$cityID = $params->getCityId();
					
		$sql_Login =  "SELECT * FROM ".TABLE_AREA_MASTER. " ORDER BY area ASC WHERE city_id = ".$cityID;
		
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
	
	public function addNewArea($params,$dbconn)
	{
		$cityID 		=	$params->getCityId();
		$areaName 		=	$params->getAreaName();

		$sql =  "INSERT INTO ".TABLE_AREA_MASTER." (city_id,area) VALUES ('".$cityID."','".$areaName."')";		
		$res = $this->NoNqueryExecuter($sql,$dbconn);
	
	}
		
	public function updateArea($params,$dbconn){
	
		$cityID 		=	$params->getCityId();
		$areaID		=	$params->getAreaId();
		$areaName 		=	$params->getAreaName();
	
		$sql_updateArea = "UPDATE ".TABLE_AREA_MASTER." SET area='".$areaName."' ,city_id='".$cityID."' WHERE area_id = ".$areaID;
		$res = $this->NoNqueryExecuter($sql_updateArea,$dbconn);

	}
	
		
}
?>