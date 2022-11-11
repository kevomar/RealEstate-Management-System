<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
include 'includes/connect.php';
session_start();

$id = $_SESSION['user_id'];

$query = "SELECT * FROM landlords WHERE ld_id = $id";
$run = mysqli_query($conn, $query);



if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_array($run)) {

        $get_landlord = "SELECT ld_firstname, ld_lastname FROM landlords WHERE ld_id = " . $id;
        $run_landlord = mysqli_query($conn, $get_landlord);
        $landlord = mysqli_fetch_array($run_landlord);


        $name = $row['ld_firstname'] . ' ' . $row['ld_lastname'];
        $email = $row['ld_email'];
        $phone = $row['ld_phonenumber'];
        $address = $row['ld_address'];
        $dob = $row['ld_dob'];
        $gender = $row['ld_gender'];
        $image = $row['ld_image'];
        $bank = $row['ld_bankaccountno'];
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
                <label for="user">Landlord Id</label>
                <input type="text" class="form-control" name="user" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label for=username>Firstname</label>
                <input type="text" class="form-control" name="username" value=<?php echo $row['ld_firstname']; ?>>
            </div>
            <div class="form-group">
                <label for=last>Lastname</label>
                <input type="text" class="form-control" name="last" value=<?php echo $row['ld_lastname']; ?>>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email" id="property" value="<?php echo $email; ?>">
            </div>
            <label for="phone">Phone number</label>
            <input type="text" class="form-control" name="phone" id="property" value="<?php echo $phone; ?>">

            <div class="form-group">
                <div class="form-group">
                    <label for="date">Date of Birth</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo $dob ?>">
                </div>
                <label for="Gender">Gender</label>
                <input type="text" class="form-control" name="Gender" id="property" value="<?php echo $gender; ?>">
            </div>
            <label for="bank">Account number</label>
            <input type="text" class="form-control" name="bank" id="property" value="<?php echo $bank; ?>">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="property" value="<?php echo $address; ?>">
            <div class="form-group" style="margin-top: 1em;">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="submit" name="back" class="btn btn-primary">Back</button>
            </div>


        </form>
    </div>
</body>

<?php
    }
}

if (isset($_POST['back'])) {
    header('Location: index.php?landlord');
}

if (isset($_POST['submit'])) {
    $id = $_POST['user'];
    $username = $_POST['firstname'];
    $last = $_POST['last'];
    $Email = $_POST['Email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $Gender = $_POST['Gender'];
    $bank = $_POST['bank'];
    $address = $_POST['address'];

    $update = "UPDATE landlords SET ld_firstname = '$username', ld_lastname = '$last', ld_email = '$Email', ld_phonenumber = '$phone', ld_dob = '$date',ld_gender = '$Gender', ld_bankaccountno = '$bank', ld_address = '$address' WHERE ld_id = $id";
    $run_update = mysqli_query($conn, $update);

    if ($run_update) {
        echo "<script>alert('Landlord has been updated!')</script>";
        echo "<script>window.open('index.php?landlord', '_self')</script>";
    }

}
?>