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
$petID = $_POST["petid"];
$name = $_POST["petname"];
$type = $_POST["pettype"];
$breed = $_POST["petbreed"];
$color = $_POST["petcolor"];
$age = $_POST["petage"];
$sex = $_POST["petsex"];
$price = $_POST["petprice"];
?>

<body>
<h1>~DC98260 Wonder Pet Shop~</h1>
<h2>PET UPDATED</h2>

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
	$queryUpdate = "UPDATE PET SET Pet_Name='".$name."', Pet_Type='".$type."', Pet_Breed='".$breed."', Pet_Color='".$color."', Pet_Age='".$age."', Pet_Sex='".$sex."', Pet_Price='".$price."' WHERE Pet_Id='".$petID."'  ";

	if ($conn->query($queryUpdate) === TRUE)
	{
		echo "<p style='color:blue;'>Record has been updated into database.</p>";
		echo "Click <a href = 'ViewPet.php'> here </a> to view ALL PET details";
	}
	else
	{
		echo "<p style='color:red;'>Error, Something Went Wrong: ".$conn->error. "</p>";
	}
}
$conn->close();
?>
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