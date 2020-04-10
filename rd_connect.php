<?php
//connection to the database
$conn = mysqli_connect('localhost','root','akalol'); 
if(!$conn){
   echo "Not Connected";
}

if(!mysqli_select_db($conn,'project')){
	echo "Database not selected";
}

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password= $_POST['password'];

if (empty($name)){array_push($errors, "Name is required");} 
if (empty($email)){ array_push($errors, "Email is required"); } 
if (empty($password)) { array_push($errors, "Password is required"); } 


$query=" INSERT INTO project(name,email,mobile, password) VALUES ('$name','$email','$mobile','$password')";
if(!mysqli_query($conn,$query))
{
	echo "<script>window.alert('Data is not inserted');</script>";
	header("refresh:1 url=register.html");
}else{
	echo "<script>window.alert('Data is inserted');</script>";
	header("refresh:1 url=user.html");
	
}


?>
