<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Info</title>
	<style>
		body {
			background-color: #f2f2f2; 
		}

		h2 {
			text-align: center;
		}

		table {
			margin: 0 auto;
			background-color: white; /* set background color for the table */
			border-collapse: collapse;
			width: 80%;
		}

		th, td {
			padding: 8px;
			text-align: center;
			border: 1px solid black;
		}

		th {
			background-color: #4CAF50; 
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2; 
		}

		tr:hover {
			background-color: #ddd; 
		}
	</style>
</head>
<body>


<?php
include("model/connection.php");
error_reporting(0);


$query = "SELECT * FROM doctor";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);



if($total != 0)
{

?>
	<h2><center>Displaying all Doctor's info</center></h2>

	<table border= "2" cellspacing="7">


	<tr>
		<th>ID</th>
		<th>Image</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>E-mail</th>
		<th>Qualification</th>
		<th>Operations</th>
	</tr>
		


<?php

	while($result = mysqli_fetch_assoc($data))
	        {

		    echo 
		      "<tr>


		          <td>".$result[id]."</td>

		          <td><img src = ' ".$result[image]." ' height= '100px' width='100px' ></td>



		          <td>".$result[fname]."</td>
		          <td>".$result[lname]."</td>
		          <td>".$result[gender]."</td>
		          <td>".$result[address]."</td>
		          <td>".$result[phone]."</td>
		          <td>".$result[email]."</td>
		          <td>".$result[qualification]."</td>

		          <td><a href='update.php?id=$result[id]'><input type='submit' value='Update'></a>

		          <td><a href='delete.php?id=$result[id]'><input type='submit' value='Delete'></a></td>


	           </tr>";
		    }
	
}

else
  {
  echo "no records found";
  }

?> 

</table>