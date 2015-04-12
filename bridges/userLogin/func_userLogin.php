<?php
//echo md5('abhipassword');
echo "abhi1";
require_once("../../config.php");
echo "abhi2";
require_once("../../objectManagers/userLoginManager.php");
echo "abhi3";
require_once("../../process/userMgt.php");

print_r($_POST);
if(isset($_POST['formsubmit']) && $_POST['formsubmit'] == 1)
{
	$userName = $_POST['genUserName'];
	$password = $_POST['genUserPass'];

	$replace_arr = array("#","/","\/","=",">","<","!","&","(",")");
	$userName = str_replace($replace_arr,"",$userName);
	$password = str_replace($replace_arr,"",$password);
	$objLUMngr = new userLoginManager();
	
	$objLUMngr->setUserName($userName);
	$objLUMngr->setPassword($password);

	$objLoginUser = new userLoginProcessor();
	$objLoginUser->checkLogin($objLUMngr,$arrDBTaskManagement);

}
?>