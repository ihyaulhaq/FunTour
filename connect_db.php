<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database ="funtour";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

// $sql = "SELECT destination_name,description FROM destinations";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "" . $row["description"] ."<br>";
//   }
// } else {
//   echo "0 results";
// }
?>