<?php

include("model/connection.php");

$id = $_GET['id'];
$query = "DELETE FROM doctor WHERE id='$id'";
$data = mysqli_query($conn,$query);


if($data)
    {
    echo "deleted";
    }

else
  {
  echo "failed to delete";
  }

?>