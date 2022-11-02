<?php
session_start();
require("config.php");

$error="";
$msg="";

if(isset($_POST['add']))
{
	
	$pr_id=$_REQUEST['id'];
	
	$pr_name=$_POST['pr_name'];
	$pr_description=$_POST['pr_description'];
	$pr_price=$_POST['pr_price'];
	$pr_type=$_POST['pr_type'];
	$ld_id=$_POST['ld_id'];

	$aimage=$_FILES['aimage']['name'];
	$temp_name  =$_FILES['aimage']['tmp_name'];

    move_uploaded_file($temp_name,"images/$aimage");
	
	
	
	$sql = "UPDATE property SET pr_name= '{$pr_name}',pr_description='{$pr_description}', pr_image='{$aimage}',
	pr_price='{$pr_price}', pr_type='{$pr_type}',ld_id='{$ld_id}' WHERE pr_id = {$pr_id}";
	
	$result=mysqli_query($conn,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:newpropertyview.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:newpropertyview.php?msg=$msg");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LM HOMES | Property</title>


    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>


</head>
<style>
body {
    background: grey;
}

.card {
    margin-left: 25vw;
    margin-right: 25vw;
    margin-top: 2em;
    padding: 4em;
}
</style>

<body>



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
                            <h4 class="card-title">Update Property Details</h4>

                        </div>
                        <form method="post" enctype="multipart/form-data">

                            <?php
									
									$pr_id=$_REQUEST['id'];
									$query=mysqli_query($conn,"select * from property where pr_id='$pr_id'");
									while($row=mysqli_fetch_assoc($query))
									{
								?>

                            <div class="card-body">
                                <h5 class="card-title">Property Detail</h5>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label>name</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="pr_name" required
                                                    value="<?php echo $row['pr_name']; ?>">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-xl-6">

                                        <div class="form-group row">
                                            <label>description</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" required name="pr_description">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label>image </label>
                                            <div class="col-lg-9">
                                                <input class="form-control" name="aimage" type="file" required="">
                                                <img src="images/<?php echo $row['pr_image'];?>" height="150"
                                                    width="180">
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="col-xl-6">

                                    <div class="form-group row">
                                        <label>Price</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="pr_price" required
                                                value="<?php echo $row['pr_price']; ?>">
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


                                <div class="col-xl-6">
                                    <div class="form-group row">
                                        <label>ld_id</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="ld_id" required
                                                value="<?php echo $row['ld_id']; ?>">
                                        </div>
                                    </div>


                                </div>
                            </div>



                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary" name="add"
                                    style="margin-left:200px;">
                            </div>


                    </div>
                    </form>

                    <?php
									} 
								?>

                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- /Main Wrapper -->




</body>

</html>