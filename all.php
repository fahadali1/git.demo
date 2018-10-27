<?php 
include("db.php");
include("header.php");
?>

<div class="container">
<div class="panel panel-default">
<div class="panel panel-heading">

<h1><a class="btn btn-info pull-right" href="index1.php">Back</a></h1>

<div class="panel panel-body">

<table class="table table_striped">

<tr><th>Serial Number</th><th>Date</th><th>Show Attendence</th></tr>
</div>

<?php  
$result=mysqli_query($connection,"select distinct date from attendence_record");
$serialnumber=0;    $counter=0;
while($row=mysqli_fetch_array($result))
{$serialnumber++;
?>
<tr>
<td> <?php echo $serialnumber; ?> </td>
<td> <?php echo $row['date']; ?> </td>

<td> 
<form action="show_attendence.php" method="POST">
<input type="hidden" value="<?php echo $row['date'] ?>" name="date">
<input type="submit" value="Show Attendence" class="btn btn-primary">
</form>

</td>
</tr>

<?php 
$counter++;
 }  ?>

</table>
</div>
</div>
</div>