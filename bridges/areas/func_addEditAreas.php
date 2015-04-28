<?php
require_once("../../config.php");
require_once("../../objectManagers/areaManager.php");
require_once("../../process/areaMgt.php");

$objAreaProc = new areasProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$cityID 	= $_POST['selectCity'];
	$areaID 	= $_POST['selectArea'];
	$areaName	= $_POST['areaName']; 
	$act = "";

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$areaName = str_replace($replace_arr,"",$areaName);

	$objAreaMngr = new areaManager();
	
		$objAreaMngr->setCityId($cityID);
		$objAreaMngr->setAreaName($areaName);	
	if(!empty($areaID)){
		$objAreaMngr->setAreaId($areaID);
		$act = 'u';
		$objAreaProc->updateArea($objAreaMngr,$arrDBTaskManagement);
	}else{
		$act = 'a';	
		$areaID = $objAreaProc->addNewArea($objAreaMngr,$arrDBTaskManagement);
	}

	
		header("location: ../../manageMasters.php?mpg=ar&msg=".$act."&ctid=".$cityID."&arid=".$areaID);
	
}
?>