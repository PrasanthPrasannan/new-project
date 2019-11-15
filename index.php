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
    <h1 style="text-align:center; font-size:28px;">LOGIN</h1>
    <form method="POST">
    <table class="table">
    <tr>
    <td>User Name</td>
    <td><input type="text" class="form-control" name="user"> </td>
    </tr>
    <tr>
    <td>Password</td>
    <td><input type="password" class="form-control" name="password"></td>
    </tr>
    <tr>
    <td></td>
    <td><button type="submit" class="btn btn-success" name="login">LOGIN</button></td>
    </tr>
    <tr>
    <td></td>
    <td>
    <a href="register.php"><h5>New User Cick Here</h5></a>
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
session_start();

if(isset($_POST['login']))
{
$username=$_POST['user'];
$password=$_POST['password'];


$Servername="localhost";
$DbUsername="root";
$DbPassword="";
$DbName="study";

$connection=new mysqli($Servername,$DbUsername,$DbPassword,$DbName);

$sql="SELECT `Id`, `name`, `address`, `mobile`, `email`, `username`, `password` FROM `register` WHERE `username`='$username' and `password`='$password'";

$result=  $connection->query($sql);
 
if($result->num_rows>0){

$_SESSION['logincheck']="true";

header('Location:welcome.php');
    // while($row=$result->fetch_assoc()){

    //  $name=$row['name'];
    //  $address=$row['address'];
    //  $mobile

    // }
}
else{
    echo "<script>alert('Invalid Credential')</script>";
}
}

?>