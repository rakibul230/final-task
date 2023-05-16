<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel= "stylesheet" type="text/css" href ="login.css">

	<title>Login Form</title>
	<style>
		body 
		{
			font-family: sans-serif;
			text-align: center;
			background-color: #f2f2f2;
		}
		
		form {
			max-width: 400px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}

		fieldset {
			border: none;
			margin: 0;
			padding: 0;
		}

		legend 
		{
			font-size: 1.5rem;
			font-weight: bold;
			margin-bottom: 1rem;
		}

		label {
			display: block;
			margin-bottom: 0.5rem;
			text-align: left;
			font-size: 1.1rem;
			font-weight: bold;
		}

		input[type="text"],
		input[type="password"] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 1rem;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 4px;
			padding: 10px;
			cursor: pointer;
			font-size: 1.1rem;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		a {
			color: #666;
			text-decoration: none;
			margin-left: 1rem;
			font-size: 1.1rem;
		}

		a:hover {
			color: #333;
		}
	</style>


</head>

<body >
	
	

	<form action ="#" method="POST" autocomplete="off">

		<fieldset>

			<legend>Doctor's Login</legend>

             <center>

             	<input type="text" name="email" placeholder="Enter email"><br><br>

	            <input type="password" name="password" placeholder="Enter password"><br><br>

	            <a href ="a" onclick= "message()"> Forget Password?</a>

	            <input type = "submit" name="login"  value="Login"><br><br>

	            New Member? <a href="docreg.php">SignUp Here</a>


	            <script>
		           function message()
		             {
			         alert("try to remember");
		             }
	            </script>

             </center>

        </fieldset>

    </form>
</body>
</html>




<?php

include("model/connection.php");


if(isset($_POST['login']))

    {

	$email=$_POST['email'];
	$password=$_POST['password'];


	$query = "SELECT * FROM doctor WHERE email = '$email' && password='$password'";
	$data= mysqli_query($conn, $query);
	$total=mysqli_num_rows($data);


	//echo $total;
	
	if($total==1)
	     {
		 $_SESSION['email'] = $email;
         header('location:docdisplay.php');
         }

	else
	    {
		echo "Login Failed";
	    }

}



	?>
