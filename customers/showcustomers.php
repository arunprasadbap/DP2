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
		<table id="tablee" border="1em" class="table table-bordered table-striped table-hover">
		  <thead>
			<tr id="cust">
			<th id="cust">Customer ID</th>
			<th id="cust">Customer Name</th>
			<th id="cust">Gender</th>
			<th id="cust">Edit</th>
			<th id="cust">Deletion</th>
		</tr>
		  </thead>

		  <tbody>
              <?php foreach($data as $customers){?>
              <tr>
                  <td><?php echo $customers['customerID'];?></td>
                  <td><?php echo $customers['customername'];?></td>
                  <td><?php echo $customers['gender'];?></td>
              </tr>
              <?php }?>
              
              
		  </tbody>
		</table>
	</div>
  </div>
  </body>
</html>
