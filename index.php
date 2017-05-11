<?php
session_start();
?>
<?php 
if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:Home.php"); 
 }


	include "connection.php"; // create connection 

	$error=0;

	if(isset($_POST['user_name']) && isset($_POST['password'])){
		$query="SELECT * FROM user WHERE user_name='".$_POST['user_name']."' AND password='".$_POST['password']."'";// selecting information from user table
          if($user_name == "user1" && $password == "user1")  // username is  set to "user1"  and Password   
         {                                   // is user1 by default     

          $_SESSION['use']=$user;


         echo '<script type="text/javascript"> window.open("Home.php","_self");</script>';            //  On Successful Login redirects to home.php

        }

		$rs = mysqli_query($connection,$query);// creation connection

		$num=mysqli_num_rows($rs);

		if($num>0){
			$_SESSION['login']=true;    //if user name and password true get access to Home page
            header("location:Home.php");
		}else{
			$error=1;                    // otherwise show error 
		}

	}



?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="Framework/css/bootstrap.css" rel="stylesheet">
    <link href="Framework/css/mycss.css" rel="stylesheet">
	<title>Login System</title>
</head>
<body bgcolor="black">
	<div class="container-fuild">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        
         <h1 align="center" style="font-family:verdana;">People Health Pharmacy</h1> 
        
                    
                </div>
                <div class="margin">
                    <div class="row">
                    <div class="col-xs-4"><p></p></div>
                    <div class="col-xs-4"><p>
                    <form action="" method="POST">
                        <div class="form-group <?php if($error==1){ ?>has-error<?php } ?>">

                            <label for="user_name">
                                User Name
                            </label>
                            <input type="text" required name="user_name" class="form-control" placeholder="Enter your user name">

                            <br />

                            <label for="password">
                                Password
                            </label>
                            <input type="password" required name="password" class="form-control" placeholder="Enter your password">

                        </div>

                        <br />
                        <input type="submit" name="submit" value="Log in" class="btn btn-success btn-block">
                        <br>
                        <a href="signup.php">New? Signup for new account here</a>
                    </form>

                </div>
            </div>

            </div>
        </div>
	</div>
    
    <script src="Framework/js/jquery-3.1.1.min.js"></script>
    <script src="Framework/js/bootstrap.min.js"></script>
</body>
</html>

<?php if($error==1){ ?>
<script type="text/javascript">
	window.onload=function(){
		alert("Incorrect Username or Password");
	}
</script>
<?php } ?>