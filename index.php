<!DOCTYPE html>
<html>
<head>
<title>PHP contact Form </title>
</head>
<!--CSS CODE -->
<style>
h1   {color: goldenrod;}
#form1{
  background: -webkit-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
  background: -moz-linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
  background: linear-gradient(bottom, #CCCCCC, #EEEEEE 175px);
  margin: 0px;
  position: relative;
  width: 30%;
  font-family: Tahoma, Geneva, sans-serif;
  font-size: 14px;
  font-style: italic;
  line-height: 24px;
  font-weight: bold;
  color: #09C;
  text-decoration: none;
  border-radius: 10px;
  padding: 10px;
  border: 1px solid #999;
  border: inset 1px solid #333;
  -webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}
input[type=text], input[type=tel], input[type=email]{
    width: 100%;
    padding: 5px 5px 0px 40px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #555;
    outline: none;
    background-color: gold;
	font-size:x-large;

}
input[type=text]:focus, input[type=email]:focus, input[type=tel]:focus {
	background-color: lightblue;
}

.search {
    background: url('searchico.png') no-repeat;
}
.name {
    background: url('nameico.png') no-repeat;
}
.tel {
    background: url('telico.png') no-repeat;
}
.comp {
    background: url('compico.png') no-repeat;
}
.email {
    background: url('emailico.png') no-repeat;
}
.del {
  padding: 8px;
  width: 10%;
  border-radius: 8px;
  background: url('delico.png') no-repeat;
  background-color: yellow;	
 
}
.up {
  padding: 8px;
  margin-right:10px;
  width: 10%;
  background: #fff; /* fallback color for old browsers */
  background: rgba(255, 255, 255, 0.5);
  border-radius: 8px;
  background: url('upico.png') no-repeat;
  background-color: gold;	


}
table { table-layout: fixed; }
td { width: 35%; }
html { 
  background: url(bgimage.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<!--CSS END -->


<body>
<h1>ADDRESS BOOK</h1>

<!--FORM NAME, LASTNAME ETC... ###### -->
<form id="form1" action="myquery.php" method="post">
  Name:<br>
  <input type="text" pattern=".{3,}"   required title="3 characters minimum" name="form_name" maxlength="12" required class="name"><br><br>
  
  Lastname:<br>
  <input type="text" pattern=".{3,}"   required title="3 characters minimum" name="form_lname" maxlength="12" required class="name"><br><br>
  
  Number:<br>
  <input type="tel" pattern="^\d{10}" required maxlength="10" name="form_number" required class="tel"><br><br>
  
  Company:<br>
  <input type="text" placeholder="optional"  name="form_company" maxlength="10" class="comp" ><br><br>
 
  Email (optional):<br>
  <input type="email" placeholder="me@example.com" name="form_email" maxlength="15" class="email"><br><br>

<input type="image" src="subico.png" value="Submit" ><br><br>
</form>
<!--FORM END ###### -->

<div id="inner_content"  style="height:400px; overflow:auto;">
<!-- Add Search feature -->
<input  type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..." title="Type in a name" class="search"><br>

<!-- Here we create the table to display our data -->
<table id="myTable" align="left" border="*" BORDERCOLOR="GREEN "cellspacing="0"  width="100%">
<tr bgcolor="#339966">
<td>First Name</td>
<td>Last Name</td>
<td>Number</td>
<td>Company</td>
<td>Email</td>
</tr>
<!-- PHP starts .. Connect to SQL Database and fetch data -->
<?php
require 'connection.php';
$conn    = Connect();
$result=mysqli_query($conn,'SELECT * FROM myform.cform ORDER BY id DESC');

/* Fetch the array from the Database*/
while($row=mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td bgcolor=#0066FF>".$row['form_name']."</td>"; 
echo"<td bgcolor=#6699FF>".$row['form_lname']."</td>";
echo"<td bgcolor=#99CCFF>".$row['form_number']."</td>";
echo"<td bgcolor=#99CCFF>".$row['form_company']."</td>";
/*  At the end (5th column) we add some html (form submit button) code for the delete Button*/
echo"<td bgcolor=#99CCFF>".$row['form_email']
/* Delete php is called, then  we pass the row value of the record we want to delete*/
."<form   action='delete.php'; method='post'; style='display: inline; margin:0'>"
."<button type='submit' name='deleteMe' value='".$row['ID']."' style='float: right;' class='del'></button>"
."</form>"

."<form   action='fetchTable.php'; method='post'; style='display: inline; margin:0'>"
."<button type='submit' name='fetchTable' value='".$row['ID']."' style='float: right; ' class='up'></button>"
."</form>"
."</td>";
echo"<tr>";
}
mysqli_close($conn);
?>

</table>
</div>
<!-- Performing Table search through this function -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>