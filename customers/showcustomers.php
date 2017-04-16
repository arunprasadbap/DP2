<?php

$con = mysqli_connect("localhost","root","rootroot","dp2");
$rs=mysqli_query($con,"SELECT * FROM customer");
$data=array();
while($row=mysqli_fetch_assoc($rs)){
    $data[]=$row;
}
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset = "utf-8" />
        <meta name = "viewport" content = "width = device - width, initial-scale=1" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <link href="../style/style.css" rel="stylesheet"/> 
        <script>
        
        var table = document.getElementById("tablee");
        
        
        
        
        
        </script>
    <title>Customer index</title>
    </head>

    <body>
        <div class = "container">
            <div>
                <h1>People Health Pharmacy</h1>
                <p id="home"></p>
            </div>

            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                
                </div>

                <ul class="nav navbar-nav">
                  <li><a href="../index.html">Home</a></li>
                  <li><a href="../inventory/index.html">Inventory</a></li>
                  <li><a href="../report/index.html">Report</a></li>
                     <li><a href="../sales/index.html">Sales</a></li>
                      <li class="active"><a href="../customers/index.html">Customers</a></li>
                     
                </ul>
              </div>
            </nav>
    <div style="height:800px; overflow-y:auto;">
		<table id="tablee" border="1em" class="table table-bordered table-hover" style="background-color:#C0C0C0;">
		  <thead>
			<tr id="cust">
			<th id="cust"></th>
            <th id="cust">Customer ID</th>
			<th id="cust">Customer Name</th>
			<th id="cust">Gender</th>
		</tr>
		  </thead>

		  <tbody>
             <?php
               //print_r($data);
              ?>
              <?php foreach($data as $customers){?>
              <tr>
                  <td><form name="form1" method="post"><input name="checkbox[]" type="checkbox" id="checkbox[]" 
                                                              value="<?php echo $customers['customerID']; ?>"></td>
                  <td><?php echo $customers['customerID'];?></td>
                  <td><?php echo $customers['customername'];?></td>
                  <td><?php echo $customers['gender'];?></td>
              </tr>
              <?php } ?>
              <tr><td colspan="4"><input type="submit" id="delete" name="delete" value="DELETE" style="float: right;margin-left:10px;"><a class="button" href="addcustomers.html">Go back</a></td></tr>
        <?php
              //print_r($_POST);
            if(isset($_POST['delete'])){
                for($i=0;$i<count($_POST['checkbox']);$i++)
                {
                $del_id=$_POST['checkbox'][$i];
//                $sql = "DELETE FROM `customer` WHERE customerID = $del_id";
                $result = mysqli_query($con, "DELETE FROM customer WHERE customerID=$del_id");
                echo "<meta http-equiv=\"refresh\" content=\"0;URL=showcustomers.php\">";
            }
            }
              ?>
		  </tbody>
            </form>
		</table>
    </div>
  </div>
  </body>
</html>
