<?php 
include("db.php");
include("header.php");
?>
<div class="container">
<div class="panel panel-default">
<div class="panel panel-heading">
<h2>
<a class="btn btn-info pull-right" href="all.php">Back</a>
</h2>
<div class="panel panel-body">
<form action="index1.php" method="POST">
<table class="table table_striped">
<tr>
<th>Serial Number</th><th>Name</th><th>Roll Number</th><th>Attendence Status</th>
</tr>

</div>

<?php  
$result=mysqli_query($connection,"select * from attendence_record where date = '$_POST[date]'");
$serialnumber=0;
$counter=0;
while($row=mysqli_fetch_array($result))
{
$serialnumber++;
?>
<tr>
<td> <?php echo $serialnumber; ?> </td>
<td> <?php echo $row['std_name']; ?>
 </td>
<td> <?php echo $row['std_roll']; ?> 
</td>
<td> 
<input type="radio" name="attend_status[<?php echo $counter; ?>]"  
<?php if($row['attend_status']=="Present") 
echo"checked=checked";?>
value="Present">Present
<input type="radio" name="attend_status[<?php echo $counter; ?>]"
<?php if($row['attend_status']=="Absent") 
echo"checked=checked";?>
 value="Absent">Absent
</td>
</tr>
<?php 
$counter++;
 }  ?>

</table>
</form>
</div>
</div>
</div>