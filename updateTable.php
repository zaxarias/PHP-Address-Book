<!--Submit records to Update Database -->
<?php
if(isset($_POST['update'])){ // button name
echo"Updated ...!!! <br><br>	";
}
require 'connection.php';  // Establish connection with the SQL database
$conn           = Connect();
// GET THE FORM VALUES
$id             = $conn->real_escape_string($_POST['update']);
$name           = $conn->real_escape_string($_POST['form_name']);
$lname          = $conn->real_escape_string($_POST['form_lname']);
$num            = $conn->real_escape_string($_POST['form_number']);
$comp           = $conn->real_escape_string($_POST['form_company']);
$email          = $conn->real_escape_string($_POST['form_email']);
// SQL UPDATE STATEMENT
$query          = "UPDATE myform.cform SET FORM_NAME='".$name."' , FORM_LNAME='".$lname."' ,
                   FORM_NUMBER='".$num."' , FORM_COMPANY='".$comp."' , FORM_EMAIL='".$email."' WHERE ID='".$id."' ";
$success        = $conn->query($query);
// Display messages
if (!$success) {
	die("Couldn't update data: ".$conn->error);
	}
echo "Data Updated Successfully  <br>";
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