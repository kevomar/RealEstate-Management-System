<?php
session_start();
require("config.php");
////code

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Main CSS -->

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>


</head>

<body>

    <!-- Main Wrapper -->


    <!-- Page Header -->
    <div class="page-header" style="width: 100vw; text-align: center;">

        <h3 class="page-title">Properties</h3>
        <ul class="breadcrumb">

        </ul>
        <form action="newproperty.php" method="post" style="text-align: center;">
            <button class="btn btn-success" name="add_booking" type="submit">
                Add Property
            </button>
        </form>

    </div>
    <!-- /Page Header -->
    <!-- Page Wrapper -->
    <div class="page-wrapper">


        <div class="content container-fluid">












            <table id="datatable-buttons" class="table table-striped">
                <thead>
                    <tr>
                        <!-- <th>P ID</th> -->
                        <th>#</th>
                        <th>pr_name</th>
                        <th>pr_description</th>
                        <th>pr_image</th>
                        <th>pr_price</th>

                        <th>pr_type</th>

                        <th>ld_id</th>




                    </tr>
                </thead>


                <tbody>
                    <?php

                    $query = mysqli_query($conn, "select * from property");
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $row['pr_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['pr_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['pr_description']; ?>
                        </td>
                        <td> <img src="../dxf/uploadsforproperties/<?= $row['pr_image']; ?>" style='height:50px;'></td>
                        <td>
                            <?php echo $row['pr_price']; ?>
                        </td>
                        <td>
                            <?php echo $row['pr_type']; ?>
                        </td>
                        <td>
                            <?php echo $row['ld_id']; ?>
                        </td>











                        <!--  <td><?php //echo $row['29']; ?></td>  -->
                        <td><a href="newpropertyedit.php?id=<?php echo $row['pr_id']; ?>"><button
                                    class="btn btn-primary">Edit</button></a></td>
                        <td>
                            <a href="newpropertydelete.php?id=<?php echo $row['pr_id']; ?>"><button
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <!-- end card body-->
                        <!-- end card -->
                        <!-- end col-->

                        <!-- end row-->

        </div>
    </div>
    <!-- /Main Wrapper -->




</body>

</html>