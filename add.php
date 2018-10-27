<?php
include("header.php");
include("db.php");
$flag=0;
if(isset($_POST['submit']))
{$result=mysqli_query($connection,"insert into student_record(std_name,std_roll) values('$_POST[name]','$_POST[roll]')");
if($result)
{$flag=1;}
}?>

<div class="container">
<div class="panel panel-default">
<?php if($flag){ ?>
<div class="alert alert-success"><strong> !Success </strong>New Student inserted; </div>
<?php } ?>

<div class="panel-heading">
<h2>
<a class="btn btn-success" href=add.php>Add Student</a>
<a class="btn btn-info pull-right" href=index1.php>Back</a>
</h2>
</div>

<div class="panel-body">
<form action="add.php" method="post">

<div calss="form-group">
<label for="name">Student Name</label>
<input type="text" name="name" id="name" class="form-control" required>
</div>

<div calss="form-group">
<label for="name">Roll Number</label>
<input type="text" name="roll" id="roll" class="form-control" required>
</div>

<div calss="form-group">
<input type="submit" name="submit" id="name" value="submit" class="btn btn-primary" required>
</div>

</form>
</div>
</div>
</div>