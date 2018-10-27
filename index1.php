<?php 
include("db.php");
include("header.php");

$flag=0;    $update=0;

if(isset($_POST['submit']))
{$date=date("Y-m-d ");
$record=mysqli_query($connection,"select std_name from attendence_record where date='$date'");
$num=mysqli_num_rows($record);	
if($num){
$update=1;
}

else if($num==0)
{foreach($_POST['attend_status'] as $id=>$attend_status)
{$std_name=$_POST['std_name'][$id];
$std_roll=$_POST['std_roll'][$id];
$date=date("y-m-d");
$result=mysqli_query($connection,"insert into attendence_record(std_name,std_roll,attend_status,date)values('$std_name','$std_roll','$attend_status','$date')");
if($result)
{$flag=1;}
}}}
?>

<div class="container">
<div class="panel panel-default">
<div class="panel panel-heading">

<h2>
<a class="btn btn-success" href="add.php">Add Students</a>
<a class="btn btn-info pull-right" href="all.php">View All</a>
</h2>

<?php  if($flag){ ?>
<div class="alert alert-success">Attendence Data Successfully Inserted</div>
<?php } ?>

<?php  if($update){ ?>
<div class="alert alert-success">Attendence Data Already Inserted</div>
<?php } ?>

<h2>
<div class="well text-center">Date:<?php echo date("y-m-d"); ?> </div>
</h2>

<div class="panel panel-body">
<form action="index1.php" method="POST">
<table class="table table_striped">
<tr>
<th>Serial Number</th><th>Name</th><th>Roll Number</th><th>Attendence Status</th>
</tr>
</div>

<?php  
$result=mysqli_query($connection,"select * from student_record");
$serialnumber=0;
$counter=0;
while($row=mysqli_fetch_array($result))
{$serialnumber++;
?>
<tr>
<td> <?php echo $serialnumber; ?> </td>
<td> <?php echo $row['std_name']; ?><input type="hidden" value="<?php echo $row['std_name']; ?>" name="std_name[]"></td>
<td> <?php echo $row['std_roll']; ?> <input type="hidden" value="<?php echo $row['std_roll']; ?>" name="std_roll[]"></td>
<td> 
<input type="radio" name="attend_status[<?php echo $counter; ?>]"  value="Present">Present
<input type="radio" name="attend_status[<?php echo $counter; ?>]" value="Absent">Absent
</td>
</tr>

<?php
 $counter++;
 }  ?>

</table>

<input type="submit" name="submit" value="submit" class="btn btn-primary">

</form>
</div>
</div>
</div>