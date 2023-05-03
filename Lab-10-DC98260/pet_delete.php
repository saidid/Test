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
$myId = $_POST["Pet_Id"];
?>

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
	$queryDelete="DELETE FROM PET WHERE Pet_Id = '".$myId."' ";
	
	if ($conn->query($queryDelete) === TRUE)
	{
		echo "<p style='color:blue;'> Record has been deleted from database! </p>";
		echo "Click <a href='ViewPet.php'> here <a/a> to VIEW Pet List ";
	}
	else
	{
		echo "<p style='color:red;'> Query problems! : " . $conn->error . "</p>";
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