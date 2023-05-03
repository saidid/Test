<?php
$userID = $_POST['userID'];
$userPwd = $_POST['userPwd'];

$host = "localhost";
$username = "root";
$password = "";
$dbname = "dc98260_petshopdb";

$link = mysqli_connect($host, $username, $password, $dbname);
if ($link->connect_error) {
 die("Error, Something Wrong" . $link->connect_error);
}
else
{
$queryCheck = "select * from USERS where UserID = '".$userID."'";
$resultCheck = $link->query($queryCheck);
if ($resultCheck->num_rows == 0) {
echo "User ID does not exists";
}
else
{
 $row = $resultCheck->fetch_assoc();
 if( $row["UserPwd"] == $userPwd ) {
 session_start();
 $_SESSION["UID"] = $userID ;
$_SESSION["UserType"] = $row["UserType"];
 header("Location:menu.php");
 } else {
 echo "Wrong password!!! <br><br>";
 echo "Click <a href='login.html'> here </a> to login again ";
 }
}
}
mysqli_close($link);
?>