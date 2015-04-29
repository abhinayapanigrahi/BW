<?php
require_once("../../config.php");
require_once("../../objectManagers/cityManager.php");
require_once("../../process/cityMgt.php");

$obj_CityList  = new citiesProcessor();
$resCityList = $obj_CityList->getAllCities($arrDBTaskManagement);
$tempArr = array();
while($objCityList = mysql_fetch_object($resCityList)){
	array_push($tempArr, $objCityList);
}
echo $jsonCityList = json_encode($tempArr);
?>