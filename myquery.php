<!--Submit (insert) records to the Database -->
<?php
require 'connection.php';  // Establish connection with the SQL database
$conn           = Connect();
//GET THE FORM VALUES
$name           = $conn->real_escape_string($_POST['form_name']);
$lname          = $conn->real_escape_string($_POST['form_lname']);
$num            = $conn->real_escape_string($_POST['form_number']);
$comp           = $conn->real_escape_string($_POST['form_company']);
$email          = $conn->real_escape_string($_POST['form_email']);
// SQL INSERT STATEMENT 
$query          = "INSERT into myform.cform (form_name,form_lname, form_number, form_company, form_email) VALUES('" . $name . "','" . $lname . "','" . $num . "','" . $comp . "' , '" .  $email ."')";
$success        = $conn->query($query);
// Display messages
if (!$success) {
	die("Couldn't enter data: ".$conn->error);
	}
echo "Data Stored Successfully  <br>";
$conn->close();
?>

<!--#####################################  HTML  CODE ##################################################-->
<!DOCTYPE html>
<html>
<head></head>
<body>
<!--ADD a go back button -->
<form action    ="http://localhost/contactform/">
    <input type ="submit" value="Go Back" /><br><br>
</form>
</body>
</html>