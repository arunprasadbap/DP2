<?php 

$con = mysqli_connect("localhost","root","rootroot","dp2");

if(isset($_POST['itemId']) && isset($_POST['salesId'])){

	$query="UPDATE salesitem SET itemcount='".$_POST['quantity']."' WHERE salesID=".$_POST['salesId'];
	mysqli_query($con,$query);

	$query2="UPDATE sales SET salesDate='".$_POST['date']."', invoicenumber='".$_POST['invoicenumber']."' WHERE salesID=".$_POST['salesId'];
	mysqli_query($con,$query2);

} 

 ?>