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

$sql = "SELECT * FROM food_details,categories WHERE food_details.food_category=categories.category_id";
$result = $conn->query($sql);

$sql = "SELECT * FROM categories";
$categories = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html ">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Foods</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Foods Management </h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="760" align="center">
<CAPTION><h3>ADD A NEW FOOD</h3></CAPTION>
<form name="foodsForm" id="foodsForm" action="foods-exec.php" method="post" enctype="multipart/form-data" onsubmit="return foodsValidate(this)">
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" id="name" class="textfield" /></td><a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> 
    <td><textarea name="description" id="description" class="textfield" rows="2" cols="15"></textarea></td>
    <td><input type="text" name="price" id="price" class="textfield" /></td>
    <td width="168"><select name="category" id="category">
    <option value="select">- select one option -
    <?php 
    //loop through categories table rows
    
	if ($categories->num_rows > 0) {
    // output data of each row
    while($row = $categories->fetch_assoc()) {
    echo "<option value=$row[category_id]>$row[category_name]"; 
    }
} else {
    echo "0 results";
}
	
	
    ?>
    </select></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</form>
</table>
<hr>
<table width="950" align="center">
<CAPTION><h3>AVAILABLE FOODS</h3></CAPTION>
<tr>
<th>Food Photo</th>
<th>Food Name</th>
<th>Food Description</th>
<th>Food Price</th>
<th>Food Category</th>
<th>Action(s)</th>
</tr>


<?php


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

echo "<tr>";
 echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['food_description']."</td>";
 echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-food.php?id=' . $row['food_id'] . '">Remove Food</a></td>';
echo "</tr>";

    }
} else {
    echo "0 results";
}







?>
</table>
<hr>
</div>
<div id="footer">
</div>
</div>
</body>
</html>