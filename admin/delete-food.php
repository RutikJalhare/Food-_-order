<?php
ob_start() ;
//include constant. php 
//if (isset($_GET['id']) AND isset($_GET['image_name'])) 
include ('../config/constants.php') ;


//delete food page
if(isset($_GET['id']) AND isset($_GET['image_name'])) 

{
//echo "get the id and image name";
 $id=$_GET['id'];
 $image_name=$_GET['image_name'];
//2.remove the image if available 
//check wheather the image is available or not and delete image only if available 
if($image_name!="") 
{
//it has image and need to remove from folder 
//get the image path 
$path="../images/food/".$image_name;
//remove image file from folder 
$remove=unlink($path) ;

//chech wheather the image is remove or not 
if($remove==false) 
{
//failed to remove image
header('location:'.SITEURL.'admin/manage-food.php') ;
die() ;
}

}

//3.delete food from database 
$sql="DELETE FROM tble_food WHERE id=$id";

//execute the query
$res=mysqli_query($conn,$sql) ;

//check wheather the query execute or not 
// 4.redirect to manage food with msg 

if($res==true) 
{
//food deleted
header('location:'.SITEURL.'admin/manage-food.php') ;
}
else
{
//failed to delete food
header('location:'.SITEURL.'admin/manage-food.php') ;
}


}
else
{
//echo "not geeting the value";
header('location:'.SITEURL.'admin/manage-food.php') ;
}


?>