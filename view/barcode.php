<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php
		include '../php_barcode-master/barcode128.php';
		$product = $_POST['pname'];
		$rNo = $_POST['rno'];
		$product_id = $_POST['product_id'];
		$size = $_POST['SizeId'];
		$price = $_POST['price'];
		
		for($i=1;$i<=$_POST['qty'];$i++){
			echo "<p class='inline'><span ><b>Item: $product </b></span>".bar128(stripcslashes($_POST['rno'].$_POST['product_id'].$_POST['SizeId']))."<span ><b>Price: $price </b><span></p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
</body>
</html>