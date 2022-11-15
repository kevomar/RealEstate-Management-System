<?php
session_start();
require("config.php");
////code


if (isset($_POST['add'])) {

    $pr_name = $_POST['pr_name'];
    $pr_description = $_POST['pr_description'];

    $pr_price = $_POST['pr_price'];
    $pr_type = $_POST['pr_type'];
    $ld_id = $_POST['landlordId'];


    $aimage = $_FILES['aimage']['name'];
    $temp_name = $_FILES['aimage']['tmp_name'];


    move_uploaded_file($temp_name, "../dxf/uploadsforproperties/$aimage");


    $sql = "INSERT INTO property (pr_name,pr_description,pr_image,pr_price,pr_type,ld_id)
  VALUES('$pr_name','$pr_description','$aimage','$pr_price','$pr_type','$ld_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "<p class='alert alert-success'>Property Inserted Successfully</p>";
        header('Location: index.php?newpropertyview');

    } else {
        $error = "<p class='alert alert-warning'>Something went wrong. Please try again</p>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LM HOMES | Property</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">

    <!-- Main CSS -->

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>



</head>
<style>
    body {
        background: #272075;
    }

    .card {
        margin-left: 25vw;
        margin-right: 25vw;
        margin-top: 2em;
        padding: 4em;
    }

    .form-control {
        width: auto;

    }

    label {
        width: auto;
    }
</style>

<body>


    <!-- Header -->

    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumb">

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Property Details</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label>name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="pr_name" required
                                                    placeholder="Enter name">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label>description</label>
                                            <div class="col-lg-9">
                                                <!--<select class="form-control" name="pr_description">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>-->
                                                <input type="textarea" class="form-control" name="pr_description"
                                                    required placeholder="Description">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label>image</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage" type="file" required="">
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label>price</label>
                                            <div class="col-lg-9">
                                                <input type="number" class="form-control" name="pr_price" required
                                                    placeholder="Enter Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label>Property Type</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="pr_type">
                                                    <option value="">Select Type</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="flat">Flat</option>
                                                    <option value="building">Building</option>
                                                    <option value="house">House</option>
                                                    <option value="villa">Villa</option>
                                                    <option value="office">Office</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="col-xl-6">

                                    <div class="form-group row">
                                        <label>ld_id</label>
                                        <div class="col-lg-9">
                                            <select name="landlordId" id="">
                                                <?php
                                                $sql = "SELECT * FROM landlords";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['ld_id'] . "'>" . $row['ld_id'] . ' ' . $row['ld_firstname'] . ' ' . $row['ld_lastname'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>







                                <input type="submit" value="Submit" class="btn btn-primary" name="add"
                                    style="margin-left:200px;">
                                <input type="submit" value="Back" class="btn btn-danger" name="back"
                                    style="margin-left:200px;" onclick=goback()>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Main Wrapper -->



    <script>
        function goback() {
            window.open('index.php?newpropertyview');
        }
    </script>
</body>

</html>