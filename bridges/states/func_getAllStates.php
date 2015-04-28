<?php
require_once("../../config.php");
require_once("../../objectManagers/stateManager.php");
require_once("../../process/stateMgt.php");

$obj_StateList  = new statesProcessor();
$resStateList = $obj_StateList->getAllStates($arrDBTaskManagement);
$tempArr = array();
while($objStateList = mysql_fetch_object($resStateList)){
	array_push($tempArr, $objStateList);
}
echo $jsonStateList = json_encode($tempArr);
?>