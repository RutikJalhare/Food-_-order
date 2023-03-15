<?php
ob_start() ;
//include constants file 
include('../config/constants.php') ;
//check wheather the id and image value set or not 
if (isset($_GET['id']) AND isset($_GET['image_name'])) 
{
//echo "get the id and image name";
$id=$_GET['id'];
$image_name=$_GET['image_name'];

//remove the physical image file available
if($image_name!="") 
{
//image is available, so remove it
$path="../images/category/".$image_name;
$remove=unlink($path) ;
//if failed to remove image then add an error message
if($remove==false) 
{
//echo "fail to Remove  category image";
header('location:'.SITEURL.'admin/manage-category.php') ;
die() ;
}

}
//delete data from database 
//sql query to delete data from database 
$sql="DELETE FROM tbl_category WHERE id=$id";
//execute the query
$res=mysqli_query($conn,$sql) ;
//chect whether the data is deleted from database or not 
if($res==true) 
{

//echo "data deleted from database";
header('location:'.SITEURL.'admin/manage-category.php') ;
}
else{
echo "data not deleted from  database ";

}



}
else
{
//echo "not geeting the value";
header('location:'.SITEURL.'admin/manage-category.php') ;
}




?>