<?php
$con = mysqli_connect("localhost","root","rootroot","dp2");
if(isset($_GET['edit'])){
    
    
    $itemId=$_GET['edit'];
   $rs=mysqli_query($con,"SELECT * FROM inventory where itemId='$itemId' ");
   $row=mysqli_fetch_array($rs);
  
    
}
if(isset($_POST['newitemName'])){
    $itemId =$_POST['itemId'];
    $newitemName=$_POST['newitemName'];
    $newitemDesc=$_POST['newitemDesc'];
    $newitemCount=$_POST['newitemCount'];
    $newitemPrice=$_POST['newitemPrice'];
    $sql = "UPDATE inventory SET item_name='$newitemName',itemdec='$newitemDesc',itemcount='$newitemCount',itemprice='$newitemPrice'
    WHERE itemId='$itemId' ";
    $rs = mysqli_query($con, $sql) or die("could not update".mysql_error());
    echo '<script language="javascript">';
echo 'alert("INVENTORY SUCCESSFULLY UPDATED!!!!!")';
echo '</script>';
    echo"<meta http-equiv='refresh'content='0;url=showall.php'>";
   
}

?>

<!DOCTYPE HTML>
<html lang = "en">
    <head>
    <title>Inventory</title>
        
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
                <li><a href="../index.html">Home</a></li>
                <li class="active"><a href="index.html">Inventory</a></li>
                <li><a href="report/index.html">Report</a></li>
                <li><a href="sales/index.html">Sales</a></li>
                <li><a href="customers/index.html">Customers</a></li>
            </ul>
        </div>
    </nav>
    
        <h2>Inventory Data</h2>
        <!--
        Using auto increment for itemid, no need for this line
        <p>Item ID: <input type="text" name="itemID" value="" /></p>
        <br />
        -->
    <div class = "form-group">
        <form action="editInventory.php" method="POST"  id="inventory">
            <fieldset>
                <label><input type="hidden" name="itemId" value="<?php echo $row[itemId] ?>" class = "form-control"  ></label>
            <br>
                <label for = "itemname">Item Name: <input type="text"  name="newitemName" value="<?php echo $row[item_name] ?>" class = "form-control" placeholder = "Item Name" onkeyup="lettersOnly(this)" /></label>
	      
		      <br>
              <label>Item Description: <input type="text" name="newitemDesc" value="<?php echo $row[itemdec] ?>" class = "form-control" placeholder = "Item Description" rows="15" cols="90" onkeyup="lettersOnly(this)" ></label>
		  
		      <br>
              <label>Item Count: <input type="text" name="newitemCount" value="<?php echo $row[itemcount] ?>" class = "form-control" placeholder = "Item Count" /></label>
		  
		      <br>
              <label>Item Price: <input type="text" name="newitemPrice" value="<?php echo $row[itemprice] ?>" class = "form-control" placeholder = "Item Price"/></label>
          
                <br>
            </fieldset>
          <input type = "submit" value="update">
            
        </form>
    </div>
        
    
    </div>
    
</body>
</html>