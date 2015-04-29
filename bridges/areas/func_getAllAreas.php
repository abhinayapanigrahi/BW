<?php
require_once("../../config.php");
require_once("../../objectManagers/areaManager.php");
require_once("../../process/areaMgt.php");

$obj_AreaList  = new areasProcessor();
$resAreaList = $obj_AreaList->getAllAreas($arrDBTaskManagement);
$tempArr = array();
while($objAreaList = mysql_fetch_object($resAreaList)){
	array_push($tempArr, $objAreaList);
}
echo $jsonAreaList = json_encode($tempArr);
?>