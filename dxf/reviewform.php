<!DOCTYPE html>
<html lang="en">

<head>
    <title>Real Estate review demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
.progressSection .holder {
    display: flex;
    flex-direction: column;
    margin-bottom: 1em;
}

.progressSection .holder>div {
    display: flex;
    justify-content: space-between;
}

.star-light {
    color: #bbb5 !important
}


.text-warning {
    color: rgb(250, 143, 43) !important
}


.submit_star {
    cursor: pointer;
}
</style>

<body>
    <?php
    include 'config.php';
    session_start();
    //get name of user
    $getuserquery = "SELECT * FROM users WHERE u_id = '" . $_SESSION['user_id'] . "'";
    $getuserresult = mysqli_query($conn, $getuserquery);
    $getuserrow = mysqli_fetch_assoc($getuserresult);
    $firstname = $getuserrow['u_firstname'];
    $lastname = $getuserrow['u_lastname'];
    $full_name = $firstname . " " . $lastname;

     ///include('./navbar.php');?>
    <p>
    <h5
        style="border: 1px solid lightskyblue; background-color: blue; color: white; border-radius: 10px; width: 20%; padding: 1px; text-align: center;">
        Apartment 01</h5>
    </p>
    <div class="jumbotron text-center">


        <img src="apartment2.jpg" width="50%">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center m-auto">
                <h1><span id="avg_rating">0.0</span>/5.0</h1>
                <div>
                    <i class="fa fa-star star-light main_star mr-1"></i>
                    <i class="fa fa-star star-light main_star mr-1"></i>
                    <i class="fa fa-star star-light main_star mr-1"></i>
                    <i class="fa fa-star star-light main_star mr-1"></i>
                    <i class="fa fa-star star-light main_star mr-1"></i>
                </div>
                <span id="total_review">0</span> Reviews
            </div>
            <div class="col-sm-4 progressSection">
                <div class='holder'>
                    <div>
                        <div class="progress-label-left">
                            <b>5</b> <i class="fa fa-star mr-1 text-warning"></i>
                        </div>
                        <div class="progress-label-right">
                            <span id="total_five_star_review"> 0 </span> Reviews
                        </div>

                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-warning" id='five_star_progress'>

                        </div>
                    </div>
                </div>
                <div class='holder'>
                    <div>
                        <div class="progress-label-left">
                            <b>4</b> <i class="fa fa-star mr-1 text-warning"></i>
                        </div>
                        <div class="progress-label-right">
                            <span id="total_four_star_review"> 0 </span> Reviews
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" id='four_star_progress'>

                        </div>
                    </div>
                </div>
                <div class='holder'>
                    <div>
                        <div class="progress-label-left">
                            <b>3</b> <i class="fa fa-star mr-1 text-warning"></i>
                        </div>
                        <div class="progress-label-right">
                            <span id="total_three_star_review"> 0 </span> Reviews
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" id='three_star_progress'>

                        </div>
                    </div>
                </div>
                <div class='holder'>
                    <div>
                        <div class="progress-label-left">
                            <b>2</b> <i class="fa fa-star mr-1 text-warning"></i>
                        </div>
                        <div class="progress-label-right">
                            <span id="total_two_star_review"> 0 </span> Reviews
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" id='two_star_progress'>

                        </div>
                    </div>
                </div>
                <div class='holder'>
                    <div>
                        <div class="progress-label-left">
                            <b>1</b> <i class="fa fa-star mr-1 text-warning"></i>
                        </div>
                        <div class="progress-label-right">
                            <span id="total_one_star_review"> 0 </span> Reviews
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" id='one_star_progress'>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center m-auto">
                <button class="btn-primary" id='add_review'> Add Review </button>
            </div>
        </div>

        <div id="display_review">

        </div>
    </div>




    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <form action="data-submit.php" method="post">
                    <?php $pr_id = $_GET['pr_id']; ?>
                    <div class="modal-header">
                        <h4 class="modal-title">Write your Review</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body text-center">
                        <h4>
                            <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_1' data-rating='1'></i>
                            <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_2' data-rating='2'></i>
                            <i class="fa fa-star star-light submit_star   mr-1 " id='submit_star_3' data-rating='3'></i>
                            <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_4' data-rating='4'></i>
                            <i class="fa fa-star star-light submit_star  mr-1 " id='submit_star_5' data-rating='5'></i>
                        </h4>
                        <div class="form-group">
                            <input type="text" class="form-control" id='userName' name='userName'
                                value=<?php  echo $full_name;?>>
                        </div>
                        <div class="form-group">
                            <textarea name="userMessage" id="userMessage" class="form-control"
                                placeholder="Enter message"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary" name="submit" id='sendReview'
                                value=<?php echo $_GET['pr_id'];?>>Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>