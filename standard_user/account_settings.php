<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
include 'action/check-login2.php';

?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Manager | Account Settings</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
		<link rel="icon" href="../images/icon.png">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Shop Manager</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <form class="navbar-search pull-left input-append" action="action/search_product.php" method="POST">
                        <input type="text" class="span3" placeholder="Search for product....." name="product" required>
                        <button class="btn" type="submit">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php
			                if ($SEavator == null){
								print '<img src="../images/'.$SEgender.'.png" class="nav-avatar" />';
							}else{
								print '<img src="data:image/jpeg;base64,'.base64_encode($SEavator ).'"  class="nav-avatar"/>';
							}
							?>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="account_settings.php">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                
                </div>
            </div>
     
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="./"><i class="menu-icon icon-bullhorn"></i>Alerts
                                </a></li>
                                <li><a href="add_sales.php"><i class="menu-icon icon-money"></i> New Sales</a></li>
                                <li><a href="sales.php"><i class="menu-icon icon-money"></i> Sales </a></li>
                            </ul>
          
                            <ul class="widget widget-menu unstyled">
                                <li><a href="product_categories.php"><i class="menu-icon icon-filter"></i> Product Categories</a></li>
                                <li><a href="product_units.php"><i class="menu-icon icon-glass"></i> Product Units </a></li>
                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="my_users.php"><i class="menu-icon icon-user"></i> Users </a></li>
                            </ul>
							


                        </div>
             
                    </div>
            
                    <div class="span9">
                        <div class="content">

       
                            <div class="module">
                                      <div class="module-body">
                                <div class="profile-head media">
                                    <a href="#" class="media-avatar pull-left">
																<?php
			                if ($SEavator == null){
								print '<img src="../images/'.$SEgender.'.png"/>';
							}else{
								print '<img src="data:image/jpeg;base64,'.base64_encode($SEavator ).'"/>';
							}
							?>
                                     
                                    </a>
                                    <div class="media-body">
                                        <h4>
                                            <?PHP echo"$SEfullname"; ?> , <?php echo "$SEuserid"; ?>
                                        </h4>
                                        <p class="profile-brief">
                                       Update settings will require you to logout for changes to take place.
                                        </p>
                                        <div class="profile-details muted">
										<form action="action/new-dp.php" method="POST" enctype="multipart/form-data">
										<input type="file" name="f1" required>
                                         <button type="submit"><i class="icon-refresh"></i> Update Profile Picture </a></button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Feed</a></li>
                                    <li><a href="#friends" data-toggle="tab">Password</a></li>
                                </ul>
                                <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">
                                        <div class="stream-list">
                       
                                        <form class="form-horizontal row-fluid">

										<div class="control-group">
											<label class="control-label" for="basicinput">Full Name</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEfullname"; ?>" disabled="">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Email Address</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEemail"; ?>" disabled="">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Gender</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEgender"; ?>" disabled="">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Phone Number</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="You can't type something here..." class="span8" value="<?php echo"$SEphone"; ?>" disabled="">
											</div>
										</div>
										
										<div class="control-group">
						
										</div>
									</form>
                                        </div>
                                        <!--/.stream-list-->
                                    </div>
                                    <div class="tab-pane fade" id="friends">
                                                           
                                        <form class="form-horizontal row-fluid" action="action/new-password.php" method="POST">

										<div class="control-group">
											<label class="control-label" for="basicinput">New Password</label>
											<div class="controls">
												<input type="password" id="password" class="span8" name="pas1" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Confirm New Password</label>
											<div class="controls">
												<input type="password" id="confirm_password" class="span8" name="pas2" required>
											</div>
										</div>
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
			
										<br>
										<div class="control-group">
						                      <div class="controls">
												<button type="submit" class="btn">Update Password</button>
											</div>
										</div>
									</form>

                                    </div>
                                </div>
                            </div>
					
                            </div>


                       
                        </div>
                 
                    </div>
    
                </div>
            </div>
   
        </div>

        <div class="footer">
            <div class="container">
              <b class="copyright">&copy; <?php echo date('Y') ?> Shop Manager - Developed by <a target="_blank" href="https://www.facebook.com/narbie1995">Bwire Charles Mashauri</a> and  <a target="_blank" href="https://www.facebook.com/daudyskyy">Azizi Selemani Daudy</a></b> All rights reserved.
            </div>
        </div>
        <script src="../scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../scripts/common.js" type="text/javascript"></script>
      
    </body>
