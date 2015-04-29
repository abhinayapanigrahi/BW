<?php  

	require_once("objectManagers/stateManager.php");	
	require_once("objectManagers/cityManager.php");
	require_once("process/stateMgt.php");
	require_once("process/cityMgt.php");

?>
<iframe name="submitForm" id="submitForm"></iframe>
<div class="cityMgtWraper">
	<div class="cityMgt">
		<h2>City Manager</h2>
		<div class="message">
			<?php
			if(isset($_GET['msg']) && $_GET['msg'] !=""){
			?>
			<span>
				<?php echo "City ".(($_GET['msg'] == 'u')?"updated":"added")." successfuly"; ?>
			</span>
			<?php
			}
			?>		
		</div>
			<form id="formAddCity" name="formAddCity" action="bridges/cities/func_addEditCities.php" method="post" onsubmit="return formCityValidate(this);">
				<div class="formRow">
					<label for="selectState">State List</label>
				</div>
				<div class="formRow">
					<select id="selectState" name="selectstate" onchange="">		
					<option value="">Select State</option>	
					<?php  
										
					$objStateProc = new statesProcessor();
					/*$resStateList = $objStateProc->getAllStates($arrDBTaskManagement);
					echo $arrDBTaskManagement;*/
					$arrayStateList = array();
					//unset($arrDBTaskManagement['getArr']);
					$resStateList = $objStateProc->getAllStates($arrDBTaskManagement);
					//while($objStateList = mysql_fetch_object($resStateList)){
					foreach ($resStateList as $key => $value) {
						# code...
					
					//array_push($arrayStateList,array("state_id"=>$objStateList->state_id,"state"=>$objStateList->state));
					?>			
						<!-- <option value="<?php echo $objStateList->state_id; ?>"><?php echo $objStateList->state; ?></option> -->
						<option value="<?php echo $value['state_id']; ?>"><?php echo $value['state']; ?></option>
					<?php 	
					}
					?>
					</select>
					</div>		
				<div class="formRow">
					<label for="selectCity">City List</label>
				</div>			
				<div class="formRow">
					<select id="selectCity" name="selectCity" onchange="">		
					<option value="" data-city="">Add New City / Select to Update</option>	
					</select>
					</div>
					<div class="formRow">
						<label for="txtCity">City name : </label>
					</div>
					<div class="formRow">					
						<input type="text" name="cityName" id="cityName" placeholder="City Name" />
					</div>
					<div class="formRow">
						<input type="hidden" id="formsubmit" name="formsubmit" value="1"/>
						<input type="submit" id="btnAddNewCity" value="Add or Edit City"/>
					</div>
	</form>
	</div>
	<?php
		$objCity = new citiesProcessor();
		$arrDBTaskManagement["getArr"] = 1;
		$arrayCity = $objCity->getAllCities($arrDBTaskManagement);
		
		
		//$arrCityStateJSON = array("stateList"=>$arrayStateList,"cityList"=>$arrayCity);
		$arrCityStateJSON = array("stateList"=>$resStateList,"cityList"=>$arrayCity);
	?>
	<div class="hidden"><script>
		var cityListJSON = <?php echo json_encode($arrCityStateJSON); ?>;
		console.log(cityListJSON);
		
	</script></div>
</div>