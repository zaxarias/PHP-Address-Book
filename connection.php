<!--PHP code to connect to the SQL Database -->
<?php
function Connect()
    {
	$dbhost = "localhost"; //localhost for local database
	$dbuser = "root";      //User name
	$dbpass = "root";      //password
	$dbname = "myform";    // Database name
	                       // Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
	return $conn;
	}
?>