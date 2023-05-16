<?php include("model/connection.php"); ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
    <link rel= "stylesheet" type="text/css" href ="main.css">
</head>

<body >

     <form action="" method="post" enctype="multipart/form-data"> 

            <fieldset>
            <legend>Doctor Registration</legend>
            <center>


             <p> Please fill up the form carefully to create an account</p><br><br><br>

                Image: <input type="file" name="uploadfile"> <br><br><hr>

                First Name: <input type="text" name="fname" required placeholder= "Enter your first name" ><br><br><hr>

                Last Name: <input type="text" name="lname" required placeholder= "Enter your last name" ><br><br><hr>

                Gender: 

                      <select name ="gender" required>
                      <option value="">select</option>
                      <option value= "male">male</option>
                      <option value= "female">female</option>
                      </select><br><br><hr>

                Address: <input type="text" name="address" required placeholder = "Enter your permanent address"><br><br><hr>

                Phone Number: <input type="text" name="phone" required placeholder = "Enter your active phone number"><br><br><hr>

                E-Mail: <input type="email" name="email" required placeholder = "Enter your email address"><br><br><hr>

                Password: <input type="password" name="password" required placeholder="Choose your password"><br><br><hr>

                Confirm Password: <input type="password" name="cpassword" required placeholder="Re-write password"><br><br><hr>

                Qualifications: <input type= "text" name="qualification" required placeholder= "Enter your qualification"><br><br><hr>
     
                <input style="background-color: lavender;" type="submit" value="Submit" name="register"> 


            </center>
            </fieldset>
          </form>


</body>
</html> 




<?php


     
               if($_POST['register'])

                      {

                      $filename = $_FILES["uploadfile"]["name"];
                      $tempname = $_FILES["uploadfile"]["tmp_name"];
                      $folder = "image/" . $filename;
                      move_uploaded_file($tempname, $folder);


                      $fname = $_POST['fname'];
                      $lname = $_POST['lname'];
                      $gender = $_POST['gender'];
                      $address = $_POST['address'];
                      $phone = $_POST['phone'];
                      $email = $_POST['email'];
                      $pwd = $_POST['password'];
                      $cpwd = $_POST['cpassword'];
                      $qualification = $_POST['qualification'];


                          if($fname != "" && $lname !="" &&  $gender !="" && $address != "" && $phone != "" && 
                          $email != "" && $pwd !="" && $qualification != "" )
                            {
                                
                            $query = "INSERT INTO doctor(image, fname,lname,gender,address,phone,email,password,cpassword,qualification) VALUES('$folder','$fname ' , '$lname', '$gender', '$address', '$phone' , '$email','$pwd', '$cpwd' ,'$qualification' )";

                            $data = mysqli_query($conn, $query);


                               if($data)
                                  {
                                  echo "data inserted into data base";
?>

<meta http-equiv = "refresh" content = "0; url =http://localhost/final/docdisplay.php" />

<?php

                                 } 

                                      

                               else 
                                 {
                                 echo "failed";
                                 }
       
                            }
        


                         else 
                         {
                         echo "Please fill up the form properly";
                         }


                      }

?>