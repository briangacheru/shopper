<!DOCTYPE html>
<html lang="en">
<?php
include 'action/check-login.php';
error_reporting(0);
?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Manager | Add sales</title>
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
							if ($SEshoplogo == null) {
								print '<img src="../images/shop.png" class="nav-avatar" />';
							}else{
						      print '<img src="data:image/jpeg;base64,'.base64_encode($SEshoplogo ).'"  class="nav-avatar"/>';
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
                                <li class="active"><a href="./"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="new_stock.php"><i class="menu-icon icon-shopping-cart"></i>New Stock </a>
                                </li>
                                <li><a href="stock_list.php"><i class="menu-icon icon-shopping-cart"></i>Stock List</a></li>
                                <li><a href="barcodes.php"><i class="menu-icon icon-barcode"></i>Generate Barcodes</a></li>
                            </ul>
          
                            <ul class="widget widget-menu unstyled">
                                <li><a href="product_categories.php"><i class="menu-icon icon-filter"></i> Product Categories</a></li>
                                <li><a href="product_units.php"><i class="menu-icon icon-glass"></i> Product Units </a></li>
                            </ul>
                            
                            <ul class="widget widget-menu unstyled">
                                <li><a href="new_user.php"><i class="menu-icon icon-user"></i> New User </a></li>
                                <li><a href="my_users.php"><i class="menu-icon icon-user"></i> Users </a></li>
                            </ul>
							
							<ul class="widget widget-menu unstyled">
                                <li><a href="add_sales.php"><i class="menu-icon icon-money"></i> New Sales</a></li>
                                <li><a href="sales.php"><i class="menu-icon icon-money"></i> Sales </a></li>
								<li><a href="sales_summary.php"><i class="menu-icon icon-bar-chart"></i>Sales Summary</a></li>
                            </ul>

                        </div>
             
                    </div>
            
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Add Sales</h3>
                                </div>
								<div class="module-body">
                               <form class="form-horizontal row-fluid" action="action/new-sales.php" method="POST">


										<div class="control-group">
											<label class="control-label" for="basicinput">Product 1</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="product1">
													<option value="">Select here..</option>
										            <?php
													include '../config/db_config.php';
								 
								                     $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' ORDER BY name";
                                                     $result = $conn->query($sql);
                                  
								                    if ($result->num_rows > 0) {
    
                                                   while($row = $result->fetch_assoc()) {
                                                       print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                         }
                                                    } else {
  
                                                      }
                                                       $conn->close();
													?>
												</select>
												
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="number" name="ammount1" placeholder="Amount">       
												</div>
											</div>
											
											
											
							
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Product 2</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="product2">
													<option value="">Select here..</option>
										            <?php
													include '../config/db_config.php';
								 
								                     $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' ORDER BY name";
                                                     $result = $conn->query($sql);
                                  
								                    if ($result->num_rows > 0) {
    
                                                   while($row = $result->fetch_assoc()) {
                                                       print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                         }
                                                    } else {
  
                                                      }
                                                       $conn->close();
													?>
												</select>
												
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="number" name="ammount2" placeholder="Amount">       
												</div>
											</div>
											
											
											
							
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Product 3</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="product3">
													<option value="">Select here..</option>
										            <?php
													include '../config/db_config.php';
								 
								                     $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' ORDER BY name";
                                                     $result = $conn->query($sql);
                                  
								                    if ($result->num_rows > 0) {
    
                                                   while($row = $result->fetch_assoc()) {
                                                       print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                         }
                                                    } else {
  
                                                      }
                                                       $conn->close();
													?>
												</select>
												
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="number" name="ammount3" placeholder="Amount">       
												</div>
											</div>
											
											
											
							
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Product 4</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="product4">
													<option value="">Select here..</option>
										            <?php
													include '../config/db_config.php';
								 
								                     $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' ORDER BY name";
                                                     $result = $conn->query($sql);
                                  
								                    if ($result->num_rows > 0) {
    
                                                   while($row = $result->fetch_assoc()) {
                                                       print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                         }
                                                    } else {
  
                                                      }
                                                       $conn->close();
													?>
												</select>
												
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="number" name="ammount4" placeholder="Amount">       
												</div>
											</div>
											
											
											
							
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Product 5</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span4" name="product5">
													<option value="">Select here..</option>
										            <?php
													include '../config/db_config.php';
								 
								                     $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' ORDER BY name";
                                                     $result = $conn->query($sql);
                                  
								                    if ($result->num_rows > 0) {
    
                                                   while($row = $result->fetch_assoc()) {
                                                       print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                         }
                                                    } else {
  
                                                      }
                                                       $conn->close();
													?>
												</select>
												
												<div class="input-prepend">
													<span class="add-on">#</span><input class="span8" type="number" name="ammount5" placeholder="Amount">       
												</div>
											</div>
											
											
											
							
										</div>
									

										<div class="control-group">
											<div class="controls">
												<button onclick="return confirm('Submit sales ?');" type="submit" class="btn">Add Sale (s)</button>
												<button onclick="return confirm('Reset form ?');" type="submit" class="btn">Reset Form</button>
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
