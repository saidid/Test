<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<title> DC98260 Wonder Pet Shop </title>
</head>

<body>
<h2> WONDER PET LIST </h2>

<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98260_petshopdb";

$conn=new mysqli($host,$user,$pass,$db);

if ($conn->connect_error)
{
	die("Error, Something Wrong".$conn->connect_error);
}
else
{
	$queryView="SELECT* FROM PET";
	$resultQ=$conn->query($queryView);
?>

<p> Please choose which record to update: </p>

<form action="pet_editDetails.php" method="POST" onsubmit="return confirm('Are you sure to UPDATE this record?')">

<table border="2">
<tr>
<th> Choose </th>
<th> Pet ID </th>
<th> Pet Name </th>
<th> Pet Type </th>
<th> Pet Breed </th>
<th> Pet Color </th>
<th> Pet Age </th>
<th> Pet Sex </th>
<th> Pet Price </th>
</tr>

<?php
if ($resultQ->num_rows > 0) {
while($row = $resultQ->fetch_assoc()) {
?>
<tr>
<td> <input type="radio" name="Pet_Id" value="<?php echo $row["Pet_Id"];?>" required> </td>
<td><?php echo $row["Pet_Id"];?></td>
<td><?php echo $row["Pet_Name"];?></td>
<td><?php echo $row["Pet_Type"];?></td>
<td><?php echo $row["Pet_Breed"];?></td>
<td style="background-color:<?php echo $row["Pet_Color"];?>;"><?php echo $row["Pet_Color"];?></td>
<td><?php echo $row["Pet_Age"];?></td>
<td><?php echo $row["Pet_Sex"];?></td>
<td>RM<?php echo $row["Pet_Price"];?></td>
</tr>
<?php
}
}
else
{
	echo "<tr><td colspan='8'> NO data selected </td></tr>";
}
}
?>
</table>

<?php
$conn->close();
?>
<br>
<input type="submit" value="View Selected Record">
</form>


<br><br>
</body>
</html>
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>