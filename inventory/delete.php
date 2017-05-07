<?php

$con = mysqli_connect("localhost","root","rootroot","dp2");


if(isset($_GET['id']) && $_GET['id']!=""){
                                   
                $sql1 = "DELETE FROM `inventory` WHERE itemId = ".$_GET['id'];
                mysqli_query($con,$sql1);
                header("location:".$_SERVER["HTTP_REFERER"]);
            }
   else{
       header("location:".$_SERVER["HTTP_REFERER"]);
   }


?>
