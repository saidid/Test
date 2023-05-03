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
<?php
$name = $_POST["petname"];
$type = $_POST["pettype"];
$breed = $_POST["petbreed"];
$color = $_POST["petcolor"];
$age = $_POST["petage"];
$sex = $_POST["petsex"];
$price = $_POST["petprice"];
?>

<body>

<h2>Pet Registration Details</h2>

<table border="5" width="50%">
	<tr>
		<td>Pet Name:</td><td style="color:blue"><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>Pet Type:</td><td><?php echo $type; ?></td>
	</tr>
	<tr>
		<td>Pet Breed:</td><td><?php echo $breed; ?></td>
	</tr>
	<tr>
		<td>Pet Color:</td><td style="background-color:<?php echo $color; ?>;" ><?php echo $color; ?></td>
	</tr>
	<tr>
		<td>Pet Age(month):</td><td><?php echo $age; ?></td>
	</tr>
	<tr>
		<td>Pet Sex:</td><td><?php echo $sex; ?></td>
	</tr>
	<tr>
		<td>Pet Price:</td><td><?php echo $price; ?></td>
	</tr>
	
</table>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dc98260_petshopdb";

$conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error)
{
	die("Error, Something Wrong".$conn->connect_error);
}
else
{
	$queryInsert="INSERT INTO PET (Pet_Name,Pet_Type,Pet_Breed,Pet_Color,Pet_Age,Pet_Sex,Pet_Price, Owner_Id)
	VALUES('".$name."','".$type."','".$breed."','".$color."','".$age."','".$sex."','".$price."', '".$_SESSION["UID"]."')";
}
if ($conn->query($queryInsert) === TRUE)
{
	echo "<p style='color:blue;'>Success insert record</p>";
}
else
{
	echo "<p style='color:red;'>Error, Something Went Wrong".$conn->error. "</p>";
}
$conn->close();
?>
<br>

<p style="color:black">Click <a style="color:blue" href = "pet_form.php"> here </a> to enter NEW PET details</p>
<p style="color:black">Click <a style="color:blue" href = "ViewPet.php"> here </a> to view ALL PET details</p>

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