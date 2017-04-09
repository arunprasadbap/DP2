<?php
     // get post info
    //$itemID    = $_POST['itemID'];
        $itemName  = $_POST['itemname'];
        $itemDesc  = $_POST['itemdec'];
        $itemCount = $_POST['itemcount'];
        $itemPrice = $_POST['itemprice'];
        $count = count($itemId);

    // authentication to the database
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }else{
                  
                      // select database
        mysqli_select_db($conn, "dp2");

        //Get next item ID from auto increment
        $sql = "SHOW TABLE STATUS WHERE `Name` = 'inventory';";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        $itemId = $data['Auto_increment'];

        // Add into Inventory table
        $sql = "INSERT INTO `dp2` (itemId, itemname, itemcount, itemprice) VALUES($itemId, '$itemname', '$itemcount', '$itemprice')";
                      
             
        if (mysqli_query($conn, $sql)) {
            //Add item into Inventory Item table
            $item_count = 0;
            for ($i=0; $i<$count; $i++){
                $sql = "INSERT INTO inventory (itemId, itemname, itemcount, itemprice) VALUES($itemId, '$itemname', '$itemcount', '$itemprice')";

                if (mysqli_query($conn, $sql)){
                    
                    $item_count++;
                } else {
                    echo "Error: $sql <br />" . mysqli_error($conn);
                }
            }
       
                if ($item_count == $count){
                echo "<div>
                <script>
                        window.alert('Record added successfully!');
                        window.location.href = 'showall.php';
                </script>
                </div>";
            }
        } else {
            echo "Error: $sql <br />" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>