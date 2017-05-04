<?php
$con = mysqli_connect("localhost","root","rootroot","dp2");
if(isset($_GET['edit'])){
    
    
    $customerID=$_GET['edit'];
   $rs=mysqli_query($con,"SELECT * FROM customer where customerID='$customerID' ");
   $row=mysqli_fetch_array($rs);
  
    
}
if(isset($_POST['newCustName'])){
 $customerID =$_POST['customerID'];
    $newCustName=$_POST['newCustName'];
    $newCustno=$_POST['newCustno'];
    $newCusthm=$_POST['newCusthm'];
    $sql = "UPDATE customer SET customername='$newCustName',ContactNo='$newCustno',Hometown='$newCusthm'
    WHERE customerID='$customerID'";
    $rs = mysqli_query($con, $sql) or die("could not update".mysql_error());
    echo '<script language="javascript">';
echo 'alert("CUSTOMER SUCCESSFULLY UPDATED!!!!!")';
echo '</script>';
    echo"<meta http-equiv='refresh'content='0;url=showcustomers.php'>";
   
}


?>
<!DOCTYPE HTML>
<html lang = "en">
    <head>
    <title>Add Customers</title>
        
    <meta charset = "utf-8" />
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
                  <li><a href="index.html">Home</a></li>
             
                <li><a href="inventory/index.html">Inventory</a></li>
                <li><a href="report/index.html">Report</a></li>
                <li><a href="sales/index.html">Sales</a></li>
                
                <li class="active"><a href="customers.html">Customers</a></li>
            </ul>
        </div>
    </nav>

	<div class="form-group">
    <form action="editcustomers.php" id="customersform"  method="POST"> 
    <fieldset>
        <p id="cust"><strong><legend id="cust">CUSTOMER DETAILS</legend></strong></p>
			<p id="customername">Customer Name: <p><input type="text" name="newCustName" value="<?php echo $row[customername] ?> " id="customernamee" placeholder="Your Name" onkeyup="lettersOnly(this)" /></p>
            <p id="customerid"> <p><input type="hidden" id="customeridd" name="customerID" value="<?php echo $row[customerID] ?>" placeholder="Your ID" /></p>
        <p id="customerno">Contact No: <p><input type="text" id="customerno" name="newCustno"value="<?php echo $row[ContactNo] ?> " placeholder="Your Contact number" /></p>
        <p id="customertown">Hometown: <p><input type="text" id="home" name="newCusthm" value="<?php echo $row[Hometown] ?> " placeholder="Your Hometown" /></p>
       
	    <br/>
	    
	</fieldset>
 <input type="submit" value="update">

    
      
    </form>
	</div>

    </div>
</body>
</html>
