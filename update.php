<?php include("model/connection.php"); 

$id = $_GET['id'];

$query = "SELECT * FROM doctor where id= '$id' ";
$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>

<body style="background-color:lavender; background-image: url('update.png');   background-repeat: no-repeat;  background-size: 100% 100%;">

           <form action="" method="post" > 

            <fieldset>

            <legend>Update Info</legend>

            <center>

            <h2>Update Information</h2><br>

              First Name: <input type="text" value="<?php echo 
              $result['fname'];?>" name="fname" required placeholder= "Enter your first name"><br><br><hr>

              Last Name: <input type="text" value="<?php echo 
              $result['lname'];?>" name="lname" required placeholder= "Enter your last name"><br><br><hr>


              Gender: 

         <select name ="gender" required>

              <option value="">select</option>

              <option value= "male"

              <?php

               if($result['gender'] == 'male')
                   {
                   echo "selected";
                   }
              ?>

               >male</option>

            <option value= "female"

              <?php

               if($result['gender'] == 'female')
                   {
                   echo "selected";
                   }
               ?>

               >female</option>

        </select><br><br><hr>

        

       Address: <input type="text" value="<?php echo 
       $result['address'];?>" name="address" required placeholder = "Enter your permanent address"><br><br><hr>


       Phone Number: <input type="text" value="<?php echo 
       $result['phone'];?>"
       name="phone" required placeholder = "Enter your active phone number"><br><br><hr>


       E-Mail: <input type="email" value="<?php echo 
       $result['email'];?>" name="email" required placeholder = "Enter your email address"><br><br><hr>

       Password: <input type="password" value="<?php echo 
       $result['password'];?>"name="password" required placeholder="Choose your password"><br><br><hr>

       Confirm Password: <input type="password" value="<?php echo 
       $result['cpassword'];?>" name="cpassword" required placeholder="Re-write password"><br><br><hr> 

       Qualifications: <input type= "text" value="<?php echo 
       $result['qualification'];?>" name="qualification" required placeholder= "Enter your qualification"><br><br><hr>
     
       <input style="background-color: lavender;" type="submit" value="update" name="update"> 





      </center>

      </fieldset>

      </form>

</body>
</html>    


<?php
     
       if($_POST['update'])
         {

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

                $query = "UPDATE doctor set fname ='$fname', lname='$lname',gender='$gender',address='$address', phone='$phone',email='$email',password='$pwd',cpassword='$cpwd',qualification='$qualification' WHERE id='$id' ";

                 $data = mysqli_query($conn, $query);

                if($data)
                  {
                  echo "updated successfully";
        
?>

           <meta http-equiv = "refresh" content = "0; url =http://localhost/final/docdisplay.php" />

<?php
                  }

        else 
          {
          echo "failed to update";
          }


               }



        else 
          {
          echo "Please fill up the form properly";
          }


        }




?>



