<?php
$connection = mysqli_connect('localhost', 'root', 'akalol');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'project');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

if (isset($_POST['email']) and isset($_POST['password'])){
	
// Assigning POST values to variables.
$email = $_POST['email'];
$password = $_POST['password'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `project` WHERE email='$email' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
header("refresh:1 url=user.html");
}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
header("refresh:1 url=login.html");
}
}
?>

