<!--Get the data we want to update-->
<?php
if(isset($_POST['fetchTable'])){ // button name
echo"To be Updated ...!!! <br><br>	";
}
require 'connection.php'; // Establish connection with the SQL database
$conn    = Connect();
$id      = $conn->real_escape_string($_POST['fetchTable']);
// SQL SELECT STATEMENT
$query   = "SELECT *  FROM myform.cform WHERE ID ='".$id."' ";
$success = $conn->query($query);
// Fetch SQL table
$row = mysqli_fetch_array($success);
$conn->close();
?>

<!--#####################################  HTML  CODE ##################################################-->
<!DOCTYPE html>
<html>
<head></head>
<style>
.up {
	border:none;
    width:128px;
    height:128px;
    background: url('updateico.png') no-repeat;
}
</style>
<body>
<form     action="http://localhost/contactform/">
          <input type="submit" value="Go Back" /><br><br>
</form>

<!--Table to display the records we want to Update -->
<table width="400" border="0" cellspacing="1" cellpadding="0" >
<tr bgcolor="#339966">
<form name="form2" method="post" action="updateTable.php">
<td>First Name</td>
<td>Last Name</td>
<td>Number</td>
<td>Company</td>
<td>Email</td>
<tr>
<td>
<input name ="form_name"  value="<?php echo $row['form_name']; ?>" >
</td>
<td>
<input name="form_lname"  value="<?php echo $row['form_lname']; ?>" >
</td>
<td>
<input name="form_number" value="<?php echo $row['form_number']; ?>" >
</td>
<td>
<input name="form_company" value="<?php echo $row['form_company']; ?>" >
</td>
<td>
<input name="form_email"   value="<?php echo $row['form_email']; ?>" >
</td>
</tr>
<tr><td><br><button type="submit" name="update" class="up"  value="<?php  echo $row['ID']; ?>"></button></td></tr>
</form>
</tr>
</table>
</body>
</html>	