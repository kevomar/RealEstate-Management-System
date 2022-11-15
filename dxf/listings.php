<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Listings</title>
</head>
<style>
    body {
        background: #272075;
    }

    .cont {
        background-color: #272075;
        min-height: 100vh;
        min-width: 100vw;
        margin-left: 1em;
        margin-right: 1em;
        padding: 2em 1em 0 1em;
        display: grid;
        grid-template-columns: 3fr 3fr 3fr;
        grid-template-rows: auto 1fr;
        grid-column-gap: 3em;
        /*grid-template-rows: repeat(autofill 12px);*/
        /*grid-auto-flow: row;*/
    }


    .nav {
        grid-column: 1;
        grid-row: 1/300;
        /* big number here */
        height: calc(2*10rem + 1rem);
        /* consider one gap in the total height*/
    }

    .property-image {
        height: 50%;
    }

    .card {
        height: auto;
        max-height: 95%;
    }

    ul {
        list-style-type: none;
        display: flex;
        justify-content: space-between;
    }

    ul>li {
        display: inline-block;
        margin-right: 1em;
    }
</style>

<body>
    <?php
    session_start();
    include('config.php');
    include('navbar.php');

    //get every property from the database
    $get_property_queries = "SELECT * FROM property";
    $get_property_result = mysqli_query($conn, $get_property_queries);
    ?>

    <div class="cont" style="color: white; margin-left: 0; margin-right: 0;">
        <!--<div class="nav">

        </div>-->
        <?php

        if (mysqli_num_rows($get_property_result) > 0) {
            while ($row = mysqli_fetch_assoc($get_property_result)) {
                //for ($i = 0; $i < 50; $i++) {
        ?>

        <div class="card">
            <img src="./../dxf/uploadsforproperties/<?php echo $row['pr_image'] ?>" alt="property-image"
                class="property-image">
            <div class="card-body" style="color: black;">
                <h1 class="card-title" style="color: black;">
                    <?php echo $row['pr_name'] ?>
                </h1>
                <p class="card-text">
                <h3>Type:
                    <?php echo $row['pr_type'] ?>
                </h3>
                <h3>Price:
                    <?php echo $row['pr_price'] ?>
                </h3>
                </p>
                <ul>
                    <li><a href="./../dxf/property.php?pr_id=<?php echo $row['pr_id']; ?>" class="btn btn-primary">View
                            more</a></li>
                    <li><a href="./../dxf/makebooking.php?pr_id=<?php echo $row['pr_id']; ?>"
                            class="btn btn-primary">Book now</a></li>
                </ul>
                <ul>
                    <li><a href="./../dxf/makeappointment.php?pr_id=<?php echo $row['pr_id']; ?>"
                            class="btn btn-primary">Make appointment</a></li>
                    <li><a href="./../payment_gateway/index.php?pr_id=<?php echo $row['pr_id']; ?>"
                            class="btn btn-success">Pay now</a></li>
                </ul>
            </div>

        </div>

        <?php
           //     }
            }

        } else {
            echo "No available properties at the moment";
        }

        ?>
    </div>


</body>

</html>

