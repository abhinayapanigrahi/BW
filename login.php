<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bawarchiwala: Login</title>
		<?php 
		require_once("process/authenticationMgt.php");
		$objAuth = new authenticationProcessor();
		 echo $objAuth->isLogedIn();
		if($objAuth->isLogedIn()){
			header("location: index.php");
		}
		include("include/header_include.php"); ?>
</head>

<body>
<div class="Container">
	<div class="header">
		<?php include("include/header.php"); ?>
	</div>
	<!--login modal-->
		<iframe name="submitForm" id="submitForm"></iframe>
		<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog">
		  <div class="modal-content">
			  <div class="modal-header">				 
				  <h2 class="text-center">Login</h2>
			  </div>
			  <div class="modal-body">
				  <form class="form col-md-12 center-block" name="loginUser" id="loginUser" method="post" action="bridges/userLogin/func_userLogin.php">
					<div class="form-group">
					  <input type="text" class="form-control input-lg" placeholder="User Name" name="genUserName" id="genUserName" maxlength="200" autocomplete="off" />
					</div>
					<div class="form-group">
					  <input type="password" class="form-control input-lg" placeholder="Password" name="genUserPass" id="genUserPass" maxlength="200" autocomplete="off" />
					</div>
					<div class="form-group">
					  <input type="hidden" name="formsubmit" id="formsubmit" value="1">
					  <input type="submit" name="genUserLogin" id="genUserLogin" class="btn btn-primary btn-lg btn-block" value="Sign In" />
					  <span class="pull-right"><a href="#">Register</a></span><span><a href="#forgot" id="forgotPass">Forgot Password</a></span>
					</div>
				  </form>
			  </div>
			  <div class="modal-footer">
				  <div class="col-md-12">
					<div class="error message">
									<span>
										<?php
										$ch = $_REQUEST['msg'];
											switch($ch){
												case "errorLogin":
													echo "UserName or Password Are Wrong";
												break;
												case "loginAgain":
													echo "Login Agaian with Valid User Cridentials(empty values are restricted)";
												break;	
												case "logedOut":
													echo "Logged Out Successfuly";
												break;
												case "noAccess":
													echo "You donot have access to this Page";
												break;
											}
									?>
								</span>
							</div>							
							<script type="text/javascript">
							$(document).ready(function(){
								setTimeout('timeout_trigger()', 5000);
							});
							function timeout_trigger(){
								if($(".error,.message").length == 1){
									$(".error,.message").fadeOut("5",function(){
										//$(this).remove();
									});
								}
									
							}
							</script>
				  </div>	
			  </div>
		  </div>
		  </div>
		</div>
	<div class="footer">
			<?php 			
			include("include/footer.php"); ?>
	</div>
</div>
</body>
</html>
