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
<br>
<h3> PET SELECTED RECORD DETAILS
<br>
<?php
$PetID = $_POST["Pet_Id"];

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
	$queryGet="SELECT* FROM PET WHERE Pet_Id = '".$PetID."' ";
	$resultGet=$conn->query($queryGet);
	
	if ($resultGet->num_rows > 0) {
	 while($row = $resultGet->fetch_assoc()) {
?>

<form action="pet_editSave.php" method="POST" onsubmit="return confirm('Are you sure to UPDATE this record?')">
<br>
Pet ID: <?php echo $row["Pet_Id"]; ?>
<br><br>
Pet Name:<input type="text" name="petname" id="petname" size="15" maxlength="15" value="<?php echo $row["Pet_Name"]; ?>" required>
<br><br>
Pet Type:
<?php $petType = $row["Pet_Type"];?>
<select name="pettype" required>
	<option value="Bird" <?php if ($petType == "Bird") echo "selected" ?>>Bird</option>
	<option value="Cat" <?php if ($petType == "Cat") echo "selected" ?>>Cat</option>
	<option value="Dog" <?php if ($petType == "Dog") echo "selected" ?>>Dog</option>
	<option value="Rabbit" <?php if ($petType == "Rabbit") echo "selected" ?>>Rabbit</option>
</select>
<br><br>
Pet Breed:<input type="text" name="petbreed" id="petbreed" size="20" maxlength="20" value="<?php echo $row["Pet_Breed"]; ?>" required>
<br><br>
Pet Color:<input type="color" name="petcolor" value="<?php echo $row["Pet_Color"]; ?>" required><i style="color:red;">*</i>
<br><br>
Pet Age(month):<input type="number" name="petage" id="petage" min="0" value="<?php echo $row["Pet_Age"]; ?>" required>
<br><br>
Pet Sex:<?php $petSex = $row["Pet_Sex"]; ?>
		<input type="radio" name="petsex" value="Male" <?php if ($petSex == "Male") echo "checked" ?>>Male
		<input type="radio" name="petsex" value="Female" <?php if ($petSex == "Female") echo "checked" ?> >Female
<br><br>
Pet Price <i style="color:red;">(min = $10)</i>:<input type="number" id="petprice" name="petprice" min="10" max="9999999" step="0.01" value="<?php echo $row["Pet_Price"]; ?>" required>
<br><br>
<input type="hidden" name="petid" value="<?php echo $row["Pet_Id"]; ?>">
<input type="submit" value="Update New Details">
<input type="reset" value="Cancel">

<?php
}
}
else
{
	echo "<tr><td colspan='8'> NO data selected </td></tr>";
}
}
$conn->close();
?>
</form>
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