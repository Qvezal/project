<?php 
	$Name = $_GET['mail'];
	$Date = date("Y-m-d H:i:s", time());
	$UnixTime = time();
	$connection = mysqli_connect('localhost','admin', 'admin', 'Workers');
	if (!$connection) {		
		die('Databases connection FAILED :( ');
	}
	
	$query = "INSERT INTO Opened(mail, time, unixtime) VALUES ('$Name', '$Date', '$UnixTime')";

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die('Query FAILED'.mysqli_error($connection));
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
	<h1>You have authorized</h1>
	<h1><?php echo($Date); ?></h1>
</div>
</body>
</html>