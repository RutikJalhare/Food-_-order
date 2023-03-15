<?php
include('../config/constants.php');// database connection

//check wheather the submit button is click or not 
if(isset($_POST['submit'])) 
{
//process for login
//1.get the data from form
 $username=$_POST['username'];
 $password=md5($_POST['password']);

//2.sql to check user with username and password exit or not 
$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

//3.execite the query 
$res=mysqli_query($conn,$sql) ;

//4.count rows wheather the user exist or not 
$count=mysqli_num_rows($res) ;

if($count==1) 
{
//user available
//echo "user available";
header("location:http://0.0.0.0:8080/food-order/admin/index.php");
}
else{
//user not available
echo "INCORRECT USERNAME OR PASSWORD";
}
}
?>


<html>
<head>
<link rel="stylesheet" href="../css/admin.css">
<style>
div.login {
 border:1px solid grey;
width:50%;
text-align:center;
margin:5% auto;
padding:2%;
}
</style>
</head>
<body>
<div class="login">
<h1>Login-FOR ADMIN</h1>
<!-- login form start here-->
<form action="" method="POST">
Username:
<br>
<input type="text" name="username" placeholder="Enter username">
 <br><br>
Password:<br>
<input type="password" name="password" placeholder="Enter password">
<br>
<input type="submit" name="submit" value="Login" class="btn-primary">
</form>

<!-- login form Ends here-->
<p> Created by-<a href="https://www.instagram.com/">Rutik jalhare</a></p>
</div>
</body>
</html>

