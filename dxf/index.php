<?php 


include("navbar.php");

?>
<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginform.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginform.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>





   <div class="bg"></div><br>
   <div class="card active-cyan-4 mb-4 inline">
      <form method="POST" action="search-property.php">
        <input class="form-control" type="text" placeholder="Enter location to search house." name="search_property" aria-label="Search">
     </form>






  </div>
  <?php 

  include("viewproperties.php");

  ?>

</body>
</html>


