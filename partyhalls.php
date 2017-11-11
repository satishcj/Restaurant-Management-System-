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


 

$sql = "SELECT * FROM partyhalls";
$result = $conn->query($sql);


$conn->close();
?>


<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Food Plaza:Party Halls</title>
<link href="stylesheets/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="validation/user.js">
</script>
</head>
<body>
<div id="page">
  <div id="menu"><ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="foodzone.php">Food Zone</a></li>
  <li><a href="specialdeals.php">Special Deals</a></li>
  <li><a href="member-index.php">My Account</a></li>
  <li><a href="contactus.php">Contact Us</a></li>
  </ul>
  </div>
<div id="header">
  <div id="logo"> <a href="index.php" class="blockLink"></a></div>
  <div id="company_name">Food Plaza Restaurant</div>
</div>
<div id="center">
<h1>RESERVE PARTY HALL(S)</h1>
  <div style="border:#bd6f2f solid 1px;padding:4px 6px 2px 6px">
<a href="member-index.php">Home</a> | <a href="cart.php">Cart</a> |  <a href="inbox.php">Inbox</a> | <a href="tables.php">Tables</a> | <a href="partyhalls.php">Party-Halls</a> | <a href="ratings.php">Rate Us</a> | <a href="logout.php">Logout</a>
<hr>
<form name="partyhallForm" id="partyhallForm" method="post" action="reserve-exec.php?id=<?php echo $_SESSION['SESS_MEMBER_ID'];?>" onsubmit="return partyhallValidate(this)">
    <table align="center" width="320">
        <CAPTION><h2>RESERVE A PARTY-HALL</h2></CAPTION>
        <tr>
            <td><b>PartyHall Name/Number:</b></td>
            <td>
            <select name="partyhall" id="partyhall">
            <option value="select">- select partyhall -
            <?php 
           
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<option value=$row[partyhall_id]>$row[partyhall_name]";     }
            } else {
             echo "0 results";
            }
			?>
            </select>
            </td>
        </tr>
        <tr>
            <td><b>Date:</b></td><td><input type="date" name="date" id="date" /></td></tr>
        <tr>
            <td><b>Time:</b></td><td><input type="time" name="time" id="time" />
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Reserve"></td>
        </tr>
    </table>
</form>
</div>
</div>
<div id="footer">
    <div class="bottom_menu"><a href="index.php">Home Page</a>    |  <a href="manager/login.php">Restaurant Login</a>  |  <a href="foodzone.php">Food Zone</a>|<br>
  | <a href="admin/index.php" target="_blank">Administrator</a> |</div>
  
</div>
</div>
</body>
</html>