
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




$sql = "SELECT * FROM orders_details,members WHERE members.member_id='$memberId' AND orders_details.member_id='$memberId'";
$result = $conn->query($sql);


$conn->close();
?>


<?php
    
	$items = "SELECT * FROM cart_details WHERE member_id='$memberId' ";
$num_items = $conn->query($items);

?>

<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Food Plaza:Member Home</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>

<div id="header">
  <div id="logo"> <a href="index.php" class="blockLink"></a></div>
  <div id="company_name">Food Plaza Restaurant</div>
</div>
<div id="center">
<h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<a href="member-profile.php">My Profile</a> | <a href="cart.php">Cart[<?php echo $num_items;?>]</a>  <a href="partyhalls.php">Party-Halls</a> | <a href="logout.php">Logout</a>
<p>Here you can view order history and delete old orders from your account. Invoices can be viewed from the order history. You can also make table reservations in your account. For more information <a href="contactus.php">Click Here</a> to contact us.
<h3><a href="foodzone.php">Order More Food!</a></h3>
<hr>
<table border="0" width="910" style="text-align:center;">
<CAPTION><h2>ORDER HISTORY</h2></CAPTION>
<tr>
<th>Order ID</th>
<th>Food Photo</th>
<th>Food Name</th>
<th>Food Category</th>
<th>Food Price</th>
<th>Quantity</th>
<th>Total Cost</th>
<th>Delivery Date</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		echo "<tr>";
echo "<td>" . $row['order_id']."</td>";
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['category_name']."</td>";
echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Cancel Order</a></td>';
echo "</tr>";
		
    }
} else {
    echo "0 results";
}




?>
</table>
</div>
</div>
<div id="footer">
    <div class="bottom_menu"><a href="index.php">Home Page</a>  |    <a href="foodzone.php">Food Zone</a>  |  <a href="manager/login.php">Restaurant Manager</a> |<br>
  | <a href="admin/login.php" target="_blank">Administrator</a> |</div>
  
</div>
</div>
</body>
</html>
