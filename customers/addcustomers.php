<?php
if(isset($_POST['CustName'])){
    $custname = $_POST['CustName'];
}
if(isset($_POST['CustID'])){
    $custID = $_POST['CustID'];
}
if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
}
if(isset($_POST['genderF'])){
    $gender = $_POST['genderF'];
}
if(isset($_POST['Custno'])){
    $custno = $_POST['Custno'];
}
if(isset($_POST['Custhm'])){
    $custhm = $_POST['Custhm'];
}

$servername ="localhost";
$username="root";
$password="rootroot";

$conn = mysqli_connect($servername,$username,$password); /// the connection name

if(!$conn){
    die("Connection failed: " . $conn->connect_error); /// pops out with a message if their is an error in connection
    } else {
       
        mysqli_select_db($conn, "dp2"); /// connects with the table customer n order to store the data.
		$sqltable = "customer";
		
		$querycom = "insert into $sqltable (customername, customerID, gender,ContactNo,Hometown) values ('$custname','$custID', '$gender','$custno',' $custhm')";
		
        if (mysqli_query($conn, $querycom)){
                echo "ADDED";
//                    $item_count++;
                } else {
                    echo "Error: $sql <br />" . mysqli_error($conn);
                }
            }

            if ($item_count == $count){ ///notifies if the customers were added correctly
                echo "<div>
                <script>
                        window.alert('Customer added successfully!'); 
                        window.location.href = 'showcustomers.php';
                </script>
                </div>";
            } else {
            echo "Error: $sql <br />" . mysqli_error($conn);
        }
    mysqli_close($conn);
?>
  
    
    
    
}
