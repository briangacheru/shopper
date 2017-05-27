 <html>
 <head>
 <title>Shop Manager | Sales Receipt</title>

		<link rel="icon" href="../images/icon.png">
		<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>

<?php
include 'action/check-login.php';
$shop_timezone = $_SESSION['shoptimezone'];
date_default_timezone_set($shop_timezone);

$today = ''.date('d').'-'.date('m').'-'.date('Y');
error_reporting(0);
$product1 = $_SESSION['product1'];
$p1price = $_SESSION['price1'];
$ammount1 = $_SESSION['ammount1'];
$p1total = $_SESSION['total1'];
$unit1 = $_SESSION['unit1'];

$product2 = $_SESSION['product2'];
$p2price = $_SESSION['price2'];
$ammount2 = $_SESSION['ammount2'];
$p2total = $_SESSION['total2'];
$unit2 = $_SESSION['unit2'];

$product3 = $_SESSION['product3'];
$p3price = $_SESSION['price3'];
$ammount3 = $_SESSION['ammount3'];
$p3total = $_SESSION['total3'];
$unit3 = $_SESSION['unit3'];

$product4 = $_SESSION['product4'];
$p4price = $_SESSION['price4'];
$ammount4 = $_SESSION['ammount4'];
$p4total = $_SESSION['total4'];
$unit4 = $_SESSION['unit4'];

$product5 = $_SESSION['product5'];
$p5price = $_SESSION['price5'];
$ammount5 = $_SESSION['ammount5'];
$p5total = $_SESSION['total5'];
$unit5 = $_SESSION['unit5'];

$sumt = $p1total + $p2total + $p3total + $p4total + $p5total;
include '../config/db_config.php';
$sql = "SELECT * FROM shops WHERE shop_no = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $sname = $row['shop_name'];
		$semail = $row['shop_email'];
		$scurrency = $row['shop_currency'];
		$saddres = $row['shop_address'];
		$sstreet = $row['shop_street'];
		$sphone = $row['shop_phone'];
    }
} else {

}
$conn->close();

?>


<div id="div1" style="width:570px; height:690px; margin:0 auto; border-style: solid; margin-top:40px; border-radius: 5px;">
<center>
<h1><?php echo"$sname"; ?></h1>
<p><?php echo"$saddres"; ?> , <?php echo"$sstreet"; ?> <br>
<?php echo"$semail"; ?> <br>
<?php echo"$sphone"; ?> <br>
<h3>Sales Receipt</h3>


<table cellpadding="5" border="1" width="99%" style="border-collapse: collapse;">

								  <tbody>
									<tr>
									  <td>Sold By</td>
									  <td><?php echo"$SEshopname"; ?> , <?php echo"$SEshop_id";?></td>
									  <td>Date</td>
									   <td><?php echo"$today"; ?></td>
									</tr>
									<tr>
									  <td>Customer Name</td>
									  <td><input type="text" placeholder="Enter name here" style="border-style:none;"></td>
									  <td colspan="2" rowspan="2"></td>
							
									</tr>
									<tr>
									  <td>Customer Address</td>
									  <td><input type="text" placeholder="Enter address here" style="border-style:none;"></td>

									</tr>
								  </tbody>
								</table>
								<h3>Item(s) Sold</h3>
								
								<table cellpadding="5" border="1" width="99%" style="border-collapse: collapse;">

								  <tbody>
									<tr>
									  <td style="width:10px;"><b>QTY.</b></td>
									  <td><b>DETAILS</b></td>
									  <td><b>PRICE</b></td>
									   <td><b>AMOUNT</b></td>
									   <td><b>TOTAL</b></td>
									</tr>
									<tr>
									  <td style="width:10px;">1.</td>
									  <td><?php echo"$product1"; ?></td>
									  <td><?php echo number_format($p1price); ?> <?php echo"$scurrency"; ?></td>
									   <td align="Center"><?php echo"$ammount1"; ?> <?php echo"$unit1"; ?></td>
									   <td><?php echo number_format($p1total); ?> <?php echo"$scurrency"; ?></td>
									</tr>
									<tr>
									  <td style="width:10px;">2.</td>
									  <td><?php echo"$product2"; ?></td>
									  <td><?php echo number_format($p2price); ?> <?php echo"$scurrency"; ?></td>
									   <td align="Center"><?php echo"$ammount2"; ?> <?php echo"$unit2"; ?></td>
									   <td><?php echo number_format($p2total); ?> <?php echo"$scurrency"; ?></td>
									</tr>
									<tr>
									  <td style="width:10px;">3.</td>
									  <td><?php echo"$product3"; ?></td>
									  <td><?php echo number_format($p3price); ?> <?php echo"$scurrency"; ?></td>
									   <td align="Center"><?php echo"$ammount3"; ?> <?php echo"$unit3"; ?></td>
									   <td><?php echo number_format($p3total); ?> <?php echo"$scurrency"; ?></td>
									</tr>
									<tr>
									  <td style="width:10px;">4.</td>
									  <td><?php echo"$product4"; ?></td>
									  <td><?php echo number_format($p4price); ?> <?php echo"$scurrency"; ?></td>
									   <td align="Center"><?php echo"$ammount4"; ?> <?php echo"$unit4"; ?></td>
									   <td><?php echo number_format($p4total); ?> <?php echo"$scurrency"; ?></td>
									</tr>
									<tr>
									  <td style="width:10px;">5.</td>
									  <td><?php echo"$product5"; ?></td>
									  <td><?php echo number_format($p5price); ?> <?php echo"$scurrency"; ?></td>
									   <td align="Center"><?php echo"$ammount5"; ?> <?php echo"$unit5"; ?></td>
									   <td><?php echo number_format($p5total); ?> <?php echo"$scurrency"; ?></td>
									</tr>
							
									<tr>
									<td colspan="5" align="center">
									<b>TOTAL : </b><?php echo number_format($sumt);?> <?php echo"$scurrency"; ?>
									</td>
									</tr>
								  </tbody>
								</table><Br><br>
								
								<?php
								                                            $text=$SEshop_id;
 echo "<center><img src='barcode/barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/></center>";
 
 ?>
 <i>Welcome Again</i>
</div><br><br>
<center>
<button><a style="text-decoration:none;" href="./add_sales.php">Go Back</a></button>