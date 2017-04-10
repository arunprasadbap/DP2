<?php
if(isset($_POST['ItemName'])){
    $itemName = $_POST['ItemName'];
}
if(isset($_POST['Itemdesc'])){
    $Itemdec = $_POST['Itemdesc'];
}
if(isset($_POST['Itemcount'])){
    $Itemcount = $_POST['Itemcount'];
}

if (isset($_POST['Itemprice'])){
    $Itemprice = $_POST['Itemprice'];
}
$servername ="localhost";
$username="root";
$password="rootroot";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn){
    die("Connection failed: " . $conn->connect_error);
    } else {
       
        mysqli_select_db($conn, "dp2");

    
     //Get next item ID from auto increment
        $sql = "SHOW TABLE STATUS WHERE `Name` = 'inventory';";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        $itemId = $data['Auto_increment'];

		$sqltable = "inventory";
		
		$querycom = "insert into $sqltable (item_name, itemdec, itemcount,itemprice) values ('$itemName', '$Itemdec','$Itemcount','$Itemprice')";
		
        if (mysqli_query($conn, $querycom)){
                echo "ADDED";
//                    $item_count++;
                } else {
                    echo "Error: $sql <br />" . mysqli_error($conn);
                }
            }

            if ($item_count == $count){
                echo "<div>
                <script>
                        window.alert(' added successfully!');
                        window.location.href = 'addInventory.html';
                </script>
                </div>";
            } else {
            echo "Error: $sql <br />" . mysqli_error($conn);
        }
    mysqli_close($conn);
?>
  
    
    
    
}
