<?php
include('partials/menu.php') ;
?>
<div class="main-content">
<div class="wrapper">
<h1>Add Admin</h1>
<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>Full_Name:</td>
<td><input type="text" name="full_name" placeholder="Enter your name"></td>
</tr>


<tr>
<td>Username:</td>
<td><input type="text" name="username" placeholder="Enter your usernamename"></td>
</tr>


<tr>
<td>Password:</td>
<td><input type="password" name="password" placeholder="Enter your password"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" class="btn-secondary"value="Add Admin"></td>
</tr>

</table>
</form>
</div>
</div>


<?php
include('partials/footer.php') ;
?>


<?php

//process the value from form and save it in database

// check weather submit button is click or not
if(isset($_POST['submit'])) {

$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=md5($_POST['password']);// md5 is for encryption of password

//sql query to save data in database
$sql="INSERT INTO tbl_admin SET
full_name='$full_name',
username='$username',
password='$password'
";
//^left side for column name=right side for data 

//Executed query and save data in database


$res=mysqli_query($conn,$sql)or die(mysqli_error()) ;//executing query and store data in database 




}
?>
