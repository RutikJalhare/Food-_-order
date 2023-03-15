<?php
ob_start() ;
include('partials/menu.php') ;
?>

<div class="main-content">
<div class="wrapper">
<h1> Add Food</h1>

<br><br>
<form action="" method="POST" enctype="multipart/form-data">
<table class="tbl-30">

<tr>
<td>Title:</td>
<td>
<input type="text" name="title" placeholder="Title of food">
</td>
</tr>



<tr>
<td>Description:</td>
<td>
<textarea name="description" cols="30"  rows="5" placeholder="Description  of food"></textarea>
</td>

</tr>


<tr>
<td>price:</td>
<td>
<input  type="number" name="price" cols="30" >
</td>
</tr>


<tr>
<td> select image:</td>
<td>
<input  type="file" name="image" >
</td>
</tr>



<tr>
<td>Category :</td>
<td>
<select   name="category">
<?php
//create php code to display category from database
//1.create sql query to get all active category from database 
$sql="SELECT * FROM tbl_category WHERE active='Yes'";

//execute query 
$res=mysqli_query($conn,$sql) ;

//count rows to check wheather we have category or not 
$count=mysqli_num_rows($res) ;
//if count is greather than zero, we have category else we don't have category
if($count>0) 
{
//we have category
while ($rows=mysqli_fetch_assoc($res)) 
{
//get the details of category
$id=$rows['id'];
$title=$rows['title'];
?>
<option value="<?php echo $title;?>"><?php echo $title;?></option>
<?php
}
}
else
{
//we don't have category 

?>
<option value="0">No category found</option>
<?php
}


//2 display the drop doen


?>

</select>
</td>
</tr>



<tr>
<td>Featured:</td>
<td>
<input  type="radio" name="featured"  value="Yes">Yes

<input  type="radio" name="featured"  value="No">No
</td>
</tr>



<tr>
<td>Active:</td>
<td>
<input  type="radio" name="active"  value="Yes">Yes

<input  type="radio" name="actit"  value="No">No
</td>
</tr>




<tr>
<td colspan="2">
<input  type="submit" name="submit"  value="Add Food" class="btn-secondary">

</td>
</tr>
</table>
</form>

<?php
ob_start() ;
//check wheather the button is click or not 
if(isset($_POST['submit'])) 
{
//echo "click botton";
//1.get data from form
 $title      =$_POST['title'];
 $description=$_POST['description'];
 $price      =$_POST['price'];
 $category   =$_POST['category'];



//check wheather the radio button featured and active are check or not 

if(isset($_POST['featured'])) 
{
$featured=$_POST['featured'];
}
else
{
$featured="No";//setting the default value

}


if(isset($_POST['active'])) 
{
$active=$_POST['active'];
}
else
{
$active="No";//setting the default value

}

//upload the image if selected 
if(isset($_FILES['image']['name'])) 
{
//get the details of selected image 
$image_name=$_FILES['image']['name'];

//check wheather the image is selected or not and upload image omly if selected
if($image_name!="") 
{
//image is selected


//source path is the current location of image 
$src=$_FILES['image']['tmp_name'];

//destination path for uploaded image
$dst="../images/food/".$image_name;

//finally upload the image
$upload=move_uploaded_file($src,$dst) ;

//check wheather image uploaded or not 
if($upload==false) 
{
//failed to upload the image
//redirect to add food page
//echo " fail to upload image";
header('location:'.SITEURL.'admin/add-food.php') ;
die() ;
}


}
}
else{
$image_name="";

}

//3.insert into database 
//create a sql query to save or add food

$sql2="INSERT INTO tble_food SET
title='$title',
featured='$featured', 
image_name='$image_name', description='$description', price='$price',
 category_id='$category', 
active='$active'
";
//if we don't type anything in <input type="text "> then by default string value pass to it 

$res2=mysqli_query($conn,$sql2)or die(mysqli_error($conn)) ;

if($res==true){
//echo "inserted";
header('location:'.SITEURL.'admin/manage-food.php') ;

//header("location:http://0.0.0.0:8080/food-order/admin/manage-category.php ");
}
else
{
echo "note inserted ";
}

























//for numerical value we do not need to pass value inside quotes ''but for string it is compulsory to pass value in 'quotes '


//redirect  with msg manage food page 
}

?>






















</div>
</div>

<?php
include('partials/footer.php') ;
?>
