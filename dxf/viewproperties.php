<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        </head>

<?php 
include("config.php");
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    :root {
        --blue: #3498db;
        --dark-blue: #2980b9;
        --red: #e74c3c;
        --dark-red: #c0392b;
        --black: #333;
        --white: #fff;
        --light-bg: #eee;
        --box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 100%;
        min-width: 100%;
        margin: auto;
        text-align: center;
        display: block;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        opacity: 0.8;
    }

    .container {
        padding: 2px 16px;
    }

    /*.btn {
        width: 100%;
        border-radius: 5px;
        padding: 10px 30px;
        color: var(--white);
        text-align: center;
        cursor: pointer;
        font-size: 20px;
        margin-top: 10px;
        background-color: var(--blue);

    }*/

    .btn>a {
        text-decoration: none;
    }

    a {
        text-decoration: none;
    }

    .image {
        height: 100px;
        margin-top: .5em;
    }

    .btn btn-primary {
        background-color: transparent;
        border: none;
        color: black;
        margin-top: 1em;
        margin-bottom: 1em;
        width: 100%;
        height: 5vh;

    }

    .btn btn-primary:hover {
        background-color: #fe98fe;
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

    <div class="" style=" height: auto; padding: 1em;">
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
            <div style="display: flex; text-align: center; justify-content: space-evenly; ">
                <p><?php echo '<a href="property.php?pr_id='.$rows['pr_id'].'"  class="btn btn-primary" >View Property </a><br>'; ?>
                <p><?php echo '<a href="makeappointment.php?pr_id='.$rows['pr_id'].'"  class="btn btn-success" >Schedule appointment </a><br>'; ?>
                <p><?php echo '<a href="makebooking.php?pr_id='.$rows['pr_id'].'"  class="btn btn-success" >Book now </a><br>'; ?>
                <p><?php echo '<a href="reviewform.php?pr_id='.$rows['pr_id'].'"  class="btn btn-success" > Reviews</a><br>'; ?>
            </div>
            </p><br>
        </div>
    </div>

</body>

</html>


<?php 

}
    }
    ?>