<?php
include("db.php");
include("header.php");
$flag=0;

if(isset($_POST['register']))
{$check=mysqli_query($connection,"select * from userinfo where id='$_POST[id]' ");
if(mysqli_num_rows($check)>0){$flag=1;}

else if(mysqli_num_rows($check)==0)
{mysqli_query($connection,"insert into userinfo (name,id,password) values ('$_POST[name]','$_POST[id]','$_POST[password]')");
$flag=2;}
}?>

<div class="container">
<div class="panel panel-default">
<div class="panel panel-heading">
<form action="register.php" method="POST">
<h2><div class="well text-center"> Registration </div></h2>

<?php if($flag==2){?>
<div class="alert alert-success">User Successfully Registered</div>
<?php } ?>

<?php if($flag==1){?>
<div class="alert alert-success">User Already Registered</div>
<?php } ?>

<table class="table table_striped">
<tr>
<th><label for="name">Name</label></th>
<th><input type="text" name="name" id="name" class="form-control" required></th>
</tr>
<tr>
<th><label for="name">ID</label></th>
<th><input type="text" name="id" id="id" class="form-control" required></th>
</tr>
<tr>
<th><label for="name">Password</label></th>
<th><input type="password" name="password" id="password" class="form-control" required></th>
</tr>
<tr>
<th></th>
<th><input type="submit" name="register" id="register" value="Register" class="btn btn-primary" required></th>
</tr>
<tr>
<th></th>
<th><a class="btn btn-success" href="login.php">Back</a></th>
</tr>
</table>
</div>
</form>
</div>
</div>