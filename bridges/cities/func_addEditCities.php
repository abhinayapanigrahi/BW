<?php
require_once("../../config.php");
require_once("../../objectManagers/cityManager.php");
require_once("../../process/cityMgt.php");

$objCityProc = new citiesProcessor();
	
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$stateID 	= $_POST['selectState'];
	$cityID 	= $_POST['selectCity'];
	$cityName	= $_POST['cityName']; 
	$act = "";

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$cityName = str_replace($replace_arr,"",$cityName);

	$objCityMngr = new cityManager();
	
		$objCityMngr->setStateId($stateID);
		$objCityMngr->setCityName($cityName);	
	if(!empty($cityID)){
		$objCityMngr->setCityId($cityID);
		$act = 'u';
		$objCityProc->updateCity($objCityMngr,$arrDBTaskManagement);
	}else{
		$act = 'a';	
		$cityID = $objCityProc->addNewCity($objCityMngr,$arrDBTaskManagement);
	}

	
		header("location: ../../manageMasters.php?mpg=ct&msg=".$act."&stid=".$stateID."&ctid=".$cityID);
	
}
?>