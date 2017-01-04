<!--Delete records from the Database -->
<?php
if(isset($_POST['deleteMe'])){ // button name
echo"Deleting ...!!! <br><br>	";
}
require 'connection.php'; // Establish connection with the SQL database
$conn    = Connect();
$id      = $conn->real_escape_string($_POST['deleteMe']);
// SQL DELETE STATEMENT
$query   = "DELETE  FROM myform.cform WHERE ID ='".$id."' ";
$success = $conn->query($query);

if (!$success) {
	die("Couldn't delete data: ".$conn->error);
	}else      {
		echo "Data Deleted Successfully  <br><br>";
		echo "info: You deleted a record with ID= ",$id; //Display ID value of the previously deleted record
	}
	
$conn->close();
?>

<!--#####################################  HTML  CODE ##################################################-->
<!--ADD a go back button -->
<!DOCTYPE html>
<html>
<head></head>
<body>
<form     action="http://localhost/contactform/">
          <input type="submit" value="Go Back" /><br><br>
</form>
</body>
</html>	