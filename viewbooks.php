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


<div class="container">
<div class="row">
<div class="col-md-12"
>
<?php

include 'dbcon.php';

$sql="SELECT `Id`, `book-title`, `description`, `author`, `price` FROM `books` ";

$result=$connection->query($sql);

if($result->num_rows>0){

 


  while($row=$result->fetch_assoc()){

$booktitle=$row['book-title'];
$description=$row['description'];
$author=$row['author'];
$price=$row['price'];

echo "<div class='card text-center'>
<div class='card-header'>
$booktitle
</div>
<div class='card-body'>
  <h5 class='card-title'> Author: $author</h5>
  <p class='card-text'>$description.</p>
  <a href='#' class='btn btn-primary'>Rs.$price /-</a>
</div>
<div class='card-footer text-muted'>

</div>
</div>";
echo "<br>";

  }
}


else{

  echo "Invalid data";
}

?>

</div>
</div>
</div>
</body>
</html>



