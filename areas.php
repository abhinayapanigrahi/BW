<?php  

	require_once("objectManagers/cityManager.php");	
	require_once("objectManagers/areaManager.php");
	require_once("process/cityMgt.php");
	require_once("process/areaMgt.php");

?>
<iframe name="submitForm" id="submitForm"></iframe>
<div class="areaMgtWraper">
	<div class="areaMgt">
		<h2>Area Manager</h2>
		<div class="message">
			<?php
			if(isset($_GET['msg']) && $_GET['msg'] !=""){
			?>
			<span>
				<?php echo "Area ".(($_GET['msg'] == 'u')?"updated":"added")." successfuly"; ?>
			</span>
			<?php
			}
			?>		
		</div>
			<form id="formAddArea" name="formAddArea" action="bridges/areas/func_addEditAreas.php" method="post" onsubmit="return formAreaValidate(this);">
				<div class="formRow">
					<label for="selectCity">City List</label>
				</div>
				<div class="formRow">
					<select id="selectCity" name="selectcity" onchange="">		
					<option value="">Select City</option>	
					<?php  
										
					$objCityProc = new citiesProcessor();
					/*$resCityList = $objCityProc->getAllCities($arrDBTaskManagement);
					echo $arrDBTaskManagement;*/
					$arrayCityList = array();
					//unset($arrDBTaskManagement['getArr']);
					$resCityList = $objCityProc->getAllCities($arrDBTaskManagement);
					//while($objCityList = mysql_fetch_object($resCityList)){
					foreach ($resCityList as $key => $value) {
						# code...
					
					//array_push($arrayCityList,array("city_id"=>$objCityList->city_id,"city"=>$objCityList->city));
					?>			
						<!-- <option value="<?php echo $objCityList->city_id; ?>"><?php echo $objCityList->city; ?></option> -->
						<option value="<?php echo $value['city_id']; ?>"><?php echo $value['city']; ?></option>
					<?php 	
					}
					?>
					</select>
					</div>		
				<div class="formRow">
					<label for="selectArea">Area List</label>
				</div>			
				<div class="formRow">
					<select id="selectArea" name="selectArea" onchange="">		
					<option value="" data-area="">Add New Area / Select to Update</option>	
					</select>
					</div>
					<div class="formRow">
						<label for="txtArea">Area name : </label>
					</div>
					<div class="formRow">					
						<input type="text" name="areaName" id="areaName" placeholder="Area Name" />
					</div>
					<div class="formRow">
						<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
						<input type="submit" id="btnAddNewArea" value="Add or Edit Area"/>
					</div>
	</form>
	</div>
	<?php
		$objArea = new areasProcessor();
		$arrDBTaskManagement["getArr"] = 1;
		$arrayArea = $objArea->getAllAreas($arrDBTaskManagement);
		
		
		//$arrAreaCityJSON = array("cityList"=>$arrayCityList,"areaList"=>$arrayArea);
		$arrAreaCityJSON = array("cityList"=>$resCityList,"areaList"=>$arrayArea);
	?>
	<div class="hidden"><script>
		var areaListJSON = <?php echo json_encode($arrAreaCityJSON); ?>;
		console.log(areaListJSON);
		
	</script></div>
</div>