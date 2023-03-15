
<?php
include('partials/menu.php') ;
?>


<!--menu section ends-->


<!--main_content section start-->
<div class="main_content">
<div class="wrapper">
<h1>Dashboard</h1>

<div class="col-4 text-center">
<!--counting  number if categories available  and display here-->

<?php
//sql query
$sql="SELECT * FROM tbl_category";
//execute query
$res=mysqli_query($conn,$sql) ;
$count=mysqli_num_rows($res) ;
?>

<h1><?php echo $count;?></h1>
Categories
</div>

<div class="col-4 text-center">
<?php
//sql query
$sql2="SELECT * FROM tble_food";
//execute query
$res2=mysqli_query($conn,$sql2) ;
$count2=mysqli_num_rows($res2) ;
?>

<h1><?php echo $count2;?></h1>
Foods
</div>


<div class="col-4 text-center">
<?php
//sql query
$sql3="SELECT * FROM tbl_order";
//execute query
$res3=mysqli_query($conn,$sql3) ;
$count3=mysqli_num_rows($res3) ;
?>


<h1><?php echo $count3?></h1>
Total Order
</div>


<div class="col-4 text-center">
<?php
//create sql query to get total revenue generated
//Aggregate function in sql 
$sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
//execute the query 
$res4=mysqli_query($conn,$sql4) ;
//get the value
$row4=mysqli_fetch_assoc($res4) ;
//get the total revenue
$total_revenue=$row4['Total'];
?>
<h1>₹<?php  echo $total_revenue;?></h1>
Revenue Generated
</div>
<div class="clearfix"></div>
</div>
</div>
<!--main_content section ends-->




<?php
include('partials/footer.php') ;
?>














                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              