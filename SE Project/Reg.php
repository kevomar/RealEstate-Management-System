
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '','rems');

// When form submitted, insert values into the database.
if(isset($_POST['submit'])){
    $ld_firstname =  $_POST['Fname'];
    $ld_lastname =  $_POST['Sname'];
    $ld_email =  $_POST['Email'];
    $ld_phonenumber =  $_POST['Phone'];
    $ld_image = $_FILES["image"]['name'];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "Images/" . $ld_image;
    $ld_password = $_POST['password'];
    $ld_dob = $_POST['DOB'];
    $ld_bankaccountno = $_POST['BAN'];
    $ld_address = $_POST['address'];
    $ld_gender = $_POST['gender'];
 
    $pro = "INSERT INTO `landlords`( ld_firstname, ld_lastname, ld_email, ld_phonenumber, ld_image,ld_dob , ld_bankaccountno, ld_password, ld_address, ld_gender) VALUES('$ld_firstname','$ld_lastname','$ld_email','$ld_phonenumber','$ld_image','$ld_dob','$ld_bankaccountno','$ld_password','$ld_address','$ld_gender')";
          $result   = mysqli_query($conn, $pro);
          if ($result) {
              echo 'You are registered successfully';
              header('location:Login.php');      
          }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registration Form</title>

   <link rel="stylesheet" href="rlstyle.css">

</head>
<body>
   
<div class="Container">
  <div class="card">
    <h3>Register Now</h3>
    <form action="" method="post" enctype="multipart/form-data">
   
     
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      
        <div class="inputbox">
            <input type="text" name="Fname" Id="Fname" required="required" >
            <span>First name</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="Sname" Id="Sname" required="required" >
            <span>Second name</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="text" name="Email" Id="Email" required="required" >
            <span>Email</span>
        </div>
      
        <br><br>
        <div class="inputbox">
            <input type="tel" name="Phone" Id="Phone" required="required" >
            <span>Phone numbers</span>
        </div>
        
        <br><br>
        <div class="inputbox">
            <input type="date" name="DOB" Id="DOB" required="required" >
            <span>Date of Birth</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="Text" name="address" Id="address" required="required" >
            <span>Address</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="number" name="BAN" Id="BAN" required="required" >
            <span>Bank Account Number</span>
        </div>
        <br><br>
        <div class="inputbox">
            <input type="password" name="password" Id="password" required="required">
            <span>Password</span>
        </div>
        <br><br>
        <div class="inputbox">          
            <input id="image" type="file" name="image" required="required" capture>
            <span>Profile Photo</span>
        </div>
        <br><br>
        <div class="inputbox">
            
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
             </select>
             <span>Gender</span>
        </div>
        <br><br>
        <div>
        <button type="submit" name="submit"class="btn">Register</button>
        </div>
        </form>
            
            
            <div>
              <p>Already have an account? <a href="Login.php">Login now</a></p>
        
        
      </div>
    

</div>

</body>
</html>