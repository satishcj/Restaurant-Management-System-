<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza_inn";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO food_details(food_name, food_description, food_price, food_photo, food_category) VALUES('$name','$description','$price','$category')";
$result = $conn->query($sql);




    
    //Check whether the query was successful or not
    
	if ($result->num_rows > 0) {
    // output data of each row
    header("location: foods.php");
        exit();
} else {
    echo "Error";
}
	
	$conn->close();

 ?>
