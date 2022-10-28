<?php 
include("config.php");
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  :root{
   --blue:#3498db;
   --dark-blue:#2980b9;
   --red:#e74c3c;
   --dark-red:#c0392b;
   --black:#333;
   --white:#fff;
   --light-bg:#eee;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 100%;
  min-width: 100%;
  margin: auto;
  text-align: center;
  font-family: arial;
  display: inline;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  opacity: 0.8;
}

.container {
  padding: 2px 16px;
}

.btn {  
   width: 100%;
   border-radius: 5px;
   padding:10px 30px;
   color:var(--white);
   text-align: center;
   cursor: pointer;
   font-size: 20px;
   margin-top: 10px;
   background-color:var(--blue);

}

.btn>a{
  text-decoration:  none;
}

a{
  text-decoration:  none;
}

.image {
  height:  100px;
  margin-top:  .5em;
}
</style>

</head>
<body>
<?php 

$sql="SELECT * FROM property";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0)
    {
      while ($rows=mysqli_fetch_assoc($query)) {
        $pr_id=$rows['pr_id'];

?>

<div class="col-sm-2" style=" height: 150px; padding: 1em;">
<div class="card" style="display: flex; justify-content: space-evenly; min-height: 120px;">
<?php


        $sql2="SELECT * FROM property where pr_id='$pr_id'";
    $query2=mysqli_query($conn,$sql2);

    if(mysqli_num_rows($query2)>0)
    {
      $row=mysqli_fetch_assoc($query2); 
        $photo=$row['pr_image'];
        ?>
        <div style="width: 10%; height: 10%;">
          <?php
        echo  '<img class="image" src="uploadsforproperties/'.$photo.'" >'; }?>
      </div>

  <h4><b><?php echo $rows['pr_name']; ?></b></h4> 
  <p><?php echo $rows['pr_description'].', '.$rows['pr_price'] ?></p> 
  <p><?php echo '<a href="property.php?pr_id='.$rows['pr_id'].'"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?></p><br>
</div>
</div>

</body>
</html> 


<?php 

}
    }
    ?>