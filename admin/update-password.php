<?php 
include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
   <h1>change password</h1>
<br><br>

<?php

if(isset($_GET['id'])){
$id=$_GET['id'];
} 
?>




<form action="" method="POST">
<table class="tbl-30">
<tr>
<td>current_Password:</td>
<td>
<input type="password" name="current_password" placeholder="old password">
</td>
</tr>

<tr>
<td>New_Password:</td>
<td>
<input type="password" name="new_password" placeholder="new password">
</td>
</tr>

<tr>
<td>Confirm_Password:</td>
<td>
<input type="password" name="confirm_password" placeholder="Confirm password">
</td>
</tr>



<tr>
<td colspan="2">

<input type="hidden" name="id" value="<?php echo $id;?>">

<input type="submit" name="submit" value="change_password" class="btn-secondary">
</td>
</tr>
</table>
</form>

</div>
</div>

<?php
//check wheather the submit button is click or not 
if(isset($_POST['submit']))
{

//echo "click";

// get data from form 
$id=$_POST['id'];

$current_password=md5($_POST['current_password']);

$new_password=md5($_POST['new_password']);

$confirm_password=md5($_POST['confirm_password']);


//check wheather the user with current id and current password exist or not

$sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";


//execute the query
$res=mysqli_query($conn,$sql) ;

if($res==true) 
{
//check wheather data is available or not 
$count=mysqli_num_rows($res) ;

if($count==1)
{
//user exits and password can be changed

//check wheather the new and confirm password match or not 
if($new_password==$confirm_password) 
{
//update password query 
//echo "PASSWORD CHANGE SUCCESSFULLY";
$sql2="UPDATE tbl_admin SET password='$new_password'
where id=$id";

//execute the query
$res2=mysqli_query($conn,$sql2) ;

//check wheather the query execute or not 

if($res2==true) 
{
echo "PASSWORD UPDATED SUCCESSFULLY";
}
else
{
echo "FAILED TO UPDATE PASSWORD";

}
}
else
{
echo " New and confirm password not match ";
}


}
else
{
echo " USER NOT EXIST";
}




}

//check wheather the new password and confirm password match or not 


//Change password if all above is true 



}




?>









<?php include('partials/footer.php') ;

?>