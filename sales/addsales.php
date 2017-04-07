<?php
  // get post item
    $invoice = $_POST["invoice"];
    $date = $_POST["date"];
    $itemId = $_POST["id"];
    $itemCount = $_POST["count"];
    $count = count($itemId);

    // authentication to the database
    $servername = "localhost";
    $username = "root";
    $password = "rootroot";

    //Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // select database
        mysqli_select_db($conn, "dp2");

        //Get next sales ID from auto increment
        $sql = "SHOW TABLE STATUS WHERE `Name` = 'sales';";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);

        $salesID = $data['Auto_increment'];

        // Add into Sales table
        $sql = "INSERT INTO `sales` (salesID, salesDate, invoicenumber) VALUES($salesID, '$date', '$invoice')";

        if (mysqli_query($conn, $sql)) {
            //Add item into Sales Item table
            $item_count = 0;
            for ($i=0; $i<$count; $i++){
                $sql = "INSERT INTO salesItem (salesID, itemId, itemCount) VALUES ($salesID, '$itemId[$i]', $itemCount[$i])";

                if (mysqli_query($conn, $sql)){
                    //echo "<p>Item $itemID[$i] has been added to $salesID</p>";
                    $item_count++;
                } else {
                    echo "Error: $sql <br />" . mysqli_error($conn);
                }
            }

            if ($item_count == $count){
                echo "<div>
                <script>
                        window.alert('Record added successfully!');
                        window.location.href = 'showsales.php';
                </script>
                </div>";
            }
        } else {
            echo "Error: $sql <br />" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>
