<?php 
session_start();
isset($_SESSION["user_id"]);
include('config.php');


?>

<!DOCTYPE html>
<html>

<head>
    <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <style>
    #mapid {
        height: 180px;
    }
    </style>
</head>-->

<body>

    <?php
    
    //include('navbar.php');
  $pr_id=$_GET['pr_id'];
  $sql="SELECT * from property where pr_id='$pr_id'";
  $query=mysqli_query($conn,$sql);

  if(mysqli_num_rows($query)>0)
  {
    while($row=mysqli_fetch_array($query)){ 


      $sql2="SELECT * FROM property where pr_id='$pr_id'";
      $query2=mysqli_query($conn,$sql2);
      
      $rowcount=mysqli_num_rows($query2);
      $name = $row['pr_name'];
      $description = $row['pr_description'];
      $price = $row['pr_price'];
      $type = $row['pr_type']; 
    }
  }
  ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">


                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner" role="listbox">
                        <?php
            for($i=1;$i<=$rowcount;$i++)
            {
              $row=mysqli_fetch_array($query2);
              $photo=$row['pr_image']; 
              ?>

                        <?php 
              if($i==1)
              {
                ?>
                        <div class="item active">
                            <img class="d-block img-fluid" src="uploadsforproperties/<?php echo $photo ?>"
                                alt="First slide" width="100%" style="max-height: 600px; min-height: 600px;">
                        </div>
                        <?php 
              }
              else
              {
                ?>
                        <div class="item">
                            <img class="d-block img-fluid" src="uploadsforproperties/<?php echo $photo ?>"
                                alt="First slide" width="100%" style="max-height: 600px; min-height: 600px;">
                        </div>

                        <?php
              }
            }
            ?>
                    </div>

                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            <div class="col-sm-6">
                <center>
                    <h2></h2>
                </center>
                <div class="row">
                    <div class="col-sm-6">

                        <div class="row">
                            <div class="col-sm-6">
                                <table>
                                    <tr>
                                        <td>
                                            <h3>Name:</h3>
                                        </td>
                                        <td>
                                            <h4><?php echo $name; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Description</h3>
                                        </td>
                                        <td>
                                            <h4><?php echo $description; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Price per month</h3>
                                        </td>
                                        <td>
                                            <h4><?php echo $price; ?></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Property Type</h3>
                                        </td>
                                        <td>
                                            <h4><?php echo $type; ?></h4>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</body>

</html>