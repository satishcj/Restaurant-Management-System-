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

$sql = "SELECT username, firstname, lastname FROM user";
$result = $conn->query($sql);


$conn->close();
?>

<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Index</title>
<link href="stylesheets/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/admin.js">
</script>
</head>
<body>
<div id="page">
<div id="header">
<h1>Administrator Control Panel</h1>
 <a href="categories.php">Categories</a> | <a href="foods.php">Foods</a> | <a href="accounts.php">Accounts</a> | <a href="orders.php">Orders</a> |  <a href="options.php">Options</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<table width="1000" align="center" style="text-align:center">
<CAPTION><h3>CURRENT STATUS</h3></CAPTION>
<tr>
    <th>Members Registered</th>
    <th>Orders Placed</th>
    <th>Orders Processed</th>

    
</tr>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["username"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

?>
</table>
<hr>

<hr>
</div>
<div id="footer">

</div>
</div>
</body>
</html>
