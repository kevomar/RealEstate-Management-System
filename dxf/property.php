<?php 
    session_start();
    isset($_SESSION["user_id"]);
    include('config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>View Property</title>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='style4.css'>
        <script src='main.js'></script>
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
                text-align: auto;
                display: block;
            }

            

            .container {
                padding: 2px 16px;
            }

            /*
            .btn {
                width: 100%;
                border-radius: 5px;
                padding: 10px 30px;
                color: var(--white);
                text-align: center;
                cursor: pointer;
                font-size: 20px;
                margin-top: 10px;
                background-color: var(--blue);
            }
            .card:hover {
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                opacity: 0.8;
            }

            */

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
            body{
                background-color: #272075;
                color: white;
            }

            .tab-content{
                display: inline;
            }
            .price{
                font-weight: bold;
                font-size: 1.5em;
            }
        </style>
    </head>

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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="card" >
                <div class="estate">
                    <div class="container bootstrap snippets bootdey">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-7">
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
                                                        <div class="product-gallery">
                                                            <div class="primary-image">
                                                            <a href="#" class="theater" rel="group" hidefocus="true">
                                                                <img class="img-responsive" src="uploadsforproperties/<?php echo $photo ?>" alt="" >
                                                            </a>
                                                            </div>
                                                        </div>
                                                
                                                <?php
                                                    }
                                            }
                                                ?>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="product-info">
                                            <h3><?php echo $name; ?></h3>
                                            <div class="wp-block property list no-border">
                                                <div class="wp-block-content clearfix">
                                            
                                                    <p class="description mb-15"><?php echo $type; ?></p>
                                                        <span class="pull-left">
                                                            <span class="price"><?php echo $price; ?></span> 
                                                        </span>
                                        
                                                </div>
                                        
                                                <div class="wp-block-footer style2 mt-15">
                                                    <ul class="aux-info">
                                                        <li><i class="fa fa-building"></i>2300 Sq Feet</li>
                                                        <li><i class="fa fa-user"></i> 5 Bedrooms</li>
                                                        <li><i class="fa fa-tint"></i> 2 Bathrooms</li>
                                                        <li><i class="fa fa-car"></i> 3 Garages</li>
                                                    </ul>


                                                    <div class="section-title-wr">
                                                    <h3 class="section-title left">Property description</h3>
                                                </div>
                                                <p class="description mb-15">
                                                <?php echo $description; ?>
                                                </p>
                                                </div>


                                                <a class="btn btn-success" href="../dxf/makebooking.php?pr_id=<?php echo $pr_id; ?>">Book Now</a>
                                                <a class="btn btn-success" href="../dxf/makebooking.php?pr_id=<?php echo $pr_id; ?>">Make appointment</a>
                                                <a class="btn btn-success" href="../payment_gateway/index.php?pr_id=<?php echo $pr_id; ?>">Pay now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabs-framed boxed">
                                    

                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-1">
                                            <div class="tab-body">


                                                
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

</html>
