<?php

$con = mysqli_connect("localhost","root","","dp2");

	if(isset($_POST['dateinput1']) && $_POST['dateinput2']!=""){
	
	$query= "SELECT inventory.itemId,inventory.item_name, inventory.itemprice, sales.itemId, sales.salesID, sales.salesDate, sales.itemcount, sales.invoicenumber,  sales.itemcount * inventory.itemprice AS finalprice FROM inventory JOIN sales ON sales.itemID = inventory.itemID WHERE sales.salesDate BETWEEN '".$_POST['dateinput1']."' AND '".$_POST['dateinput2']."'";
	
	$result = mysqli_query($con, $query);
<<<<<<< HEAD
        
//	making the titles of the columns in excel sheet
	$filename = 'report/'.strtotime("now").'.csv';
	$fp = fopen($filename, 'w');
	fputcsv ($fp, array('Item ID', 'Item Name', 'Item Price', 'Sales ID', 'Sales Date', 'Purchased Quantity', 'Invoice Number', 'Total Price'));

    while($row = mysqli_fetch_assoc($result))
    {
	fputcsv($fp, $row);
	
    }
	fclose($fp);
	}else{
	echo "Please select date";}
?>

<!--Normal html page-->
=======

>>>>>>> 9d66ef34e900e55796147da6f48055c8a6b2ad75
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name = "viewport" content = "width = device - width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="../style/style.css" rel="stylesheet"/>
    
    </head>   
<body>
    <div class = "container">
        
    <!-- Making the header -->
    <div>
        <h1>People Health Pharmacy</h1>
        
    </div>
        
    <!-- Creating the navigation bar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li ><a href="index.html">Home</a></li>
                <li><a href="inventory/index.html">Inventory</a></li>
                <li><a href="report/index.html">Report</a></li>
                <li class="active"><a href="sales/sales/index.html">Sales</a></li>
                <li><a href="customers/index.html">Customers</a></li>
            </ul>
        </div>
    </nav>
	

      <h1>CSV report generated</h1>
      <p>check report folder for the file</p>
  </body>
<footer>
       <div id="Footer"> Copyright &copy; 2016  All rights reserved. VAT no. IT 0146971728 </div> 
</footer>
</html>