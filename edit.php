<?php
session_start();

if(!isset($_SESSION['logincheck']))
{
    header('Location:index.php');
}

?>

<?php
include './navbar.php';
?>
  
</div>
</div>
</div>
<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:18px;">EDIT BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Book Title
</td>
<td>
<input type="text" class="form-control"name="bookname"> 
</td>
</tr>
<tr>
<td></td>
<td>
<button type="submit" class="btn btn-success" name="submit">SEARCH</button> 
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
include 'dbcon.php';
if(isset($_POST['submit'])){


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `books` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'> ";
  
    while($row=$result->fetch_assoc()){

        $booktitle=$row['book-title'];
        $description=$row['description'];
        $author=$row['author'];
        $price=$row['price'];

        echo "<tr><td>BOOK TITLE</td><td><input type='text' class='form-control' name='title' value='$booktitle'> </td></tr>";       
        echo "<tr><td>DESCRIPTION</td><td><input type='text' class='form-control' name='desp' value='$description'> </td></tr>";
        echo "<tr><td>AUTHOR</td><td><input type='text' class='form-control' name='atr' value='$author'> </td></tr>";
        echo "<tr><td>PRICE</td><td><input type='text' class='form-control' name='prc' value='$price'> </td></tr>";
        echo "<tr><td></td><td><button type='submit' class='btn btn-success' name='Update'>UPDATE</button>  <button type='submit' class='btn btn-success' name='delete'>DELETE</button></td></tr>";
    }

    echo "</table> </form>";
}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    }
}
?>

<?php

include 'dbcon.php';

if(isset($_POST['Update'])){

$bookname=$_POST['title'];
$desctn=$_POST['desp'];
$atr=$_POST['atr'];
$prc=$_POST['prc'];



$sql="UPDATE `books` SET `book-title`='$bookname',`description`='$desctn',`author`='$atr',`price`=$prc WHERE `book-title`='$bookname'";

$result=$connection->query($sql);

if($result===TRUE){
    echo "<script> alert('Data Inserted')</script>";
}
else{

    echo "<script> alert('Data Insertion Failed') </script>";

}
}

if(isset($_POST['delete'])){

$bookname_delete=$_POST['title'];




$sql="DELETE FROM `books` WHERE `book-title`='$bookname_delete'";

$result=$connection->query($sql);

if($result===TRUE){

echo "<script>alert('Data Deleted')</script>";

}
else{

    echo "<script>alert('Data Deletion Failed')</script>";
}
    
}

?>
