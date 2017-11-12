<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);


$conn->close();
?>


<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Categories</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Categories Management</h1>
<a href="index.php">Home</a> | <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="320" align="center">
<CAPTION><h3>ADD A NEW CATEGORY</h3></CAPTION>
<form name="categoryForm" id="categoryForm" action="categories-exec.php" method="post" onsubmit="return categoriesValidate(this)">
<tr>
    <th>Name</th>
    <th>Action(s)</th>
</tr>
<tr>
    <td><input type="text" name="name" class="textfield" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</form>
</table>
<hr>
<table width="320" align="center">
<CAPTION><h3>AVAILABLE CATEGORIES</h3></CAPTION>
<tr>
<th>Category Name</th>
<th>Action(s)</th>
</tr>
<?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		echo "<tr>";
echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-category.php?id=' . $row['category_id'] . '">Remove Category</a></td>';
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