<?php
$servername='localhost';
$username='root';
$password='';
$database_name='crud_list';
$link=mysqli_connect($servername,$username,$password,$database_name);
$con=mysqli_select_db($link,$database_name);

if($con)
{
	echo ("connection ok");
}
else
{
	die("connection failed because".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Database All Operation</title>
</head>
<body>
	<form name="form1" action="" method="post">
		<table>
			<tr>
				<td>enter name</td>
				<td><input type="text" name="username"></td>
			</tr>

			<tr>
				<td>enter city</td>
				<td><input type="text" name="city"></td>
			</tr>

			<tr>
				<td>email</td>
				<td><input type="email" name="email"></td>
			</tr>

			<tr>
				<td colspan="2" align="center">
				<input type="submit" name="submit1" value="insert">
				<input type="submit" name="submit2" value="delete">
				<input type="submit" name="submit3" value="update">
				<input type="submit" name="submit4" value="display">
				<input type="submit" name="submit5" value="search">	
				</td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php
if(isset($_POST["submit1"]))
{
	mysqli_query($link,"insert into table1 values('$_POST[username]','$_POST[city]','$_POST[email]')");
	echo "Record Insert Successfully";
}
if(isset($_POST["submit2"]))
{
	mysqli_query($link,"DELETE FROM table1 WHERE name='$_POST[username]'");
	echo "Record Delete Successfully";
}
if(isset($_POST["submit3"]))
{
	mysqli_query($link,"UPDATE table1 SET city='$_POST[city]' WHERE name='$_POST[username]'");
	echo "Record Update Successfully";
}
if(isset($_POST["submit4"]))
{
$res=mysqli_query($link,"select * from table1");
echo"<table border=1>";
	echo"<tr>";
	echo"<th>"; echo"username"; echo"</th>";
	echo"<th>"; echo"city"; echo"</th>";
	echo"<th>"; echo"email"; echo"</th>";
	echo"</tr>";
while($row=mysqli_fetch_array($res))
 {
	echo"<tr>";
	echo"<td>"; echo $row["name"]; echo"</td>";
	echo"<td>"; echo $row["city"]; echo"</td>";
	echo"<td>"; echo $row["email"]; echo"</td>";
	echo"</tr>";
}
echo"</table>";
}

if(isset($_POST["submit5"]))
{
$res=mysqli_query($link,"select * from table1 where name='$_POST[username]'");
echo"<table border=1>";
	echo"<tr>";
	echo"<th>"; echo"username"; echo"</th>";
	echo"<th>"; echo"city"; echo"</th>";
	echo"<th>"; echo"email"; echo"</th>";
	echo"</tr>";

while($row=mysqli_fetch_array($res))
 {
	echo"<tr>";
	echo"<td>"; echo $row["name"]; echo"</td>";
	echo"<td>"; echo $row["city"]; echo"</td>";
	echo"<td>"; echo $row["email"]; echo"</td>";
	echo"</tr>";
}
echo"</table>";
}
?>
