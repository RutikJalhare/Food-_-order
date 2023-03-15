<?php
include('partials/menu.php') ;
?>

<!--main_content section start-->
<div class="main_content">
<div class="wrapper">
<h1>Manage Food</h1>

<br/>
<br/>
<!---button to add admin-->
<a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>
<br/>
<br/>
<table class="tbl_full">
<tr>
<th>S.N</th>
<th>Title</th>
<th>Price</th>
<th>Image</th>
<th>Featured</th>
<th>Active</th>
<th>Action</th>
</tr>

<?php
//create sql query to get all food 
$sql="SELECT * FROM  tble_food";

//execute the query 
$res=mysqli_query($conn,$sql) ;

//count rows to check wheather we have food or not 
$count=mysqli_num_rows($res) ;

//creae serial variable and set default value as 1
$sn=1;
if($count>0)
{
//we have food in database
//get the food from database and display
while($rows=mysqli_fetch_assoc($res))
{
//get the values from individual columns 
$id=$rows['id'];
$title=$rows['title'];
$price=$rows['price'];
$image_name=$rows['image_name'];
$featured=$rows['featured'];
$active=$rows['active'];

?>

<tr>
<td><?php echo $sn++;?></td>
<td><?php echo $title;?></td>
<td><?php echo $price;?> </td>
<td>
<?php 
//check wheather we have image or not 
if($image_name=="") 
{
echo " Image Not Added";
}
else
{
?>
<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
<?php
}

?>   
</td>
<td><?php echo $featured;?></td>
<td><?php echo $active;?>  </td>


<td>
<a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php  echo $id;?>& image_name=<?php echo $image_name;?>" class="btn-secondary">update Food<a>

<a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php  echo $id;?>& image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food<a>



</td>
</tr>


<?php



}

 
}
else
{
//food is not added;
echo "<tr><td colspan='7' class='error'>Food Not Added</tr>";
}

?>



</table>


</div>
</div>
<?php
include('partials/footer.php') ;
?>



