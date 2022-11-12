<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>


<style>
        * {
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        body {
                background: #272075;
        }

        .card {
                margin-left: 25vw;
                margin-right: 25vw;
                margin-top: 2em;
                padding: 4em;
        }
</style>
<body style="text-align: centre;">


    <?php
    include ('includes/connect.php');

if(isset($_GET['edit'])){
$edit_id = $_GET['edit'];
$edit_query = mysqli_query($conn, "SELECT * FROM `users` WHERE u_id = $edit_id");
if(mysqli_num_rows($edit_query) > 0){
while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>
    <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group"><label for=""></label> <img src="images/<?php echo $fetch_edit['u_image']; ?>"
                    height="20" alt=""></div>
            <!--<div class="formgroup"><label for="update_u_id"></label> <input type="hidden" name="update_u_id"
                value="<?php //echo $fetch_edit['u_id']; ?>"></div>-->
            <div class="form-group"><label for="update_u_email">Email</label> <input type="text" class="form-control"
                    required name="update_u_email" value="<?php echo $fetch_edit['u_email']; ?>"></div>
            <div class="form-group"><label for="update_u_firstname">First name</label> <input type="text"
                    class="form-control" required name="update_u_firstname"
                    value="<?php echo $fetch_edit['u_firstname']; ?>">
            </div>
            <div class="form-group"><label for="update_u_lastname">Last name</label> <input type="text"
                    class="form-control" required name="update_u_lastname"
                    value="<?php echo $fetch_edit['u_lastname']; ?>"></div>
            <div class="form-group"><label for="update_u_phonenumber">Phone number</label> <input type="number" min="0"
                    class="form-control" required name="update_u_phonenumber"
                    value="<?php echo $fetch_edit['u_phonenumber']; ?>">
            </div>
            <div class="form-group"><label for="">Image</label> <input type="file" class="form-control" required
                    name="update_u_image" accept="image/png, image/jpg, image/jpeg"></div>
            <div class="form-group"><label for="update_u_gender">Gender</label> <input type="text" class="form-control"
                    required name="update_u_gender" value="<?php echo $fetch_edit['u_gender']; ?>"></div>
            <div class="form-group"><label for="update_u_dob">Date of birth</label> <input type="text"
                    class="form-control" required name="update_u_dob" value="<?php echo $fetch_edit['u_dob']; ?>"></div>


            <input type="submit" value="update user" name="update_users" class="btn btn-primary">
            <input type="reset" value="cancel" id="close-edit" class="btn btn-danger">
        </form>

        <?php
};
};
echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
};
?>
    </div>

</body>