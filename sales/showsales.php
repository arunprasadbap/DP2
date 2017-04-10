<?php

$con = mysqli_connect("localhost","root","rootroot","dp2");
$rs=mysqli_query($con,"SELECT sales.*,salesitem.*,inventory.*, salesitem.itemcount as itemc FROM sales JOIN salesitem ON sales.salesID = salesitem.salesID JOIN inventory ON salesitem.itemId = inventory.itemId");

$data=array();
while($row=mysqli_fetch_assoc($rs)){
    $data[]=$row;
}

?>

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
                <li class="active"><a href="sales/index.html">Sales</a></li>
                <li><a href="customers/index.html">Customers</a></li>
            </ul>
        </div>
    </nav>
        

    <div style="height:800px; overflow-y:auto;">
		<table border="1em" class="table table-bordered table-striped table-hover">
		  <thead>
			<tr>
			<th>Sales ID</th>
			<th>Invoice Number</th>
			<th>Date</th>
			<th>Items</th>
			<th>Amount of purchase</th>
			<th>Total sales amount</th>
			<th>Edit</th>
			<th>Deletion</th>
		</tr>
		  </thead>

		  <tbody id="sales">
              <?php foreach($data as $sale){?>
              <tr id="row<?php echo $sale['salesID']; ?>">
                  <td><?php echo $sale['salesID'];?></td>
                  <td class="inv"><?php echo $sale['invoicenumber'];?></td>
                  <td class="date"><?php echo $sale['salesDate'];?></td>
                  <td><?php echo $sale['item_name'];?></td>
                  <td class="quantity"><?php echo $sale['itemc'];?></td>
                  <td class="price" price="<?php echo $sale['itemprice']; ?>"><?php echo $sale['itemc']*$sale['itemprice'];?></td>
                  <td class="btn"><button onClick="return editRow(<?php echo $sale['salesID'] ?>,<?php echo $sale['itemId'] ?>)" type="button">Edit</button></td>
              </tr>
              <?php }?>
		  </tbody>
		</table>
	</div>
  </div>
  </body>
</html>
<script 
       src="https://code.jquery.com/jquery-3.2.1.min.js" 
       integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" 
       crossorigin="anonymous">
</script>
<script type="text/javascript">
  function editRow(salesID,itemID){
    var quantity=$("#row"+salesID+" .quantity");
    var inv=$("#row"+salesID+" .inv");
    var price=$("#row"+salesID+" .price");
    var date=$("#row"+salesID+" .date");
    var btn=$("#row"+salesID+" .btn");


    quantity.html("<input type='text' name='quantity' id='quantity"+salesID+"' value='"+quantity.html()+"' />");
    inv.html("<input type='text' name='inv' id='inv"+salesID+"' value='"+inv.html()+"' />");
    price.html("<input type='text' name='price' id='price"+salesID+"' value='"+price.html()+"' />");
    date.html("<input type='text' name='date' id='date"+salesID+"' value='"+date.html()+"' />");
    btn.html("<button type='button' onClick='return updateRow("+salesID+","+itemID+")'>Update</button>");
  }
</script>