<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
if(isset($_POST['add_landlord'])){
include 'includes/connect.php';
?>

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
    <div class="card">
        <form action="" method="post">
            <div class="form-group">
                <label for=username>Firstname</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for=last>Lastname</label>
                <input type="text" class="form-control" name="last">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email" id="property" ">
            </div>
            <label for=" phone">Phone number</label>
                <input type="text" class="form-control" name="phone" id="property" ">

            <div class=" form-group">
                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" class="form-control" name="date" id="date"">
                </div>
                <label for=" Gender">Gender</label><br>
                    <input type="radio" name="gender" value="male" required>Male
                    <input type="radio" name="gender" value="female" required>Female
                </div>
                <label for=" bank">Account number</label>
                <input type="text" class="form-control" name="bank" id="property" ">
            <label for=" address">Address</label>
                <input type="text" class="form-control" name="address" id="property">
                <div class="form-group" style="margin-top: 1em;">
                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                </div>


        </form>
    </div>
</body>

<?php

if (isset($_POST['back'])) {
    header('Location: index.php?landlord');
}

if(isset($_POST['submit'])) {
    $firstname = $_POST['username'];
    $lastname = $_POST['last'];
    $Email = $_POST['Email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $Gender = $_POST['Gender'];
    $bank = $_POST['bank'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `landlords`(`ld_firstname`, `ld_lastname`, `ld_email`, `ld_phonenumber`, `ld_dob`, `ld_gender`, `ld_bankaccountno`, `ld_address`) VALUES ('$firstname', '$lastname', '$Email', '$phone', '$date', '$Gender', '$bank', '$address')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: index.php?landlord');
    } else {
        echo "<script>window.location.reload();</script>";
    }
}
}
?>