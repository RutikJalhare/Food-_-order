
<?php
include('partials/menu.php') ;
?>

<!--main_content section start-->
<div class="main_content">
<div class="wrapper">
<h1>Manage Category</h1>

<br/>
<br/>
<!---button to add admin-->
<a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
<br/>
<br/>
<table class="tbl_full">
<tr>
<th>S.N</th>
<th>Title</th>
<th>Image</th>
<th>Featured</th>
<th>Active</th>
<th>Actions</th>

</tr>

<?php
//query to get all category from database
$sql="SELECT *FROM tbl_category";

//execute the query
$res=mysqli_query($conn,$sql) ;
//count rows

//create a serial variable assign it value 1
$sn=1;

$count=mysqli_num_rows($res) ;
//check wheather we have data in database or not 
if($count>0) 
{
//we have data in database
//get the data display
while($rows=mysqli_fetch_assoc($res)) 
{
$id=$rows['id'];
$title=$rows['title'];
$image_name=$rows['image_name'];
$featured=$rows['featured'];
$active=$rows['active'];
?>

<tr>
<td><?php echo $sn++?></td>
<td><?php echo $title?></td>

<td>
<?php
//check wheather image ne is available or not
if($image_name!="") 
{
//display image

?>
<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
<?php
}
else
{
// if image is not available then display the message 
echo "Image not added";

}


?>
</td>





<td><?php echo $featured?></td>
<td><?php echo $active?></td>

<td>
<a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">update Category</a>


<a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>


</td>
</tr>




<?php
}
}
else
{
//we do not have data in database
//we will display the message inside table
?>
<tr>
<td>
<td colspan="6"><div class="error">No Category Added</div></td>

</td>

</tr>


<?php
}

?>













</table>


</div>
</div>




<?php
include('partials/footer.php') ;
?>
