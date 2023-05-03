<?php
session_start();

if(isset ($_SESSION["UID"])) {
?>
<html>
<head>
<title>DC98260 Wonder Pet Shop</title>
</head>

<body>
<h2> WELCOME, Hi <?php echo $_SESSION["UID"];?> </h2>
<p> Choose your menu: </p>

<?php
	if ($_SESSION["UserType"] == "Admin") {
	?>
	
	<a href="viewPet.php"> View Pet List </a>
	<br><br>
	
	<?php
	}
	else {
	?>
	<a href="pet_form.php"> Register New Pet </a>
	<br><br>
	<a href="pet_editView.php"> Edit Pet Details </a>
	<br><br>
	<a href="pet_editView.php"> Delete Pet Record </a>
	<br><br>
	<a href="viewPet.php"> View Pet List </a>
	<br><br>
	<?php
	}
	?>
<a href="logout.php">Logout</a>
<br>
</body>
</html>
<?php
}
else
{
	echo "No session exist or session has expired. Please log in again.<br>";
	echo "<a href='login.html'> Login </a>";
}
?>