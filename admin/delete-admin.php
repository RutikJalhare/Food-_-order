<?php

//including the constanta.php file here for database con connection
include('../config/constants.php') ;

//1.get the id of admin to be deleted

$id=$_GET['id'];


//2.query to delete admin
$sql="DELETE FROM tbl_admin WHERE id=$id";


//execute the query
$res=mysqli_query($conn,$sql) ;

//check wheather query execute or not
if($res==true) {
header('location:'.SITEURL.'admin/manage-admin.php') ;

}
else{
header('location:'.SITEURL.'admin/manage-admin.php') ;

}





?>