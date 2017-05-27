<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop Manager | Registration</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link rel="icon" href="images/icon.png">

</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="./">
			  		Shop Manager
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="./">
							Access your account
						</a></li>

						

						<li><a href="reset-password.php">
							Forgot your password?
						</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>



	<div class="wrapper" style="background-image: url(images/back2.jpg);">
		<div class="container" >
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="action/new-shop.php" method="POST">
						<div class="module-head">
							<h3>Register your shop</h3>
						</div>
						<div class="module-body">
													<?php
					
								  
								if(isset($_GET['err'])) {
									print '
									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										'.$_GET['err'].' 
									</div>
									';
								}else{
									
								}
								
								if(isset($_GET['in'])) {
									print '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										'.$_GET['err'].' 
									</div>
									';
								}else{
									
								}
								?>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="email" id="inputEmail" placeholder="Email Address" name="email" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="txt_firstCapital" placeholder="Shop Name" name="shopname" required>
									
								</div>
							</div>
							
							
		
							
																				<div class="control-group">
								<div class="controls row-fluid">
								<select name="currency" class="span12" required>
								<option value="">Please select currency</option>
								<?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM countries ORDER BY currency";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['iso'].'">'.$row['currency'].' - '.$row['iso'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
							
								</select>
								
								</div>
							</div>
							
																											<div class="control-group">
								<div class="controls row-fluid">
								<select name="timezone" class="span12" required>
								<option value="">Please select Timezone</option>
							  <optgroup label="Africa">
							  								<?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Africa' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                             </optgroup>
                             <optgroup label="America">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'America' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                              </optgroup>
							 <optgroup label="Antarctica">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Antarctica' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                             </optgroup>
                             <optgroup label="Arctic">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Arctic' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                              </optgroup>
							  <optgroup label="Asia">
							  <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Asia' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                             </optgroup>
                             <optgroup label="Atlantic">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Atlantic' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                              </optgroup>
							 <optgroup label="Australia">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Australia' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                             </optgroup>
                             <optgroup label="Europe">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Europe' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                              </optgroup>
							  <optgroup label="Indian">
							  <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Indian' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                             </optgroup>
                             <optgroup label="Pacific">
							 <?php
								include 'config/db_config.php';
								
								$sql = "SELECT * FROM timezones  WHERE continet = 'Pacific' ORDER BY timezone";
                               $result = $conn->query($sql);

                              if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
		
                               print '<option value="'.$row['timezone'].'">'.$row['timezone'].'</option>';
                                     }
                                  } else {

                                       }
                                     $conn->close();
								?>
                              </optgroup>
		

								</select>
								
								</div>
							</div>
							
							
														<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="password" placeholder="Password" name="password" required>
									
								</div>
							</div>
																					<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password"  id="confirm_password" placeholder="Confirm Password" name="password2" required>
															<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Create account</button>
								
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; <?php echo date('Y') ?> Shop Manager - Developed by <a target="_blank" href="https://www.facebook.com/narbie1995">Bwire Charles Mashauri</a> and  <a target="_blank" href="https://www.facebook.com/daudyskyy">Azizi Selemani Daudy</a></b> All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>