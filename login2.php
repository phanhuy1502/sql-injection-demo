<html>
<body style="margin: 100px">
<h1> PROCESS 2 PAGE </h1>
<?php

$username = $_GET["username"];
$password = $_GET["password"];

$conn = new mysqli("localhost", "huy", "huy", "sqlinjection");

// CONSTRUCTING QUERY
$sql = "SELECT * FROM Users WHERE Users.username = '" .
 $username . "'AND Users.password = '" . $password . "'";

// CHECKING USER INPUT
if (strpos($username, 'OR') !== false or strpos($password, 'OR') !== false) {
    echo "<h3>SQL Injection Detected!</h3>";
}
else {
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "<h3>Welcome " . $row["username"]. "!</h3>";
	        break;
	    }
	} else {
	    echo "<h3>Authentication failed!</h3>";
	}
}


$conn->close();
?>
</br><a href="index2.php"><button>Back</button></a>

<h2> NOTE </h2>
	<ul>
		<li><b> Username: </b><?php echo $username?></li>
		<li><b> Password: </b><?php echo $password?></li>
		<li><b> SQL Statement: </b><?php echo $sql?></li>
	</ul>
</body>
</html>