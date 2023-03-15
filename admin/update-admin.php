<?php
include('partials/menu.php') ;
?>
<div class="main-content">
<div class="wrapper">
   <h1>Update Admin</h1>

<br><br>

<?php
// get the id of selected admin
$id=$_GET['id'];

//create sql query to get the details 

$sql="SELECT * FROM tbl_admin WHERE id=$id";

//Execute the query 
$res=mysqli_query($conn,$sql) ;
//check wheather the query is executed or not 
if($res==true) 
{
//check wheather the data is available in database or not 
$count=mysqli_num_rows($res) ;
//check wheather we have admin dataor not 
if($count==1) 
{
//get the details 
//get the current admin name and username

$row=mysqli_fetch_assoc($res) ;
$full_name=$row['full_name'];
$username=$row['username'];

}

else{
//redirect to manage admin page 

header('location:'.SITEURL.'admin/manage-admin.php') ;
}
}
?>

<form action="" method="POST">
<table class="tbl-30">
<tr>
<td >fullName:</td>
<td >
<input type="text" name="full_name" value="<?php echo $full_name ;?>">

</td>
</tr>

<tr>
<td >username:</td>
<td >
<input type="text" name="username" value="<?php echo $username ; ?>">

</td>
</tr>


<tr>

<td colspan="2">
<input type="hidden" name="id" value="<?php echo $id; ?>">

<input type="submit" name="submit" value="update Admin" class="btn-secondary">

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
//echo "button click";
$id=$_POST['id'];
$full_name=$_POST['full_name'];
$username=$_POST['username'];


//create a sql query to update admin
$sql="UPDATE tbl_admin SET
full_name='$full_name',
username='$username'
WHERE id='$id'
";
//execute the query
$res=mysqli_query($conn,$sql) ;
//check wheather the query executed or not 
if($res==true){
//header('location:'.SITEURL.'admin/manage-admin.php') ;
echo "updated";
}
else
{

//header('location:'.SITEURL.'admin/manage-admin.php') ;

}
}
?>
<?php
include('partials/footer.php') ;
?>