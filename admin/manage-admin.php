<?php
include('partials/menu.php') ;
?>



<!--main_content section start-->
<div class="main_content">
<div class="wrapper">
<h1>Manage Admin</h1>
<br/>
<br/>

<!---button to add admin-->
<a href="add-admin.php" class="btn-primary">Add Admin</a>
<br/>
<br/>
<table class="tbl_full">
<tr>
<th>S.N</th>
<th>Full Name</th>
<th>Username</th>
<th>Actions</th>
</tr>

<?php
//query to get all admin
$sql="SELECT *FROM tbl_admin";

//Execute the query 
$res=mysqli_query($conn,$sql) ;

//check wheather the query is executed or not 
if($res==TRUE)
 {
//count the row to check wheather we have data in data base or not 
$count=mysqli_num_rows($res) ;//function to get all rows in  the database


$sn=1;//create a variable and assign value to it 

//check the number of rows
if($count>0) 
{
//we have data in database
while($rows=mysqli_fetch_assoc($res)) 
{//using while loop to get all data from database

//and while loop will be run as long as we have data in database

//get individual data
$id=$rows['id'];
$full_name=$rows['full_name'];
$username=$rows['username'];

//display the Value in table
?>


<tr>
<td> <?php echo $sn++?> </td>
<td><?php echo $full_name?></td>
<td><?php echo $username?></td>
<td>


<a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change password</a>



<a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">update Admin<a>

<a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin<a>


</td>
</tr>




<?php
}


}
else{
//we don't have data in database
}

}
?>


















</table>

</div>
</div>
<!--main_content section ends-->

<?php
include('partials/footer.php') ;
?>
