<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
include 'action/check-login.php';
include 'action/alerts.php';

?>
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop Manager | Dashboard</title>
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
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-shopping-cart"></i><b><?php echo number_format($mypr1); ?></b>
                                        <p class="text-muted">
                                            Registered Products</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b><?php echo number_format($myus1); ?></b>
                                        <p class="text-muted">
                                            Registered Users</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b><?php echo number_format($mysum); ?> <?php echo"$SEshopcurrency"; ?></b>
                                        <p class="text-muted">
                                            Today Profit</p>
                                    </a>
                                </div>
                            </div>
       
                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Alerts</h3>
                                </div>
								<div class="module-body">
								<?php
								if ($ex1 == true){
                                 print '
								 									<div class="alert">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>'.$exalert1.'</strong> product (s) are below the crictical level.
									</div>';
							
								}else{
									if ($ex2 == false) {
																			print '
									 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										All products below the stock level will be shown here.
									</div>';
									}

								}
						
								if ($ex2 == true){
									print '
										<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>'.$exalert2.'</strong> product (s) have expired.
									</div>';
								}else{
									if ($ex1 == false) {
																			print '
									 <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										All expired products will be shown here.
									</div>';
									}
								}
								?>

									</div>
                            </div>

							                            <div class="module">
                                <div class="module-head">
                                    <h3>
                                        Last 3 Sales</h3>
                                </div>
								<div class="module-body">
								
								<?php
								include '../config/db_config.php';
								$sql = "SELECT * FROM sales WHERE shop = '$SEshopno' ORDER BY oid DESC LIMIT 3";
                                $result = $conn->query($sql);

                                 if ($result->num_rows > 0) {
                                  print '
								  <table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>Product Name</th>
									  <th>Price</th>
									  <th>Ammount</th>
									  <th>Total</th>
									   <th>Date</th>
									   <th>Sold By</th>
									</tr>
								  </thead>
								  <tbody>';
                                 while($row = $result->fetch_assoc()) {
                                  print '
								  <tr>
									  <td>'.$row['product_name'].'</td>
									  <td>'. number_format($row['price']).' '.$SEshopcurrency.'</td>
									  <td>'. number_format($row['amount']).' '.$row['unit'].'</td> 
									  <td>'.number_format($row['total']).' '.$SEshopcurrency.'</td>
									   <td>'.$row['date'].'</td>
									  <td>'.$row['signature'].'</td>
									</tr>';
                                   }
								   
								   print '
								   </tbody>
								</table>
								   ';
                                   } else {
									   print '
                                   <div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<h3 style="color:green">No Sales!</h3>
										The last 3 sales will be shown here.
									</div>';
                                       }
								?>

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
