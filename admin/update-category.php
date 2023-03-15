<?php
ob_start() ;
include('partials/menu.php') ;
?>

<div class="main-content">
<div class="wrapper">
<h1>Update category</h1>
<br><br>

<?php
if(isset($_GET['id'])) 
{
//echo " getting id and data";

$id=$_GET['id'];

//crete a sql query to get all data with the help of id
$sql=" SELECT * FROM tbl_category WHERE id=$id";

//execute the query
$res=mysqli_query($conn,$sql) ;

$count=mysqli_num_rows($res) ;

if($count==1) 
{
//get all data
$row=mysqli_fetch_assoc($res) ;
$title=$row['title'];
$current_image=$row['image_name'];
$featured=$row['featured'];
$active=$row['active'];

}

else
{
header('location:'.SITEURL.'admin/manage-category.php') ;
}

}
else{
header('location:'.SITEURL.'admin/manage-category.php') ;

}

?>




<form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">

<tr>
<td>Title:</td>
<td>
<input type="text" name="title" value="<?php echo $title;?>">


</td>

</tr>


<tr>
<td>current image:</td>
<td>
<?php
 if($current_image!="") 
{
//display image
?>
<img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="150px">
<?php
}
else
{
echo "IMAGE WAS UNAVAILABLE PREVIOUS";

}
?>
</td>

</tr>


<tr>
<td>New  image:</td>
<td>
 <input type="file" name="image">
</td>

</tr>






<tr>
<td>Featured:</td>
<td>
 <input 
type="radio" name="featured" value="Yes">Yes

 <input  type="radio" name="featured" value="No">No
</td>

</tr>



<tr>
<td>Active:</td>
<td>
 <input  type="radio" name="active" value="Yes">Yes

 <input  type="radio" name="active" value="No">No
</td>

</tr>



<tr>
<td>
<input type="hidden" name="current_image" value="<?php echo $current_image;?>">

<input type="hidden" name="id" value="<?php echo $id;?>">

 <input type="submit" name="submit" value="Update Category" class="btn-secondary">


</td>

</tr>

</table>
</form>



<?php
if(isset($_POST['submit']) )
{
//get all updated data
  $id=$_POST['id'];
 $title=$_POST['title'];
$current_image=$_POST['current_image'];
$featured=$_POST['featured'];
 $active=$_POST['active'];
//updating image if selected 
//check wheather the image is selected or not 

if(isset($_FILES['image']['name'])) 
{
$image_name=$_FILES['image']['name'];

if($image_name!="") 
{
//image available
//A.upload the new image 

$source_path=$_FILES['image']['tmp_name'];
  $destination_path="../images/category/".$image_name;

       $upload=move_uploaded_file($source_path,$destination_path) ;

if($upload==false) 
{
$image_name="";
//echo "fail to upload image";
//stop the process
header('location:'.SITEURL.'admin/manage-category.php') ;
}
//B.remove the  current image 
$remove_path="../images/category/".$current_image;
$remove=unlink($remove_path) ;
if($remove==false) 
{

echo "faileed ";

}

}
else
{
$image_name=$current_image;
}




}
else
{
$image_name=$current_image;
}

//updating database

$sql2="UPDATE tbl_category SET title='$title',
image_name='$image_name', 
featured='$featured', 
active='$active'
WHERE id=$id

";

//execute the query 
$res2=mysqli_query($conn,$sql2) ;
if($res2) 
{
//echo "update in database also";
header('location:'.SITEURL.'admin/manage-category.php') ;

}
else
{
//echo " not updated in database also ";
header('location:'.SITEURL.'admin/manage-category.php') ;
}




}



?>


</div>
</div>

<?php
include('partials/footer.php') ;
?>