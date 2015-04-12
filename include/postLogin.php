<?php
require_once("process/authenticationMgt.php");
$auth=new authenticationProcessor();

if($auth->isNewRegistration()){
?>
<div class="dashBlocks requestPendings">
	<h4 class="message"><span>Congrats you registered successfully.</span></h4>		
</div>
<?php
}else{
?>
<h2>Your Dash Borad</h2>
<div class="leftBlock">
	<div class="dashBlocks requestPendings">
		<h3>Penidng Request For Service</h3>
	</div>
	<div class="dashBlocks ratings">
		<h3>Give rating to Services</h3>	
	</div>
</div>
<div class="leftBlock">
	<div class="dashBlocks hiredServices">
		<h3>Manage Served Jobs</h3>	
	</div>
	<div class="dashBlocks serviceFeedback">
		<h3>All Service Feedbacks</h3>		
	</div>
</div>
<div class="hidden">
<?php
}
require_once("bridges/services/func_getAllServiceStausList.php");
?>
</div>
<script id="tmpl_serviceFeedbackStaut" type="text/x-jquery-tmpl">
{{if serviceStatusList.length > 0}}
	<ul>
		{{each($key,$val) serviceStatusList}}
			{{if $val.deal_comment == ""}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="srvsDt">{{= $val.requstedOn }}</div>				
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>
<script id="tmpl_serviceRatingStaut" type="text/x-jquery-tmpl">
{{if serviceStatusList.length > 0}}
	<ul>
		{{each($key,$val) serviceStatusList}}
			{{if $val.avgRating == 0}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="srvsName">{{= $val.avgRating }}</div>					
					<div class="srvsDt">{{= $val.requstedOn }}</div>				
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>
<script id="tmpl_serviceRequestList" type="text/x-jquery-tmpl">
{{if serviceRequestList.length > 0}}
	<ul>
		{{each($key,$val) serviceRequestList}}
			{{if $val.deal_status == 0}}
				<li>
					<div class="cnt">{{= $key+1 }}</div>
					<div class="srvsName">{{= $val.service_name }}</div>
					<div class="requestBy">{{= $val.fullname }}</div>					
					<div class="srvsDt">{{= $val.requstedOn }}</div>				
				</li>
			{{/if}}
		{{/each}}	
	</ul>
{{/if}}
</script>