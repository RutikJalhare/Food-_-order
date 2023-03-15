<?php
ob_start() ;

include('partials/menu.php');

if(isset($_POST['submit'])) 
{
   $title=$_POST['title'];

if(isset($_POST['featured']))
{
   $featured=$_POST['featured'];
}
else{
  $featured="No";//
}


if(isset($_POST['active']))
{
   $active=$_POST['active'];
}
else{
  $active="No";}


if(isset($_FILES['image']['name'])) 
{
  $image_name=$_FILES['image']['name'];

//upload image only when image is selected


  $source_path=$_FILES['image']['tmp_name'];
  $destination_path="../images/category/".$image_name;

       $upload=move_uploaded_file($source_path,$destination_path) ;

if($upload==false) 
{
$image_name="";
//echo "fail to upload image";
//stop the process

}
else
{
//don't upload image and set image Value as black
$image_name="$image_name";
}

}

$sql="INSERT INTO tbl_category SET
title='$title',
featured='$featured', 
image_name='$image_name', 
active='$active'
";

$res=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;

if($res==true){

header('location:'.SITEURL.'admin/manage-category.php') ;

//header("location:http://0.0.0.0:8080/food-order/admin/manage-category.php ");
}
else
{

}

}
?>

<div class="main-content">
<div class="wrapper">
<h1>Add Category</h1>
<br>
<br>

<!-- Add category form start here -->
<form action="" method="POST" enctype="multipart/form-data">
<!--enctype  property help to uplt image-->
<table class="tbl-30">


<tr>
<td>Title:</td>
<td>
<input type="text" name="title" placeholder="Category title">
</td> 
</tr>

<tr>
<td>select image:</td>
<td><input type="file" name="image"></td>
</tr>

<tr>
<td>Featured:</td>
<td>
<input type="radio" name="featured" value="Yes">Yes
<input type="radio" name="featured" value="No">No

</td> 
</tr>

<tr>
<td>Active:</td>
<td>
<input type="radio" name="active" value="Yes">Yes
<input type="radio" name="active" value="No">No
</td> 
</tr>

<tr>

<td colspan="2">
<input type="submit" name="submit" value="Add Category" class="btn-secondary">


</td> 
</tr>
</table>
</form>
</div>
</div>


<?php
include('partials/footer.php');
?>