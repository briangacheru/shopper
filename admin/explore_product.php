<!DOCTYPE html>
<html lang="en">
<?php
include 'action/check-login.php';
error_reporting(0);
$currentproduct = $_SESSION['exploreprod'];
include '../config/db_config.php';

$sql = "SELECT * FROM products WHERE product_id = '$currentproduct'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $pname = $row['name'];
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
	  $pexd = "$exd-$exm-$exy";
	  
	  
	  $exprofit = $pos * $psp;
	  $tgs = $pos - $pcs;
	  $profitearned = $tgs * $psp;
	  $loss = $pcs * $psp;
    }
} else {

}
$conn->close();
?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Manager | Explore Product</title>
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
                                        Explore Product</h3>
                                </div>
                                <div class="module-body">
                           <table class="table table-striped table-bordered table-condensed">
	
								  <tbody>
									<tr>
									  <td><b>Product ID</b></td>
									  <td><?php echo"$currentproduct"; ?></td>
									</tr>
																		<tr>
									  <td><b>Product Name</b></td>
									  <td><?php echo"$pname"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Buying Price</b></td>
									  <td><?php echo number_format($pbp); ?> <?php echo"$SEshopcurrency"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Selling Price</b></td>
									  <td><?php echo number_format($psp); ?> <?php echo"$SEshopcurrency"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Low Stock Level</b></td>
									  <td><?php echo number_format($psl); ?> <?php echo"$pu"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Open Stock</b></td>
									  <td><?php echo"$pos"; ?> <?php echo"$pu"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Current Stock</b></td>
									  <td><?php echo"$pcs"; ?> <?php echo"$pu"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Category</b></td>
									  <td><?php echo"$pct"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Unit</b></td>
									  <td><?php echo"$pu"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Barcode</b></td>
									  <td><?php echo"$pbc"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Expire Date</b></td>
									  <td><?php echo"$pexd"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Expected Profit</b></td>
									  <td><?php echo number_format($exprofit); ?> <?php echo"$SEshopcurrency"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Profit Earned</b></td>
									  <td><?php echo number_format($profitearned); ?> <?php echo"$SEshopcurrency"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Loss</b></td>
									  <td><?php echo number_format($loss); ?> <?php echo"$SEshopcurrency"; ?></td>
									</tr>
									
																		<tr>
									  <td><b>Total Goods Sold</b></td>
									  <td><?php echo number_format($tgs); ?> <?php echo"$pu"; ?></td>
									</tr>
									
								  </tbody>
								</table>
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
