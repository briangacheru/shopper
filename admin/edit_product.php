<!DOCTYPE html>
<html lang="en">
<?php
include 'action/check-login.php';
error_reporting(0);
$producttoedit = $_SESSION['producttoedit'];
include '../config/db_config.php';

$sql = "SELECT * FROM products WHERE product_id = '$producttoedit'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $pname = $row['name'];
	  $cst = $row['current_stock'];
	  $pbp = $row['buying_price'];
	  $psp = $row['selling_price'];
	  $psl = $row['stock_level'];
	  $pos = $row['open_stock'];
	  $pcs = $row['current_stock'];
	  $pbc = $row['barcode'];
	  $pct = $row['category'];
	  $pu = $row['unit'];
	  $exd = $row['expire_date'];
	  $exm = $row['expire_month'];
	  $exy = $row['expire_year'];
    }
} else {

}
$conn->close();

?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Manager | Edit Product</title>
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
                                        Edit Product</h3>
                                </div>
								<div class="module-body">
								<?php
								if(isset($_GET['in'])) {
									print '
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										'.$_GET['in'].' 
									</div>
									';
								}else{
									
								}
								?>
                                 <form class="form-horizontal row-fluid" action="action/update-stock.php" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">Product Name</label>
											<div class="controls">
												<input type="text" id="basicinput" placeholder="Product Name..." value="<?php echo"$pname"; ?>" name="product" required class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Buying Price</label>
											<div class="controls">
												<div class="input-append">
													<input type="number" placeholder="Buying Price" name="buyingprice" value="<?php echo"$pbp"; ?>"  required class="span8"><span class="add-on"><?php echo"$SEshopcurrency"; ?></span>
				                                 
												</div>

											</div>
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Selling Price</label>
											<div class="controls">
												<div class="input-append">
													<input type="number" placeholder="Selling Price" name="sellingprice" value="<?php echo"$psp"; ?>"   required class="span8"><span class="add-on"><?php echo"$SEshopcurrency"; ?></span>
				                                 
												</div>

											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Low stock level</label>
											<div class="controls">
												<input type="number" id="basicinput" placeholder="Low stock level..." value="<?php echo"$psl"; ?>"  name="stocklevel" required class="span8">
												
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Opening Stock</label>
											<div class="controls">
												<input type="number" placeholder="Opening Stock…" name="stock" value="<?php echo"$pos"; ?>"  required class="span8 tip">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Current Stock</label>
											<div class="controls">
												<input type="number" placeholder="Opening Stock…" name="currentstock" value="<?php echo"$cst"; ?>"  required class="span8 tip"><br>
												<b style="color:red;">Only change this if you are upgrading product</b>
											</div>
										</div>
										
																				<div class="control-group">
											<label class="control-label" for="basicinput">Barcode</label>
											<div class="controls">
												<input type="text" placeholder="Barcode…" name="barcode" value="<?php echo"$pbc"; ?>"  required class="span8 tip">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Product Category</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." name="productcategory" class="span8">
													<option value="">Select one..</option>
													<?php
													include '../config/db_config.php';
													$sql = "SELECT * FROM product_categories WHERE shop = '$SEshopno' or shop = 'ALL' ORDER BY name";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
														
														if ($pct == $row['name']){
															 print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';
														}else{
															 print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
														}
														
                                                    
                                                       }
                                                     } else {

                                                     }
                                                     $conn->close();
													?>
												</select>
											</div>
										</div>
										
										
										<div class="control-group">
											<label class="control-label" for="basicinput">Product Unit</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." name="productunit" required class="span8">
													<option value="">Select one..</option>
                                                     <?php
													include '../config/db_config.php';
													$sql = "SELECT * FROM product_units WHERE shop = '$SEshopno' or shop = 'ALL' ORDER BY name";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {

                                                    while($row = $result->fetch_assoc()) {
                                                  	if ($pu == $row['name']){
															 print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';
														}else{
															 print '<option value="'.$row['name'].'">'.$row['name'].'</option>';
														}
                                                       }
                                                     } else {

                                                     }
                                                     $conn->close();
													?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Expire Date</label>
											<div class="controls">
												  <select tabindex="1" data-placeholder="Select here.." name="date" required class="span2">
													<option value="">Date</option>
													<?php 
                                                    $x = 1; 

                                                    while($x <= 31) {
														
														if ($x < 10) {
															$x = "0$x";
														if ($exd == $x){
														print '<option selected value="'.$x.'">'.$x.'</option>';
														}else{
														print '<option value="'.$x.'">'.$x.'</option>';
														}
														
														}else{
															if ($exd == $x){
															print '<option selected value="'.$x.'">'.$x.'</option>';
															}else{
															print '<option value="'.$x.'">'.$x.'</option>';
															}
														
														}
                                         
													 
                                                    $x++;
                                                      } 
                                                        ?>
													</select>
													
													<select tabindex="1" data-placeholder="Select here.." name="month" required class="span2">
													<option value="">Month</option>
													<?php 
                                                    $x = 1; 

                                                    while($x <= 12) {
                                         
															if ($x < 10) {
															$x = "0$x";
														if ($exm == $x){
														print '<option selected value="'.$x.'">'.$x.'</option>';
														}else{
														print '<option value="'.$x.'">'.$x.'</option>';
														}
														
	
														}else{
														if ($exm == $x){
														print '<option selected value="'.$x.'">'.$x.'</option>';
														}else{
														print '<option value="'.$x.'">'.$x.'</option>';
														}
														
				
														}
                                                    $x++;
                                                      } 
                                                        ?>
													</select>
													
													<select tabindex="1" data-placeholder="Select here.." name="year" class="span2">
													<option value="">Year</option>
													<?php 
                                                    $x = date('Y'); 
                                                    $yr = 20;
													$y2 = $x + $yr;
                                                    while($x <= $y2) {
														
														if ($exy == $x){
														print '<option selected value="'.$x.'">'.$x.'</option>';
														}else{
														print '<option value="'.$x.'">'.$x.'</option>';
														}
                                         

                                                    $x++;
                                                      } 
                                                        ?>
													</select>
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn">Update Product</button>
												<button type="reset" class="btn">Reset Form</button>
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
