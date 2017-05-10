<?php 
	include "connection.php";

	$error=0;
    
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

	if(isset($_POST['user_name']) && isset($_POST['password'])){
		//$query="SELECT * FROM user WHERE user_name='".$_POST['user_name']."' AND password='".$_POST['password']."'";
        $passwordmd5 = md5($password);
		$query="INSERT INTO user(full_name,email,user_name,password) VALUES('$full_name', '$email', '$user_name', '$passwordmd5')";
		$rs = mysqli_query($connection,$query);
		if($rs){
			$_SESSION['login']=true;
			$error=2;
		}else{
			$error=1;
		}

	}



?>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="Framework/css/bootstrap.css" rel="stylesheet">
    <link href="Framework/css/mycss.css" rel="stylesheet">
	<title>Signup System</title>
</head>
<body>
	<div class="container">
        
        
                                
        
				<form action="" method="POST">
					<div class="form-group ">

						<label for="full_name">
							Full name
						</label>
						<input type="text" required name="full_name" class="form-control" placeholder="Enter your full name">
						<br />

						<label for="email">
							Email
						</label>
						<input type="email" required name="email" class="form-control" placeholder="Enter your email">
						<br />

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
					<input type="submit" name="submit" value="Signup" class="btn btn-success btn-block">
				</form>
			
	</div>
    
    <script src="Framework/js/jquery-3.1.1.min.js"></script>
    <script src="Framework/js/bootstrap.min.js"></script>
</body>
</html>

<?php if($error==1){ ?>
<script type="text/javascript">
	window.onload=function(){
		alert("Something Went Wrong");
	}
</script>
<?php } ?>

<?php if($error==2){ ?>
<script type="text/javascript">
	window.onload=function(){
		alert("Signed Up Successfully");
	}
</script>
<?php } ?>