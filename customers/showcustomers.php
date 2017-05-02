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
        <script type="text/javascript">
        function phj()
              {
                var limit = 1;
                $('input.single-checkbox').on('change', function(evt)
                {
                    alert('Hellp');
                 if($(this).siblings(':checked').length >= limit)
                 {
                   this.checked = false;
                     alert('ERROR');
                   }
                });

        
        
        
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
                <th id="cust">Contact Number</th>
                <th id="cust">Hometown</th>
		</tr>
		  </thead>
		  <tbody>
             <?php
               //print_r($data);
              ?>
              <?php foreach($data as $customers){?>
              <tr>
                    <tr id="row<?php echo $customer['customerID']; ?>">
                  <td><form name="form1" method="post" class="single-checkbox"><input name="checkbox[]" type="checkbox" id="checkbox[]" 
                                                              value="<?php echo $customers['customerID']; ?>" action="editcustomers.html"></td>
                  <td><?php echo $customers['customerID'];?></td>
                 <td class="cutn"><?php echo $customers['customername'];?></td>
                  <td><?php echo $customers['gender'];?></td>
                   <td><?php echo $customers['ContactNo'];?></td>
                   <td><?php echo $customers['Hometown'];?></td>
                   <td class="btn"><button onClick="return editRow(<?php echo $customers['customerID'] ?>)" type="button">Edit</button></td>
              </tr>
              }
              <?php } ?>
               <script 
       src="https://code.jquery.com/jquery-3.2.1.min.js" 
       integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" 
       crossorigin="anonymous">
</script>
<script type="text/javascript">
  function editRow(customerID){
    var gender=$("#row"+customerID+" .gender");
    var cutn=$("#row"+customerID+" .cutn");
    var Custno=$("#row"+customerID+" .Custno");
    var Custhm=$("#row"+customerID+" .Custhm");
    var btn=$("#row"+customerID+" .btn");


    gender.html("<input type='text' name='gender' id='gender"+customerID+"' value='"+gender.html()+"' />");
   cutn.html("<input type='text' name='cutn' id='cutn"+customerID+"' value='"+cutn.html()+"' />");
    Custno.html("<input type='text' name='Custno' id='Custno"+customerID+"' value='"+Custno.html()+"' />");
    btn.html("<button type='button' onClick='return updateRow("+customerID+")'>Update</button>");
  }

  function updateRow(customerID){

    var genderVal=$("#gender"+customerID).val();
    var cutnVal=$("#cutn"+customerID).val();
    var CustnoVal=$("#Custno"+customerID).val();

    var gender=$("#row"+customerID+" .gender");
    var cutn=$("#row"+customerID+" .cutn");
    var Custhm=$("#row"+customerID+" .Custhm");
    var  Custno=$("#row"+customerID+" .Custno");
    var btn=$("#row"+customerID+" .btn");

    $.ajax({
      method: "POST",
      url: "editcustomers.php",
      data: { CustID: customerID, gender:genderVal, customername:cutnVal, Custno:CustnoVal  }
    })
      .done(function( msg ) {
        gender.html(genderVal);
       CustName.html(CustNameVal);
       Custno.html(CustnoVal);

       // price.html(price.attr('price')*quantityVal);
        btn.html('<button onClick="return editRow('+customerID+')" type="button">Edit</button>');
      });

  } 

</script>
              <td colspan="6"><input type="submit" id="delete" name="delete" value="DELETE" style="float: right;margin-left:10px;"></td>
        <?php
              //print_r($_POST)
            if(isset($_POST['delete']))
            {
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
            
            
		</table>
            
    </div>
  </div>
  </body>
</html>
