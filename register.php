<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">REGISTER</h1>
<form method="POST">
<table class="table">
<tr>
<td>NAME</td>
<td><input type="text" class="form-control" name="name"></td>
</tr>
<tr>
<td>Address</td>
<td> <textarea name="address" class='form-control' cols="30" rows="3"></textarea></td>
</tr>
<tr>
<td>Mobile</td>
<td><input type="text" class="form-control" name="mobile"></td>
</tr>
<tr>
<td>E-mail</td>
<td>
<input type="text" class="form-control" name="email">
</td>
</tr>
<tr>
<td>
User Name
</td>
<td>
<input type="text" class="form-control" name="username">
</td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" class="form-control" name="password"></td>
</tr>
<tr>
<td>Confirm Password</td>
<td>
<input type="password" class='form-control' name="confirmpassword">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="submit" class="btn btn-success" name="register">REGISTER</button>
</td>
</tr>
<tr>
<td></td>
<td>
<a href="index.php"><h5>Back to Login</h5></a>
</td>
</tr>
</table>
</form>
</div>
</div>
</div> 
</body>
</html>

<?php

if(isset($_POST['register'])){

    $name=$_POST['name'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    


   $ServerName="localhost";
   $DbUserName="root";
   $DbPassword="";
   $DbName="study";

   $connection=new mysqli($ServerName,$DbUserName,$DbPassword,$DbName);

   $sql="INSERT INTO `register`(`name`, `address`, `mobile`, `email`, `username`, `password`) VALUES ('$name','$address',$mobile,'$email','$username','$password')";

   $result=$connection->query($sql);

   if($result===TRUE){

    echo "<script> alert('Data Inserted') </script>";

   }
else{
    echo "<script> alert('Data Insertion Failed') </script>";
    
}

}



?>