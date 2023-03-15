<?php
ob_start() ;
include('partials/menu.php') ;
include('../config/constants.php') ;
?>
<?php
//chech whaeather the id us set or not 
if(isset($_GET['id'])) 
{
//get the details
$id=$_GET['id'];
//sql query to get selected food 
$sql2="SELECT * FROM tble_food WHERE id=$id";

//execute the query 
$res2=mysqli_query($conn,$sql2) ;
//get the value based on query execute 
$row2=mysqli_fetch_assoc($res2) ;
//get the individual value from database of Selected food 
$title=$row2['title'];
$description=$row2['description'];
$price=$row2['price'];
$current_image=$row2['image_name'];
$current_category=$row2['category_id'];
$featured=$row2['featured'];
$active=$row2['active'];

}


else
{
//redirect to manage food
header('location:'.SITEURL.'admin/manage-food.php') ;
}
?>











<div class="main-content">
<div class="wrapper">
<h1>Update Food</h1>
<br><br>
<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">

<tr>
<td>Title:
</td>
<td>
<input  type="text" name="title" value="<?php echo $title?>"> 
</td>
</tr>


<tr>
<td>Description:</td>
<td>
<textarea  cols="30" rows="5" name="description" ><?php echo $description?> </textarea>
</td>
</tr>


<tr>
<td>price:
</td>
<td>
<input value="<?php echo $price?>" type="number" name="price" > 
</td>
</tr>



<tr>
<td>Current image:
</td>
<td>
<?php
if($current_image=="") 
{
//image not available
echo "Image Not available";
}
else
{
//image available
?>
<img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="150px">
<?php

}

?>



</td>
</tr>



<tr>
<td>Select new image:</td>
<td>
<input type="file" name="image">
</td>
</tr>





<tr>
<td>Category:
</td>
<td>
<select name="category">
<?php
// query to get active category
$sql="SELECT * FROM tbl_category WHERE active='Yes'";

//execute the query 
$res=mysqli_query($conn,$sql) ;
//count rows
$count=mysqli_num_rows($res) ;
//check wheather the category available or not 
if($count>0) 
{
//category available
while($row=mysqli_fetch_assoc($res)) 
{
$category_title=$row['title'];
$category_id=$row['id'];
//echo "<option value='$category_id'>
//$category_title</option>";
?>
<option
<?php
if($current_category==$category_id){echo "selected";}?>value="<?php echo $category_id;?>"><?php echo$category_title;?></option>
<?php


}


}
else
{
//category not available
echo "<option value='0'>Category not available</option>";
}




?>



<option value="0">Test category</option>
</select>
</td>
</tr>





<tr>
<td>Featured:
</td>
<td>
<input type="radio" name="featured" value="Yes">Yes
<input type="radio" name="featured" value="No">No
</td>
</tr>

<tr>
<td>Active:
</td>
<td>
<input type="radio" name="active" value="Yes">Yes
<input   type="radio" name="active" value="No">No
</td>
</tr>


<tr>

<td>
<input type="hidden" name="id" value="<?php echo $id;?>">

<input type="hidden" name="current_image" value="<?php echo $current_image;?>">

<input type="submit" name="submit" value="Update Food" class="btn_secondary">



</td>
</tr>

</table>
</form>
<?php
if(isset($_POST['submit'])) 
{
//echo "click";
//1.get all the details
$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$price=$_POST['price'];

$current_image=$_POST['current_image'];
$featured=$_POST['featured'];
$category=$_POST['category'];








//2.upload the image if selected 
//check wheather upload button is click or not 
if(isset($_FILES['image']['name']))
{
//upload button is click
$image_name=$_FILES['image']['name'];//new image name

//check wheather the file is available or not 

if($image_name!="") 
{

//image is available

$src_path=$_FILES['image']['tmp_name'];//source path

$dest_path="../images/food/".$image_name;//destination path

//upload the image
$upload=move_uploaded_file($src_path,$dest_path) ;

//check wheather the image is upload or not
if($uploaded==false) 
{
//failed to uploaded
//echo "fail to upload image";
header('location:'.SITEURL.'admin/manage-food.php') ;
}
//3.remove the image if new image is uploaded and current image is exits
//b.remove current image if available 

if($current_image!="") 
{

//current image is available
//remove the image
$remove_path="..images/food/".$current_image;
$remove=unlink($remove_path) ;
if($remove==false) 
{
//failed to Remove current image
echo "failed to remove current image";
//header('location:'.SITEURL.'admin/manage-food.php') ;

die() ;
}
//check wheather the image is Remove or not 
}



}
} 
else
{
$image_name=$current_image;

}

//update the food database
$sql3="UPDATE tble_food SET
title='$title',
featured='$featured', 
image_name='$image_name', description='$description', price='$price',
 category_id='$category', 
active='$active'
WHERE id=$id;
";
//execute the query
$res3=mysqli_query($conn,$sql3) ;
//check wheather the query execute or not 
if($res3==true) 
{
//echo "food update successful";
header('location:'.SITEURL.'admin/manage-food.php') ;
}
else
{
echo "food  not update successful";
}


}
?>


</div>
</div>

<?php
include('partials/footer.php') ;
?>