<?php
include("db.php");
include("header.php");
$flag=0;
if(isset($_POST['signin'])){
$result=mysqli_query($connection,"select * from userinfo where id='$_POST[id]' and password='$_POST[password]'");
if(mysqli_num_rows($result)==1){
header("location:index1.php");
}
else{
$flag=1;}}
?>

<div class="container">
<div class="panel panel-default">
<div class="panel panel-heading">
<form action="login.php" method="post">
<h2>
<div class="well text-center"> Login </div>
</h2>

<?php if($flag==1){ ?>   
<div class="alert alert-success">
User Not Registered
</div>
 <?php } ?>


<table class="table table_striped">
<tr><th>
<label for="id">ID</label></th>
<th><input type="text" name="id" id="id" class="form-control" required>
</th></tr>
<tr><th>
<label for="name">Password</label></th>
<th><input type="password" name="password" id="password" class="form-control" required>
</th></tr>
<tr><th></th><th>
<input type="submit" name="signin" id="signin" value="Sign In" class="btn btn-primary"></th></tr>
<tr><th>New Here...</th><th><a class="btn btn-success" href="register.php">Sign Up</a></th></tr>
</table>
</div>
</div>
</div>